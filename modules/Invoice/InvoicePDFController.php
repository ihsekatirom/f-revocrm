<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
include_once 'include/InventoryPDFController.php';
include_once dirname(__FILE__). '/InvoicePDFHeaderViewer.php';
include_once dirname(__FILE__). '/InvoicePDFContentViewer.php';
include_once dirname(__FILE__). '/InvoicePDFTaxGroupContentViewer.php';

class Vtiger_InvoicePDFController extends Vtiger_InventoryPDFController{

        function Output($filename, $type) {
                if(is_null($this->focus)) return;

                $pdfgenerator = $this->getPDFGenerator();

                $pdfgenerator->setPagerViewer($this->getPagerViewer());
                $pdfgenerator->setHeaderViewer($this->getHeaderViewer());
                $pdfgenerator->setContentViewer($this->getContentViewer());
//                $pdfgenerator->setFooterViewer($this->getFooterViewer());

                $pdfgenerator->generate($filename, $type);
        }

        function getContentViewer() {
                if($this->focusColumnValue('hdnTaxType') == "individual") {
                        $contentViewer = new InvoicePDFContentViewer();
                } else {
//                        $contentViewer = new Vtiger_PDF_InventoryTaxGroupContentViewer();
                        $contentViewer = new InvoicePDFTaxGroupContentViewer();
                }
                $contentViewer->setContentModels($this->buildContentModels());
                $contentViewer->setSummaryModel($this->buildSummaryModel());
                $contentViewer->setLabelModel($this->buildContentLabelModel());
                $contentViewer->setWatermarkModel($this->buildWatermarkModel());
                return $contentViewer;
        }



	// Helper methods

	function buildContentModels() {
		$associated_products = $this->associated_products;
		$contentModels = array();
		$productLineItemIndex = 0;
		$totaltaxes = 0;
		$no_of_decimal_places = getCurrencyDecimalPlaces();
		foreach($associated_products as $productLineItem) {
			++$productLineItemIndex;

			$contentModel = new Vtiger_PDF_Model();

			$discountPercentage  = 0.00;
			$total_tax_percent = 0.00;
			$producttotal_taxes = 0.00;
//			$quantity = ''; $listPrice = ''; $discount = ''; $taxable_total = '';
			$quantity = ''; $listPrice = ''; $unitPrice = ''; $discount = ''; $taxable_total = ''; $unitPrice_total = '';
			$tax_amount = ''; $producttotal = '';
			$productCode = '';


			$quantity	= $productLineItem["qty{$productLineItemIndex}"];
			$listPrice	= $productLineItem["listPrice{$productLineItemIndex}"];
			$unitPrice	= $productLineItem["unitPrice{$productLineItemIndex}"];
			$discount	= $productLineItem["discountTotal{$productLineItemIndex}"];
			$taxable_total = $quantity * $listPrice - $discount;
			$taxable_total = number_format($taxable_total, $no_of_decimal_places,'.','');
			$unitPrice_total = $quantity * $unitPrice - $discount;
			$unitPrice_total = number_format($unitPrice_total, $no_of_decimal_places,'.','');
			$producttotal = $taxable_total;
			if($this->focus->column_fields["hdnTaxType"] == "individual") {
				for($tax_count=0;$tax_count<count($productLineItem['taxes']);$tax_count++) {
					$tax_percent = $productLineItem['taxes'][$tax_count]['percentage'];
					$total_tax_percent += $tax_percent;
					$tax_amount = (($taxable_total*$tax_percent)/100);
					$producttotal_taxes += $tax_amount;
				}
			}

			$producttotal_taxes = number_format($producttotal_taxes, $no_of_decimal_places,'.','');
			$producttotal = $taxable_total+$producttotal_taxes;
			$producttotal = number_format($producttotal, $no_of_decimal_places,'.','');
			$tax = $producttotal_taxes;
			$totaltaxes += $tax;
			$totaltaxes = number_format($totaltaxes, $no_of_decimal_places,'.','');
			$discountPercentage = $productLineItem["discount_percent{$productLineItemIndex}"];
			$productName = decode_html($productLineItem["productName{$productLineItemIndex}"]);
			//get the sub product
			$subProducts = $productLineItem["subProductArray{$productLineItemIndex}"];
			if($subProducts != '') {
				foreach($subProducts as $subProduct) {
					$productName .="\n"." - ".decode_html($subProduct);
				}
			}
			$contentModel->set('Name', $productName);
//			$contentModel->set('Code', decode_html($productLineItem["hdnProductcode{$productLineItemIndex}"]));
			$contentModel->set('Code', decode_html($productLineItem["Productcode{$productLineItemIndex}"]));
			$contentModel->set('Quantity', $quantity);
			$contentModel->set('Price',     $this->formatPrice($listPrice)."\n(".$this->formatPrice($unitPrice).")");
			$contentModel->set('Discount',  $this->formatPrice($discount)."\n ($discountPercentage%)");
//			$contentModel->set('Discount',  "$discountPercentage%");
			$contentModel->set('Tax',       $this->formatPrice($tax)."\n ($total_tax_percent%)");
			$contentModel->set('Total',     $this->formatPrice($producttotal)."\n(".$this->formatPrice($unitPrice_total).")");
			$contentModel->set('Comment',   decode_html($productLineItem["comment{$productLineItemIndex}"]));

			$contentModels[] = $contentModel;
		}
		$this->totaltaxes = $totaltaxes; //will be used to add it to the net total

		return $contentModels;
	}

