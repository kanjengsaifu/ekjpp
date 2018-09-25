<?php
/**
 * @author     Harmaji Aribowo
 * @link       http://harmaji.com
 * @Location   ./application/helper/export_helper.php
*/
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('get_excel'))
{
	function get_excel($data,$header=array(),$title='laporan', $fixed_col = '', $data_footer = false, $is_string = array() ) {
		 ob_start();
		 $CI =& get_instance();
		 $CI->load->library('PHPXl');
		 $objPHPExcel = new PHPExcel();
         $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
         );
        
        // Assign cell values
        $objPHPExcel->setActiveSheetIndex(0);

		//set header
        $jum_header = count($header)+1;
        $last_col = 'A';
        for ( $i=1; $i<$jum_header; $i++ ) {
            $last_col++;
        }

        $b = 1;
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$b, $title);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$b)->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$b)->getFont()->setSize(14);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$b)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$b)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $b++;
		$col_excel = 'A';
        $row = $b+1;
        $start_row = $row;
		$next_row = generate_header_excel($objPHPExcel, $header, $col_excel, $row);
        $i = $next_row+1;
        $first_row_data = $i;
		$nomor = 1;
        $last_col = '';
        foreach ($data as $row) {
			$col_excel = 'A';
            $jum_col = 1;
			$objPHPExcel->getActiveSheet()->setCellValue($col_excel . $i, $nomor);
            $objPHPExcel->getActiveSheet()->getStyle($col_excel.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$col_excel++;
            $jum_col++;
            $last_col = $col_excel;
			if(is_array($row)){
				// jika menggunakan kolom
				//foreach($kolom as $col){
				foreach ($row as $key_row => $value_row) {
					$value= $value_row;
                    $is_nip = in_array(strtolower($key_row), array('nip','npwp')) ? true : false;
                    $is_nomor_rekening = strtolower($key_row) == 'nomor_rekening' ? true : false;
                    $type_string = in_array($key_row, $is_string) ? true : false;
				    
					if(is_numeric($value) && !$is_nip && !$is_nomor_rekening && !$type_string ){
						$objPHPExcel->getActiveSheet()->setCellValueExplicit($col_excel .  $i, $value, PHPExcel_Cell_DataType::TYPE_NUMERIC);
						if(is_float($value)){
							$objPHPExcel->getActiveSheet()->getStyle($col_excel .  $i)->getNumberFormat()->setFormatCode('#,##0.00');
						} else {
							$objPHPExcel->getActiveSheet()->getStyle($col_excel .  $i)->getNumberFormat()->setFormatCode('#,##0');
						}
					}
                    else if ( $is_nip || $is_nomor_rekening || $type_string ) {
                        $objPHPExcel->getActiveSheet()->getStyle($col_excel . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                        $objPHPExcel->getActiveSheet()->setCellValue($col_excel . $i, '="'.$value.'"');
                    }
					else {
					    $objPHPExcel->getActiveSheet()->setCellValue($col_excel . $i, $value);
					}
                    $objPHPExcel->getActiveSheet()->getStyle($col_excel.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
                    $last_col = $col_excel;
				    $col_excel++;
                    $jum_col++;
				//}
				} 
			}
            $i++;
			$nomor++;
        }
        if ( $data_footer ) {
            $col_excel = 'A';
            foreach ( $data_footer as $item ) {
                $value = $item['value'];
                if(is_numeric($value)){
                    $objPHPExcel->getActiveSheet()->setCellValueExplicit($col_excel .  $i, $value, PHPExcel_Cell_DataType::TYPE_NUMERIC);
                    if(is_float("".$value + 0)){
                        $objPHPExcel->getActiveSheet()->getStyle($col_excel .  $i)->getNumberFormat()->setFormatCode('#,##0.00');
                    } else {
                        $objPHPExcel->getActiveSheet()->getStyle($col_excel .  $i)->getNumberFormat()->setFormatCode('#,##0');
                    }
                }
                else {
                    $objPHPExcel->getActiveSheet()->setCellValue($col_excel . $i, $value);
                }
                $objPHPExcel->getActiveSheet()->getStyle($col_excel.$i)->getFont()->setBold(true);
                if ( $item['merge_col'] > 1 ) {
                    $next_col = $col_excel;
                    for ( $x=1; $x<$item['merge_col']; $x++ ) {
                        $next_col++;
                    }
                    $objPHPExcel->getActiveSheet()->mergeCells($col_excel.$i.':'.$next_col.$i);
                    $col_excel = $next_col;
                }
                $col_excel++;
            }
            $i++;
        }
        
		// autoresize the column
        $cols = 'A';
        $first_cols = '';
		for ( $x=1; $x<=$jum_col; $x++ ) {

            if ( $cols == 'Z' ) {
                $cols = 'A';
                if ( empty($first_cols) )
                    $first_cols = 'A';
                else
                    $first_cols++;
            } else {
                $cols++;
            }
		}
        $objPHPExcel->getActiveSheet()->getStyle('B'.$first_row_data.':'.$last_col.($i-1))
                                      ->getAlignment()->setWrapText(true);
        if ( !empty($fixed_col) ) {
            $first_cols = 'A';
            for ( $x=0; $x<$fixed_col; $x++ ) {
                $first_cols++;
            }
            $objPHPExcel->getActiveSheet()->freezePane($first_cols.$first_row_data);
        }
        $objPHPExcel->getActiveSheet()->getStyle('A'.$start_row.':'.$last_col.($i-1))->applyFromArray($styleArray);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$title.'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }
    function generate_header_excel($objPHPExcel, $header, $col, $row) {
        $col_excel = $col;
        $last_row = $row;
        foreach ( $header as $item ) {
            $objPHPExcel->getActiveSheet()->setCellValue($col_excel.$row, $item['label']);
            $objPHPExcel->getActiveSheet()->getStyle($col_excel.$row)->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle($col_excel.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $next_col = $col_excel;
            $next_row = $row;
            if ( isset($item['width']) && is_numeric($item['width']) && $item['width'] > 0 ) {
                $objPHPExcel->getActiveSheet()->getColumnDimension($col_excel)->setWidth($item['width']);
            }
            if ( $item['merge_row'] > 0 ) {
                $next_row = ($row+$item['merge_row'])-1;
            }
            if ( $item['merge_col'] > 0 ) {
                for ( $i=1; $i<$item['merge_col']; $i++ ) {
                    $next_col++;
                }
            }
            if ( $item['merge_row'] > 0 || $item['merge_col'] > 0 ) {
                $objPHPExcel->getActiveSheet()->mergeCells($col_excel.$row.':'.$next_col.$next_row);
            }

            if ( is_array($item['child']) && count($item['child']) > 0 ) {
                $last_row = generate_header_excel($objPHPExcel, $item['child'], $col_excel, ($row+1));
            }
            $col_excel = $next_col;
            $col_excel++;
        }
        return $last_row;
    }
}


/* End of file export_helper.php */
