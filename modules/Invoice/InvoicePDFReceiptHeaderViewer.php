<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
        include_once 'vtlib/Vtiger/PDF/inventory/HeaderViewer.php';

        class InvoicePDFReceiptHeaderViewer extends Vtiger_PDF_InventoryHeaderViewer {

		function display($parent) {
			$pdf = $parent->getPDF();
			$headerFrame = $parent->getHeaderFrame();
			if($this->model) {
				$headerColumnWidth = $headerFrame->w/3.0;

				// Title

				$offsetX = 2;
				$offsetY = 0;

				$modelTitle = $this->model->get('title');

        $titleHeight = $pdf->GetStringHeight($modelTitle['description'], $headerColumnWidth);

				$pdf->SetFont('kozgopromedium', '');
				$pdf->SetFontSize(12);
				$pdf->MultiCell($headerFrame->w, $titleHeight, $modelTitle['description'], 0, 'L', 1, 1, $headerFrame->x+$offsetX,
				$headerFrame->y+$offsetY);
				$pdf->SetFontSize(12);

//				$titleHeight = $pdf->GetStringHeight($modelTitle, $headerColumnWidth);
        $titleHeight = $titleHeight + $pdf->GetStringHeight($modelTitle['title'], $headerColumnWidth);

				$pdf->SetFont('kozgopromedium', 'B');
				$pdf->SetFontSize(24);
				$pdf->MultiCell($headerFrame->w, $titleHeight, $modelTitle['title'], 0, 'L', 0, 1, $headerFrame->x+$offsetX,
        $pdf->GetY());
				$pdf->SetFontSize(12);

				$modelColumns = $this->model->get('columns');

				// Column 1
//				$pdf->SetY($headerFrame->y);
				$offsetX = 5;
				$offsetY = 0;

				$modelColumnLeft = $modelColumns[0];
				foreach($modelColumnLeft as $label => $value) {

					if(!empty($value)) {
						$pdf->SetFont('kozgopromedium', 'B');
						$pdf->SetFillColor(205,201,201);
						$pdf->MultiCell(35, 7, $label, 1, 'C', 1, 1, $headerFrame->x+($headerColumnWidth-35-$offsetX)/2, $pdf->GetY()+$offsetY);

						$pdf->SetFontSize(10);
						$pdf->SetFont('kozgopromedium', 'B');
						$pdf->MultiCell(35, 7, $value, 1, 'R', 0, 1, $headerFrame->x+($headerColumnWidth-35-$offsetX)/2, $pdf->GetY());
						$pdf->SetFontSize(12);

						$pdf->SetFont('kozgopromedium', 'B');
						$pdf->MultiCell(35, 28, '', 1, 'C', 0, 1, $headerFrame->x+($headerColumnWidth-35-$offsetX)/2, $pdf->GetY());
					}
				}

				// Column 2
				$pdf->SetY($headerFrame->y);
				$offsetX = 5;

				$modelColumnCenter = $modelColumns[1];


				$offsetY = 8;
				foreach($modelColumnCenter as $label => $value) {

					if(!empty($value)) {
						$pdf->SetFont('kozgopromedium', 'B');
						$pdf->SetFillColor(205,201,201);
						$pdf->MultiCell($headerColumnWidth-$offsetX, 7, $label, 1, 'C', 1, 1, $headerFrame->x+$headerColumnWidth+$offsetX, $pdf->GetY()+$offsetY);

						$pdf->SetFont('kozgopromedium', '');
						$pdf->MultiCell($headerColumnWidth-$offsetX, 7, $value, 1, 'C', 0, 1, $headerFrame->x+$headerColumnWidth+$offsetX, $pdf->GetY());
						$offsetY = 2;
					}
				}

				// Column 3
				$pdf->SetY($headerFrame->y);
				$offsetX = 5;
				$offsetY = 2;

				$modelColumnRight = $modelColumns[2];

				$pdf->SetFont('kozgopromedium', '');
				foreach($modelColumnRight['dates'] as $l => $v) {
					$pdf->MultiCell($headerColumnWidth-$offsetX, 7, sprintf('%s: %s', $l, $v), 0, 'R', 0, 1,
						$headerFrame->x+$headerColumnWidth*2.0+$offsetX, $pdf->GetY()+$offsetY);
					$offsetY = 0;
				}

/***
				if($pdf->GetY() < $titleHeight) {
					$pdf->SetY($titleHeight);
				}
***/
				$offsetX = 0;
				$offsetY = $pdf->GetY()+2;

                                foreach($modelColumnRight['order_no'] as $label => $value) {
                                        if(! is_array($value)) {

					$contentWidth = $headerColumnWidth*2/3;
                                        $pdf->SetFont('kozgopromedium', 'B');
                                        $pdf->SetFillColor(205,201,201);
                                        $pdf->MultiCell($contentWidth, 7, $label, 1, 'C', 1, 1, $headerFrame->x+$headerColumnWidth*1.0+$offsetX,
                                                $offsetY);

                                        $pdf->SetFont('kozgopromedium', '');
                                        $pdf->MultiCell($contentWidth, 7, $value, 1, 'C', 0, 1, $headerFrame->x+$headerColumnWidth*1.0+$offsetX,
                                                $pdf->GetY());
					$offsetX += $contentWidth;
                                        }
                                }

				$offsetX = 0;
//				$offsetY = 10;
				$offsetY = 0;

				foreach($modelColumnRight as $label => $value) {
					if($label == 'dates' or $label == 'fieldvalue' or $label == 'order_no') {
						continue;
					} else {

					$offsetY = $pdf->GetY();
					$contentHeight = $pdf->GetStringHeight($value, $headerColumnWidth);
					$contentWidth = 30;
					$pdf->SetFont('kozgopromedium', 'B');
					$pdf->SetFillColor(205,201,201);
					$pdf->MultiCell($contentWidth, $contentHeight, $label, 1, 'C', 1, 1, $headerFrame->x+$headerColumnWidth*1.0+$offsetX,
                                                $offsetY);

					$pdf->SetFont('kozgopromedium', '');
					$pdf->MultiCell(0, 7, $value, 1, 'L', 0, 1, $headerFrame->x+$headerColumnWidth*1.0+$offsetX+$contentWidth,
                                                $offsetY);

						$offsetY = 1;
					}
				}

				$offsetX = 0;
				$offsetY = $pdf->GetY();

                                foreach($modelColumnRight['fieldvalue'] as $label => $value) {
                                        if(! is_array($value)) {

					end(array_keys($modelColumnRight['fieldvalue'])) == $label ? $contentWidth = 0 : $contentWidth = 30;
                                        $pdf->SetFont('kozgopromedium', 'B');
                                        $pdf->SetFillColor(205,201,201);
                                        $pdf->MultiCell($contentWidth, 7, $label, 1, 'C', 1, 1, $headerFrame->x+$headerColumnWidth*1.0+$offsetX,
                                                $offsetY);

                                        $pdf->SetFont('kozgopromedium', '');
                                        $pdf->MultiCell($contentWidth, 7, $value, 1, 'C', 0, 1, $headerFrame->x+$headerColumnWidth*1.0+$offsetX,
                                                $pdf->GetY());
					$offsetX += $contentWidth;
                                        }
                                }
				$pdf->setFont('kozgopromedium', '');

				// Add the border cell at the end
				// This is required to reset Y position for next write
				$pdf->MultiCell($headerFrame->w, $headerFrame->h-$headerFrame->y, "", 0, 'L', 0, 1, $headerFrame->x, $headerFrame->y);
			}
		}
}
?>