	function buildContentLabelModel() {
		$labelModel = new Vtiger_PDF_Model();
		$labelModel->set('Code',      "\n".getTranslatedString('Product Code',$this->moduleName));
		$labelModel->set('Name',      "\n".getTranslatedString('Product Name',$this->moduleName));
		$labelModel->set('Quantity',  "\n".getTranslatedString('Quantity',$this->moduleName));
//		$labelModel->set('Price',     getTranslatedString('LBL_LIST_PRICE',$this->moduleName));
		$labelModel->set('Price',     getTranslatedString('LBL_LIST_PRICE',$this->moduleName)."\n(原価)");
//		$labelModel->set('Price',     "売価単価"."\n(原価単価)");
		$labelModel->set('Discount',  "\n".getTranslatedString('Discount',$this->moduleName));
		$labelModel->set('Tax',       "\n".getTranslatedString('Tax',$this->moduleName));
//		$labelModel->set('Total',     getTranslatedString('Total',$this->moduleName));
		$labelModel->set('Total',     getTranslatedString('Total',$this->moduleName)."\n(原価合計)");
//		$labelModel->set('Total',     "売価金額"."\n(原価金額)");
		$labelModel->set('Comment',   getTranslatedString('Comment'),$this->moduleName);
		return $labelModel;
	}

	function buildSummaryModel() {
		$associated_products = $this->associated_products;
		$final_details = $associated_products[1]['final_details'];

		$summaryModel = new Vtiger_PDF_Model();

		$netTotal = $discount = $handlingCharges =  $handlingTaxes = 0;
		$adjustment = $grandTotal = 0;

		$productLineItemIndex = 0;
		$sh_tax_percent = 0;
		foreach($associated_products as $productLineItem) {
			++$productLineItemIndex;
			$netTotal += $productLineItem["netPrice{$productLineItemIndex}"];
		}
		$netTotal = number_format(($netTotal + $this->totaltaxes), getCurrencyDecimalPlaces(),'.', '');
		$summaryModel->set(getTranslatedString("Net Total", $this->moduleName), $this->formatPrice($netTotal));

		$discount_amount = $final_details["discount_amount_final"];
		$discount_percent = $final_details["discount_percentage_final"];

		$discount = 0.0;
        $discount_final_percent = '0.00';
		if($final_details['discount_type_final'] == 'amount') {
			$discount = $discount_amount;
		} else if($final_details['discount_type_final'] == 'percentage') {
            $discount_final_percent = $discount_percent;
			$discount = (($discount_percent*$final_details["hdnSubTotal"])/100);
		}
		$summaryModel->set(getTranslatedString("Discount", $this->moduleName)."($discount_final_percent%)", $this->formatPrice($discount));

		$group_total_tax_percent = '0.00';
		//To calculate the group tax amount
		if($final_details['taxtype'] == 'group') {
			$group_tax_details = $final_details['taxes'];
			for($i=0;$i<count($group_tax_details);$i++) {
				$group_total_tax_percent += $group_tax_details[$i]['percentage'];
			}
			$summaryModel->set(getTranslatedString("Tax:", $this->moduleName)."($group_total_tax_percent%)", $this->formatPrice($final_details['tax_totalamount']));
		}
		//Shipping & Handling taxes
		$sh_tax_details = $final_details['sh_taxes'];
		for($i=0;$i<count($sh_tax_details);$i++) {
			$sh_tax_percent = $sh_tax_percent + $sh_tax_details[$i]['percentage'];
		}
		//obtain the Currency Symbol
		$currencySymbol = $this->buildCurrencySymbol();

		$summaryModel->set(getTranslatedString("Shipping & Handling Charges", $this->moduleName), $this->formatPrice($final_details['shipping_handling_charge']));
		$summaryModel->set(getTranslatedString("Shipping & Handling Tax:", $this->moduleName)."($sh_tax_percent%)", $this->formatPrice($final_details['shtax_totalamount']));
		$summaryModel->set(getTranslatedString("Adjustment", $this->moduleName), $this->formatPrice($final_details['adjustment']));
		$summaryModel->set(getTranslatedString("Grand Total:", $this->moduleName)."(in $currencySymbol)", $this->formatPrice($final_details['grandTotal'])); // TODO add currency string

		if ($this->moduleName == 'Invoice') {
			$receivedVal = $this->focusColumnValue("received");
			if (!$receivedVal) {
				$this->focus->column_fields["received"] = 0;
			}
			//If Received value is exist then only Recieved, Balance details should present in PDF
			if ($this->formatPrice($this->focusColumnValue("received")) > 0) {
				$summaryModel->set(getTranslatedString("Received", $this->moduleName), $this->formatPrice($this->focusColumnValue("received")));
				$summaryModel->set(getTranslatedString("Balance", $this->moduleName), $this->formatPrice($this->focusColumnValue("balance")));
			}
		}
		return $summaryModel;
	}


