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

	class QuotePDFHeaderViewer extends Vtiger_PDF_InventoryHeaderViewer {

		function display($parent) {
			$pdf = $parent->getPDF();
			$headerFrame = $parent->getHeaderFrame();
			if($this->model) {
				$headerColumnWidth = $headerFrame->w/3.0;

				// Title

				$offsetX = 2;
				$offsetY = 5;
			
				$modelTitle = $this->model->get('title');
			
				$titleHeight = $pdf->GetStringHeight($modelTitle, $contentWidth);
			
				$pdf->SetFont('kozgopromedium', 'B');
				$pdf->SetFontSize(24);
				$pdf->MultiCell($headerFrame->w, $titleHeight, $modelTitle, 0, 'C', 0, 1, $headerFrame->x+$offsetX,
				$headerFrame->y+$offsetY);
				$pdf->SetFontSize(12);

				$modelColumns = $this->model->get('columns');

				// Column 1
				$pdf->SetY($headerFrame->y);
				$offsetY = 2;

				$modelColumnLeft = $modelColumns[0];

//				list($imageWidth, $imageHeight, $imageType, $imageAttr) = getimagesize($modelColumnLeft['logo']);
				//division because of mm to px conversion
//				$w = $imageWidth/3;
//				if($w > 60) {
//					$w=60;
//				}
//				$h = $imageHeight/3;
//				if($h > 30) {
//					$h = 30;
//				}
//				$pdf->Image($modelColumnLeft['logo'], $headerFrame->x, $headerFrame->y, $w, $h);
//				$imageHeightInMM = 30;

				$offsetY = $titleHeight+5;

				$pdf->SetFont('kozgopromedium', 'B');
				$contentHeight = $pdf->GetStringHeight( $modelColumnLeft['summary'], $headerColumnWidth);
				$pdf->MultiCell($headerColumnWidth*1.5, $contentHeight, $modelColumnLeft['summary'], 0, 'L', 0, 1,
					$headerFrame->x, $headerFrame->y+$offsetY);

//				$pdf->SetFont('kozgopromedium', '');
//				$contentHeight = $pdf->GetStringHeight( $modelColumnLeft['content'], $headerColumnWidth);
//				$pdf->MultiCell($headerColumnWidth, $contentHeight, $modelColumnLeft['content'], 0, 'L', 0, 1,
//					$headerFrame->x, $pdf->GetY());

				$offsetY = 0;
                                foreach($modelColumnLeft['content'] as $label => $value) {
                                        if(is_array($value)) {
                                                $pdf->SetFont('kozgopromedium', '');
                                                foreach($value as $l => $v) {
                                                        $pdf->MultiCell($headerColumnWidth*1.5-$offsetX, 7, sprintf('%s: %s', $l, $v), 0, 'C', 0, 1,
                                                                $headerFrame->x, $pdf->GetY()+$offsetY);
                                                        $offsetY = 0;
                                                }
                                        } else {
                                                $offsetY = 1;

                                        $pdf->SetFont('kozgopromedium', 'B');
//                                        $pdf->SetFillColor(205,201,201);
                                        $pdf->MultiCell($headerColumnWidth*1.5-$offsetX, 7, $label, 0, 'L', 0, 1, $headerFrame->x,
                                                $pdf->GetY()+$offsetY);

                                        $pdf->SetFont('kozgopromedium', '');
                                        $pdf->MultiCell($headerColumnWidth*1.5-$offsetX, 7, $value, 0, 'L', 0, 1, $headerFrame->x,
                                                $pdf->GetY());
                                        }
                                }

				$offsetX = 0;
				$offsetY = $pdf->GetY();

                                foreach($modelColumnLeft['fieldvalue'] as $label => $value) {
                                        if(! is_array($value)) {

                                        $pdf->SetFont('kozgopromedium', 'B');
                                        $pdf->SetFillColor(205,201,201);
                                        $pdf->MultiCell($headerColumnWidth*0.6, 7, $label, 1, 'C', 1, 1, $headerFrame->x+$offsetX,
                                                $headerFrame->y+$offsetY);

                                        $pdf->SetFont('kozgopromedium', '');
                                        $pdf->MultiCell($headerColumnWidth*0.6, 7, $value, 1, 'C', 0, 1, $headerFrame->x+$offsetX, 
                                                $pdf->GetY());
					$offsetX += $headerColumnWidth*0.6; 
                                        }
                                }
/***
				if(!empty($modelColumnLeft['fieldvalue'])) {
					$pdf->SetFont('kozgopromedium', 'B');
					$pdf->SetFillColor(205,201,201);
					$height = $pdf->GetStringHeight($modelColumnLeft['fieldlabel'], $headerColumnWidth);
					$pdf->MultiCell($headerColumnWidth, 7, $modelColumnLeft['fieldlabel'], 1, 'C', 1, 1, $headerFrame->x, $pdf->GetY()+2);

					$pdf->SetFont('kozgopromedium', '');
					$height = $pdf->GetStringHeight($modelColumnLeft['fieldvalue'], $headerColumnWidth);
					$pdf->MultiCell($headerColumnWidth, 7, $modelColumnLeft['fieldvalue'], 1, 'C', 0, 1, $headerFrame->x, $pdf->GetY());
				}
***/

				// Column 2
				$offsetX = 5;
				$pdf->SetY($headerFrame->y);

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
				$offsetX = 10;

				$modelColumnRight = $modelColumns[2];
/**
				$contentWidth = $pdf->GetStringWidth($this->model->get('title'));
				$contentHeight = $pdf->GktStringHeight($this->model->get('title'), $contentWidth);

				$roundedRectX = $headerFrame->w+$headerFrame->x-$contentWidth*2.0;
				$roundedRectW = $contentWidth*2.0;

				$pdf->RoundedRect($roundedRectX, 10, $roundedRectW, 10, 3, '1111', 'DF', array(), array(205,201,201));

				$contentX = $roundedRectX + (($roundedRectW - $contentWidth)/2.0);
				$pdf->SetFont('kozgopromedium', 'B');
				$pdf->MultiCell($contentWidth*2.0, $contentHeight, $this->model->get('title'), 0, 'R', 0, 1, $contentX-$contentWidth,
					 $headerFrame->y+2);
**/

				$offsetY = 2;

				$pdf->SetFont('kozgopromedium', '');
				foreach($modelColumnRight['dates'] as $l => $v) {
					$pdf->MultiCell($headerColumnWidth-$offsetX, 7, sprintf('%s: %s', $l, $v), 0, 'R', 0, 1, 
						$headerFrame->x+$headerColumnWidth*2.0+$offsetX, $pdf->GetY()+$offsetY);
					$offsetY = 0;
				}

				if($pdf->GetY() < $titleHeight) {
					$pdf->SetY($titleHeight);
				}

				$offsetY = 10;

				foreach($modelColumnRight as $label => $value) {
					if($label == 'dates') {
						continue;
					} else if(is_array($value)) {
						$pdf->SetFont('kozgopromedium', '');
						foreach($value as $l => $v) {
							$pdf->MultiCell($headerColumnWidth-$offsetX, 7, sprintf('%s: %s', $l, $v), 0, 'R', 0, 1,
								$headerFrame->x+$headerColumnWidth*2.0+$offsetX, $pdf->GetY()+$offsetY);
							$offsetY = 0;
						}
					} else {

//					$pdf->SetFont('kozgopromedium', 'B');
//					$pdf->SetFillColor(205,201,201);
//					$pdf->MultiCell($headerColumnWidth-$offsetX, 7, $label, 0, 'L', 1, 1, $headerFrame->x+$headerColumnWidth*2.0+$offsetX,
//						$pdf->GetY()+$offsetY);

					$pdf->SetFont('kozgopromedium', '');
					$pdf->MultiCell($headerColumnWidth-$offsetX, 7, $value, 0, 'R', 0, 1, $headerFrame->x+$headerColumnWidth*2.0+$offsetX,
						$pdf->GetY()+$offsetY);

						$offsetY = 1;
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
