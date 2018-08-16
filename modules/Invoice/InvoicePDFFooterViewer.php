<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
include_once 'vtlib/Vtiger/PDF/inventory/FooterViewer.php';

class InvoicePDFFooterViewer extends Vtiger_PDF_InventoryFooterViewer {

	function display($parent) {

/***
		$pdf = $parent->getPDF();
		$footerFrame = $parent->getFooterFrame();

		if($this->model) {
			$targetFooterHeight = ($this->onEveryPage())? $footerFrame->h : 0;

			$descriptionString = $this->labelModel->get(self::$DESCRIPTION_LABEL_KEY);
			$description = $this->model->get(self::$DESCRIPTION_DATA_KEY);
			$descriptionHeight = $pdf->GetStringHeight($descriptionString, $footerFrame->w);
			$pdf->SetFillColor(205,201,201);
			$pdf->MultiCell($footerFrame->w, $descriptionHeight, $descriptionString, 1, 'L', 1, 1, $footerFrame->x, $footerFrame->y);
			$pdf->MultiCell($footerFrame->w, $targetFooterHeight - $descriptionHeight, $description, 1, 'L',
				0, 1, $footerFrame->x, $footerFrame->y + $descriptionHeight);

			$termsAndConditionLabelString = $this->labelModel->get(self::$TERMSANDCONDITION_LABEL_KEY);
			$termsAndCondition = $this->model->get(self::$TERMSANDCONDITION_DATA_KEY);
			$offsetY = 2.0;
			$termsAndConditionHeight = $pdf->GetStringHeight($termsAndConditionLabelString, $footerFrame->w);
			$pdf->SetFillColor(205,201,201);
			$pdf->MultiCell($footerFrame->w, $termsAndConditionHeight, $termsAndConditionLabelString, 1, 'L', 1, 1,
				$pdf->GetX(), $pdf->GetY() + $offsetY);
			$pdf->MultiCell($footerFrame->w, $targetFooterHeight - $termsAndConditionHeight, $termsAndCondition,1, 'L', 0, 1,
				$pdf->GetX(), $pdf->GetY());
		}
***/
		$pdf = $parent->getPDF();
		$footerFrame = $parent->getFooterFrame();

		if($this->model) {
			$targetFooterHeight = ($this->onEveryPage())? $footerFrame->h : 0;

			$description = $this->model->get(self::$DESCRIPTION_DATA_KEY);
			$descriptionHeight = $pdf->GetStringHeight($description, $footerFrame->w);
			$pdf->SetFillColor(205,201,201);
			$pdf->MultiCell($footerFrame->w, $descriptionHeight, $description, 0, 'L', 0, 1, $footerFrame->x, $footerFrame->y);
		}
	}
}
?>