	function buildHeaderModelTitle() {
		$singularModuleNameKey = 'SINGLE_'.$this->moduleName;
		$translatedSingularModuleLabel = getTranslatedString($singularModuleNameKey, $this->moduleName);
		if($translatedSingularModuleLabel == $singularModuleNameKey) {
			$translatedSingularModuleLabel = getTranslatedString($this->moduleName, $this->moduleName);
		}
//		return sprintf("%s: %s", $translatedSingularModuleLabel, $this->focusColumnValue('salesorder_no'));
		return sprintf("%s", '代金請求書（控）');
	}

	function getHeaderViewer() {
		$headerViewer = new InvoicePDFHeaderViewer();
		$headerViewer->setModel($this->buildHeaderModel());
		return $headerViewer;
	}
	
//	function buildHeaderModelColumnLeft() {
//		$modelColumnLeft = parent::buildHeaderModelColumnLeft();
//		return $modelColumnLeft;
//	}
	function buildHeaderModelColumnLeft() {
		$customerName = $this->resolveReferenceLabel($this->focusColumnValue('account_id'), 'Accounts');
		$contactName = $this->resolveReferenceLabel($this->focusColumnValue('contact_id'), 'Contacts');
		$contactNameLabel = getTranslatedString('Contact Name', $this->moduleName);
		$billingAddressLabel = getTranslatedString('Billing Address', $this->moduleName);
		$shippingAddressLabel = getTranslatedString('Shipping Address', $this->moduleName);

		$modelColumn0 = array(
				'summary'	       =>      $customerName.' 御中',
				'content'	       =>      array(
						'contactname'   => array('ご担当者' => $contactName.' 様'),
						'請求先住所'  => $this->buildHeaderBillingAddress(),
						'納品先住所'  => $this->buildHeaderShippingAddress()
				)
			);
		return $modelColumn0;
	}
	
