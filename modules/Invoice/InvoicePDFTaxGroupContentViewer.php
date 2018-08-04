<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
//include_once 'vtlib/Vtiger/PDF/inventory/ContentViewer.php';
include_once dirname(__FILE__) . 'InvoicePDFContentViewer.php';

class InvoicePDFTaxGroupContentViewer extends InvoicePDFContentViewer {

	function __construct() {
		// NOTE: General A4 PDF width ~ 189 (excluding margins on either side)
			
		$this->cells = array( // Name => Width
			'Code'		=> 25,
			'Name'		=> 72,
			'Quantity'	=> 15,
			'Price'		=> 28,
			'Discount'	=> 20,
			'Total'		=> 30
		);
	}
	
}
