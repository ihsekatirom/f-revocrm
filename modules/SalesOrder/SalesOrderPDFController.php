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
include_once dirname(__FILE__). '/SalesOrderPDFHeaderViewer.php';
include_once dirname(__FILE__). '/SalesOrderPDFContentViewer.php';
include_once dirname(__FILE__). '/SalesOrderPDFFooterViewer.php';
include_once dirname(__FILE__). '/SalesOrderPDFTaxGroupContentViewer.php';

class Vtiger_SalesOrderPDFController extends Vtiger_InventoryPDFController{

	function Output($filename, $type) {
					if(is_null($this->focus)) return;

					$pdfgenerator = $this->getPDFGenerator();

					$this->headerTitleLabel = '御注文確認書';
					$pdfgenerator->setPagerViewer($this->getPagerViewer());
					$pdfgenerator->setHeaderViewer($this->getHeaderViewer());
					$pdfgenerator->setContentViewer($this->getContentViewer());
					$pdfgenerator->setFooterViewer($this->getFooterViewer());

					$pdfgenerator->generate($filename, $type);
	}

	function getContentViewer() {
					if($this->focusColumnValue('hdnTaxType') == "individual") {
									$contentViewer = new SalesOrderPFContentViewer();
					} else {
									$contentViewer = new SalesOrderPDFTaxGroupContentViewer();
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
		$labelModel->set('Name',      getTranslatedString('Product Name',$this->moduleName).'・規格'."\n".'(※文字数や家紋、装飾数が多い場合、紅白の房は追加費用を含みます)');
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
//		$currencySymbol = $this->buildCurrencySymbol();

		$summaryModel->set(getTranslatedString("Shipping & Handling Charges", $this->moduleName), $this->formatPrice($final_details['shipping_handling_charge']));
		$summaryModel->set(getTranslatedString("Shipping & Handling Tax:", $this->moduleName)."($sh_tax_percent%)", $this->formatPrice($final_details['shtax_totalamount']));
		$summaryModel->set(getTranslatedString("Adjustment", $this->moduleName), $this->formatPrice($final_details['adjustment']));
		$summaryModel->set(getTranslatedString("Grand Total:", $this->moduleName), $this->formatPrice($final_details['grandTotal']));

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
/***
		$modelTitle = array(
						  'title'	       =>      sprintf("%s", $this->headerTitleLabel),
		          'description'	 =>      sprintf("%s", $this->headerDescription),
			);
***/
		$modelTitle = sprintf("%s", $this->headerTitleLabel);

		return $modelTitle;
	}

	function getHeaderViewer() {
		$headerViewer = new SalesOrderPDFHeaderViewer();
		$headerViewer->setModel($this->buildHeaderModel());
		return $headerViewer;
	}

	function getFooterViewer() {
//		$footerViewer = new SalesOrderPDFFooterViewer();
//		$footerViewer->setModel($this->buildFooterModel());

//		$footerViewer->setLabelModel($this->buildFooterLabelModel());
//    $footerViewer->setOnEveryPage();
//		$footerViewer->setOnLastPage();
		$footerViewer = new SalesOrderPDFFooterViewer();
		$footerViewer->setModel($this->buildFooterModel());
		$footerViewer->setLabelModel($this->buildFooterLabelModel());
//		$footerViewer->setOnLastPage();
		return $footerViewer;
	}
//	function buildHeaderModelColumnLeft() {
//		$modelColumnLeft = parent::buildHeaderModelColumnLeft();
//		return $modelColumnLeft;
//	}
	function buildHeaderModelColumnLeft() {
		$customerName = $this->resolveReferenceLabel($this->focusColumnValue('account_id'), 'Accounts');
		$contactName = $this->resolveReferenceLabel($this->focusColumnValue('contact_id'), 'Contacts');
		$contactInfo = $this->buildHeaderContactInfo();
//		$contactFax = $this->resolveReferenceLabel($this->focusColumnValue('fax'), 'Contacts');
		$contactNameLabel = getTranslatedString('Contact Name', $this->moduleName);
//		$billingAddressLabel = getTranslatedString('Billing Address', $this->moduleName);
//		$shippingAddressLabel = getTranslatedString('Shipping Address', $this->moduleName);
		$billingAddress = $this->buildHeaderBillingAddress();
		$shippingAddress = $this->buildHeaderShippingAddress();

		$CustomerInfo	= decode_html($this->joinValues(array($customerName.' 御中', $contactName.' 様')));
		$additionalContactInfo	= decode_html($this->joinValues(array('請求先：'.$billingAddress, '納品先：'.$shippingAddress, $contactInfo)));

		$modelColumn0 = array(
				'customer'			=>      $CustomerInfo,
				'contact'	      =>      $additionalContactInfo,
				'summary'		    =>      array(
						'件名'					=> $this->focusColumnValue('subject')
					),
				'fieldvalue'		=>      array(
						'受注No.'				=> $this->focusColumnValue('salesorder_no'),
						'指図No.'				=> $this->focusColumnValue('customerno'),
						'メーカーNo.'		=> 2512823,
						'受発注日'			=> $this->focusColumnValue('cf_763'),
						'納品予定日'			=> $this->focusColumnValue('duedate')
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

		$modelColumn1 = array(
				$subjectLabel		=>	$subject,
		);
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

		// Print Infomation
		$printInfo = array();
		if(!empty($resultrow['phone']))	 $printInfo[]= $issueDateLabel.'：'. $this->formatDate(date("Y-m-d"));
		if(!empty($this->focusColumnValue('salesorder_no'))) $printInfo[]= '販売受注番号：'. $this->focusColumnValue('salesorder_no');

		// Company information
		$result = $adb->pquery("SELECT * FROM vtiger_organizationdetails", array());
		$num_rows = $adb->num_rows($result);
		if($num_rows) {
			$resultrow = $adb->fetch_array($result);

			$addressValues = array();

			if(!empty($resultrow['code'])) $addressValues[]= $resultrow['code'];
//		      if(!empty($resultrow['country'])) $addressValues[]= "\n".$resultrow['country'];
			if(!empty($resultrow['state'])) $addressValues[]= $resultrow['state'];
			if(!empty($resultrow['city'])) $addressValues[]= $resultrow['city'];
			if(!empty($resultrow['address'])) $addressValues[] = $resultrow['address'];


			$additionalCompanyInfo = array();
			if(!empty($resultrow['phone']))	 $additionalCompanyInfo[]= "\n".getTranslatedString("Phone: ", $this->moduleName). $resultrow['phone'];
			if(!empty($resultrow['fax']))	   $additionalCompanyInfo[]= "\n".getTranslatedString("Fax: ", $this->moduleName). $resultrow['fax'];
//			if(!empty($resultrow['website']))       $additionalCompanyInfo[]= "\n".getTranslatedString("Website: ", $this->moduleName). $resultrow['website'];
//			if(!empty($resultrow['vatid']))	 $additionalCompanyInfo[]= "\n".getTranslatedString("VAT ID: ", $this->moduleName). $resultrow['vatid'];

			$issueDateLabel = getTranslatedString('Issued Date', $this->moduleName);
			$validDateLabel = getTranslatedString('Due Date', $this->moduleName);

//					      $validDateLabel => $this->formatDate($this->focusColumnValue('duedate')),

			// User information
 			$userNameSql = getSqlForNameInDisplayFormat(array('first_name'=>
					'vtiger_users.first_name', 'last_name' => 'vtiger_users.last_name'), 'Users');
			$query = "SELECT vtiger_users.email1 as email ," .
					" CASE when (vtiger_users.user_name not like '') THEN $userNameSql ELSE vtiger_groups.groupname END as user_name " .
					" FROM vtiger_account" .
					" INNER JOIN vtiger_crmentity " .
					" ON vtiger_crmentity.crmid = vtiger_account.accountid" .
					" INNER JOIN vtiger_accountbillads" .
					" ON vtiger_account.accountid = vtiger_accountbillads.accountaddressid " .
					" LEFT JOIN vtiger_groups" .
					" ON vtiger_groups.groupid = vtiger_crmentity.smownerid" .
					" LEFT JOIN vtiger_users" .
					" ON vtiger_users.id = vtiger_crmentity.smownerid" .
					" WHERE vtiger_crmentity.deleted = 0 and accountid = ?";
			$params = array($this->focusColumnValue('account_id'));
			$result = $adb->pquery($query, array());
			$num_rows = $adb->num_rows($res);

			if($num_rows) {
				$resultrow = $adb->fetch_array($result);

				$userValues = array();

				if(!empty($resultrow['user_name'])) $userValues[]= $resultrow['user_name'];
				if(!empty($resultrow['email'])) $userValues[]= '('.$resultrow['email'].')';
			}

			$modelColumn2 = array(
				'print_date' => decode_html($this->joinValues($printInfo)),
				'summary' => decode_html($resultrow['organizationname']),
				'content' => decode_html($this->joinValues($addressValues, ' '). $this->joinValues($additionalCompanyInfo, ' '). $this->joinValues($userValues, ' ').)
				);
			}
		return $modelColumn2;
	}

	function buildFooterModel() {
		$DescriptionData = '見本品預かり有り（返却不要）、見本品写真送付有り';
		$DescriptionData .= "\n".$this->focusColumnValue('terms_conditions');

		$footerModel = new Vtiger_PDF_Model();
//		$footerModel->set(Vtiger_PDF_InventoryFooterViewer::$DESCRIPTION_DATA_KEY, from_html($this->focusColumnValue('description')));
		$footerModel->set(SalesOrderPDFFooterViewer::$TERMSANDCONDITION_DATA_KEY, from_html($DescriptionData));
		return $footerModel;
	}

	function buildFooterLabelModel() {
		$labelModel = new Vtiger_PDF_Model();
//		$labelModel->set(Vtiger_PDF_InventoryFooterViewer::$DESCRIPTION_LABEL_KEY, getTranslatedString('Description',$this->moduleName));
		$labelModel->set(SalesOrderPDFFooterViewer::$TERMSANDCONDITION_LABEL_KEY, getTranslatedString('Terms & Conditions',$this->moduleName));
		return $labelModel;
	}

	function buildPagerModel() {
		$footerModel = new Vtiger_PDF_Model();
		$footerModel->set('format', '-%s-');
		return $footerModel;
	}

	function getWatermarkContent() {
		return $this->focusColumnValue('sostatus');
	}

	function buildHeaderBillingAddress() {
		$billPoBox	= $this->focusColumnValues(array('bill_pobox'));
		$billCode	= $this->focusColumnValues(array('bill_code'));
//		$billCountry	= $this->focusColumnValues(array('bill_country'));
		$billState	= $this->focusColumnValues(array('bill_state'));
		$billCity	= $this->focusColumnValues(array('bill_city'));
		$billStreet	= $this->focusColumnValues(array('bill_street'));
		$address	= $this->joinValues(array($billCode, $billState, $billCity, $billStreet), ' ');
		return $address;
	}

	function buildHeaderShippingAddress() {
		$shipPoBox	= $this->focusColumnValues(array('ship_pobox'));
		$shipCode	= $this->focusColumnValues(array('ship_code'));
//		$shipCountry	= $this->focusColumnValues(array('ship_country'));
		$shipState	= $this->focusColumnValues(array('ship_state'));
		$shipCity	= $this->focusColumnValues(array('ship_city'));
		$shipStreet	= $this->focusColumnValues(array('ship_street'));
		$address	= $this->joinValues(array($shipCode, $shipState, $shipCity, $shipStreet), ' ');
		return $address;
	}

	function buildHeaderContactInfo() {
		global $adb;

		// Contact information
		$result = $adb->pquery("SELECT * FROM vtiger_contactdetails WHERE contactid = ".$this->focusColumnValue('contact_id'), array());
		$num_rows = $adb->num_rows($result);
		if($num_rows) {
			$resultrow = $adb->fetch_array($result);

			$additionalContactInfo = array();
			if(!empty($resultrow['phone']))	 $additionalContactInfo[]= getTranslatedString("Phone: ", $this->moduleName). $resultrow['phone'];
			if(!empty($resultrow['fax']))	   $additionalContactInfo[]= getTranslatedString("Fax: ", $this->moduleName). $resultrow['fax'];
//			if(!empty($resultrow['email']))	 $additionalContactInfo[]= getTranslatedString("Mail: ", $this->moduleName). $resultrow['email'];

			return $this->joinValues($additionalContactInfo);
		}
	}

	function formatPrice($value, $decimal=2) {
		$currencyField = new CurrencyField($value);

		return decode_html($currencyField->getDisplayValueWithSymbol(null, true));
	}
}
?>