	function buildHeaderModelColumnCenter() {
		$subject = $this->focusColumnValue('subject');
		$customerName = $this->resolveReferenceLabel($this->focusColumnValue('account_id'), 'Accounts');
		$contactName = $this->resolveReferenceLabel($this->focusColumnValue('contact_id'), 'Contacts');
		$purchaseOrder = $this->focusColumnValue('vtiger_purchaseorder');
		$quoteName = $this->resolveReferenceLabel($this->focusColumnValue('quote_id'), 'Quotes');
		
		$subjectLabel = getTranslatedString('Subject', $this->moduleName);
	$quoteNameLabel = getTranslatedString('Quote Name', $this->moduleName);
		$customerNameLabel = getTranslatedString('Customer Name', $this->moduleName);
		$contactNameLabel = getTranslatedString('Contact Name', $this->moduleName);
		$purchaseOrderLabel = getTranslatedString('Purchase Order', $this->moduleName);
/***
		$modelColumn1 = array(
				$subjectLabel		=>	$subject,
				$customerNameLabel	=>	$customerName,
				$contactNameLabel	=>	$contactName,
				$purchaseOrderLabel =>  $purchaseOrder,
		$quoteNameLabel => $quoteName
			);
***/
		return $modelColumn1;
	}
/**
	function buildHeaderModelColumnRight() {
		$issueDateLabel = getTranslatedString('Issued Date', $this->moduleName);
		$validDateLabel = getTranslatedString('Due Date', $this->moduleName);
		$billingAddressLabel = getTranslatedString('Billing Address', $this->moduleName);
		$shippingAddressLabel = getTranslatedString('Shipping Address', $this->moduleName);


		$modelColumn2 = array(
				'dates' => array(
					$issueDateLabel  => $this->formatDate(date("Y-m-d")),
					$validDateLabel => $this->formatDate($this->focusColumnValue('duedate')),
				),
				$billingAddressLabel  => $this->buildHeaderBillingAddress(),
				$shippingAddressLabel => $this->buildHeaderShippingAddress()
			);
		return $modelColumn2;
	}
**/
	function buildHeaderModelColumnRight() {
		global $adb;

		// Customer information
		$customerName = $this->resolveReferenceLabel($this->focusColumnValue('account_id'), 'Accounts');

		// Company information
		$result = $adb->pquery("SELECT * FROM vtiger_organizationdetails", array());
		$num_rows = $adb->num_rows($result);
		if($num_rows) {
			$resultrow = $adb->fetch_array($result);

			$addressValues = array();

			if(!empty($resultrow['code'])) $addressValues[]= $resultrow['code'];
//		      if(!empty($resultrow['country'])) $addressValues[]= "\n".$resultrow['country'];
			if(!empty($resultrow['state'])) $addressValues[]= "\n".$resultrow['state'];
			if(!empty($resultrow['city'])) $addressValues[]= $resultrow['city'];
			if(!empty($resultrow['address'])) $addressValues[] = $resultrow['address'];


			$additionalCompanyInfo = array();
			if(!empty($resultrow['phone']))	 $additionalCompanyInfo[]= "\n".getTranslatedString("Phone: ", $this->moduleName). $resultrow['phone'];
			if(!empty($resultrow['fax']))	   $additionalCompanyInfo[]= "\n".getTranslatedString("Fax: ", $this->moduleName). $resultrow['fax'];
			if(!empty($resultrow['website']))       $additionalCompanyInfo[]= "\n".getTranslatedString("Website: ", $this->moduleName). $resultrow['website'];
			if(!empty($resultrow['vatid']))	 $additionalCompanyInfo[]= "\n".getTranslatedString("VAT ID: ", $this->moduleName). $resultrow['vatid'];

			$issueDateLabel = getTranslatedString('Issued Date', $this->moduleName);
			$validDateLabel = getTranslatedString('Due Date', $this->moduleName);
	
//					      $validDateLabel => $this->formatDate($this->focusColumnValue('duedate')),
			$modelColumn2 = array(
					'dates' => array(
						$issueDateLabel  => $this->formatDate(date("Y-m-d")),
						'請求書番号'	=> $this->focusColumnValue('invoice_no')
					),
					'order_no'	    =>      array(
							'受注No.'       => $this->focusColumnValue('salesorderno'), 
							'指図No.'       => $this->focusColumnValue('customerno'),
							'メーカーNo.'   => 2512823,
					),
					'出荷場所名'	       =>      $customerName.' 御中',
					'出荷元名' => decode_html($resultrow['organizationname']),
//					'content' => decode_html($this->joinValues($addressValues, ' '). $this->joinValues($additionalCompanyInfo, ' ')),
					'fieldvalue'	    =>      array(
							'受発注日'	=> '2018-05-16',
							'出荷日'	=> '2018-07-06',
							'摘要'		=> ''
					)
				);
			}
		return $modelColumn2;
	}

	function getWatermarkContent() {
		return $this->focusColumnValue('invoicestatus');
	}
}
?>
