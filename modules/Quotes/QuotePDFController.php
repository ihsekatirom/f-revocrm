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
include_once dirname(__FILE__). '/QuotePDFHeaderViewer.php';
class Vtiger_QuotePDFController extends Vtiger_InventoryPDFController{
	function buildHeaderModelTitle() {
		$singularModuleNameKey = 'SINGLE_'.$this->moduleName;
		$translatedSingularModuleLabel = getTranslatedString($singularModuleNameKey, $this->moduleName);
		if($translatedSingularModuleLabel == $singularModuleNameKey) {
			$translatedSingularModuleLabel = getTranslatedString($this->moduleName, $this->moduleName);
		}
//		return sprintf("%s: %s", $translatedSingularModuleLabel, $this->focusColumnValue('salesorder_no'));
		return sprintf("%s", '御見積書');
	}

	function getHeaderViewer() {
		$headerViewer = new QuotePDFHeaderViewer();
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
						'納品先住所'  => $this->buildHeaderShippingAddress(),
				),
				'fieldvalue'	    =>      array(
						'受注No.'       => '', 
						'指図No.'       => 147619,
						'メーカーNo.'   => 2512823,
						'発注日'	=> '2018-05-16',
						'納品日'	=> '2018-07-6'
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
						'見積り番号'  => $this->focusColumnValue('quote_no'),
					),
				 'summary' => decode_html($resultrow['organizationname']),
				 'content' => decode_html($this->joinValues($addressValues, ' '). $this->joinValues($additionalCompanyInfo, ' '))
				);
			}
		return $modelColumn2;
	}

	function getWatermarkContent() {
		return $this->focusColumnValue('quotestatus');
	}
}
?>
