<?php
try {
    require('Classes/PHPExcel.php');
    require "database/cong.php";
    require "database/nmns.php";
    require "database/trambom.php";
    require "database/diemnhanthai.php";
    require "database/diemxathai.php";
    require "database/kenh.php";
    $conn_string = "host=localhost port=5432 dbname=TL_VinhBao user=postgres password=chson2798";
    $dbconn = pg_connect($conn_string);
    $output = "";
    // search

    if (isset($_POST['export_NMN'])) {
        $objExcel = new PHPExcel;
        $objExcel->setActiveSheetIndex(0);
        $sheet = $objExcel->getActiveSheet()->setTitle('user');

        $rowCount = 1;
        $sheet->setCellValue('A' . $rowCount, 'gid');
        $sheet->setCellValue('B' . $rowCount, 'Tên nhà máy');
        $sheet->setCellValue('C' . $rowCount, 'Tên hồ sơ');
        $sheet->setCellValue('D' . $rowCount, 'Địa chỉ');
        $sheet->setCellValue('E' . $rowCount, 'Đơn vị quản lý');
        $sheet->setCellValue('F' . $rowCount, 'Trạng thái hđ');
        $sheet->setCellValue('G' . $rowCount, 'Vùng phục vụ');


        $result = getAllDataNMNS();

        while ($row = pg_fetch_array($result)) {
            $rowCount++;
            $sheet->setCellValue('A' . $rowCount, $row['gid']);
            $sheet->setCellValue('B' . $rowCount, $row['ten_nmn']);
            $sheet->setCellValue('C' . $rowCount, $row['ten_hso']);
            $sheet->setCellValue('D' . $rowCount, $row['dia_chi']);
            $sheet->setCellValue('E' . $rowCount, $row['dvi_qly']);
            $sheet->setCellValue('F' . $rowCount, $row['tt_hdong']);
            $sheet->setCellValue('G' . $rowCount, $row['vung_pvu']);
        }

        $from = "A1"; // or any value
        $to = "G1"; // or any value
        $objExcel->getActiveSheet()->getStyle("$from:$to")->getFont()->setBold(true);
        $objExcel->getActiveSheet()->getStyle("$from:$to")->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'cccccc')
                )
            )
        );

        $sheet1 = $objExcel->getActiveSheet();
        foreach ($sheet1->getColumnIterator() as $column) {
            $sheet1->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        $objWriter_2 = new PHPExcel_Writer_Excel2007($objExcel);
        $filename_2 = "NMN.xlsx";
        $objWriter_2->save($filename_2);


        header('Content-Disposition: attachment; filename=' . $filename_2);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Length: ' . filesize($filename_2));
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        readfile($filename_2);
        return;
    }


    if (isset($_POST['export_DNT'])) {
        $objExcel = new PHPExcel;
        $objExcel->setActiveSheetIndex(0);
        $sheet = $objExcel->getActiveSheet()->setTitle('user');

        $rowCount = 1;
        $sheet->setCellValue('A' . $rowCount, 'gid');
        $sheet->setCellValue('B' . $rowCount, 'Tên điểm nhận');
        $sheet->setCellValue('C' . $rowCount, 'Địa chỉ');
        $sheet->setCellValue('D' . $rowCount, 'Thôn');
        $sheet->setCellValue('E' . $rowCount, 'Kênh nhận');
        $sheet->setCellValue('F' . $rowCount, 'Loại Kênh');
        $sheet->setCellValue('G' . $rowCount, 'Ngành sản xuất');
        $sheet->setCellValue('H' . $rowCount, 'Số gp');
        $sheet->setCellValue('I' . $rowCount, 'Ngày cấp');
        $sheet->setCellValue('J' . $rowCount, 'Số điện thoại');


        $result = getAllDataDiemNhanThai();

        while ($row = pg_fetch_array($result)) {
            $rowCount++;
            $sheet->setCellValue('A' . $rowCount, $row['gid']);
            $sheet->setCellValue('B' . $rowCount, $row['tendn']);
            $sheet->setCellValue('C' . $rowCount, $row['diachi']);
            $sheet->setCellValue('D' . $rowCount, $row['thon']);
            $sheet->setCellValue('E' . $rowCount, $row['kenhnhan']);
            $sheet->setCellValue('F' . $rowCount, $row['loaikenh']);
            $sheet->setCellValue('G' . $rowCount, $row['nganhsx']);
            $sheet->setCellValue('H' . $rowCount, $row['sogp']);
            $sheet->setCellValue('I' . $rowCount, $row['ngaycap']);
            $sheet->setCellValue('J' . $rowCount, $row['sdt']);
        }

        $from = "A1"; // or any value
        $to = "J1"; // or any value
        $objExcel->getActiveSheet()->getStyle("$from:$to")->getFont()->setBold(true);
        $objExcel->getActiveSheet()->getStyle("$from:$to")->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'cccccc')
                )
            )
        );

        $sheet1 = $objExcel->getActiveSheet();
        foreach ($sheet1->getColumnIterator() as $column) {
            $sheet1->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        $objWriter_2 = new PHPExcel_Writer_Excel2007($objExcel);
        $filename_2 = "DiemNhanThai.xlsx";
        $objWriter_2->save($filename_2);


        header('Content-Disposition: attachment; filename=' . $filename_2);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Length: ' . filesize($filename_2));
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        readfile($filename_2);
        return;
    }

    if (isset($_POST['expot_DXT'])) {
        $objExcel = new PHPExcel;
        $objExcel->setActiveSheetIndex(0);
        $sheet = $objExcel->getActiveSheet()->setTitle('user');

        $rowCount = 1;
        $sheet->setCellValue('A' . $rowCount, 'gid');
        $sheet->setCellValue('B' . $rowCount, 'Tên điểm nhận');
        $sheet->setCellValue('C' . $rowCount, 'Địa chỉ');
        $sheet->setCellValue('D' . $rowCount, 'Thôn');
        $sheet->setCellValue('E' . $rowCount, 'Kênh nhận');
        $sheet->setCellValue('F' . $rowCount, 'Loại Kênh');
        $sheet->setCellValue('G' . $rowCount, 'Ngành sản xuất');
        $sheet->setCellValue('H' . $rowCount, 'Số gp');
        $sheet->setCellValue('I' . $rowCount, 'Ngày cấp');
        $sheet->setCellValue('J' . $rowCount, 'Số điện thoại');


        $result = getAllDataDiemXaThai();

        while ($row = pg_fetch_array($result)) {
            $rowCount++;
            $sheet->setCellValue('A' . $rowCount, $row['gid']);
            $sheet->setCellValue('B' . $rowCount, $row['tendn']);
            $sheet->setCellValue('C' . $rowCount, $row['diachi']);
            $sheet->setCellValue('D' . $rowCount, $row['thon']);
            $sheet->setCellValue('E' . $rowCount, $row['kenhnhan']);
            $sheet->setCellValue('F' . $rowCount, $row['loaikenh']);
            $sheet->setCellValue('G' . $rowCount, $row['nganhsx']);
            $sheet->setCellValue('H' . $rowCount, $row['sogp']);
            $sheet->setCellValue('I' . $rowCount, $row['ngaycap']);
            $sheet->setCellValue('J' . $rowCount, $row['sdt']);
        }

        $from = "A1"; // or any value
        $to = "J1"; // or any value
        $objExcel->getActiveSheet()->getStyle("$from:$to")->getFont()->setBold(true);
        $objExcel->getActiveSheet()->getStyle("$from:$to")->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'cccccc')
                )
            )
        );

        $sheet1 = $objExcel->getActiveSheet();
        foreach ($sheet1->getColumnIterator() as $column) {
            $sheet1->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        $objWriter_2 = new PHPExcel_Writer_Excel2007($objExcel);
        $filename_2 = "DiemXaThai.xlsx";
        $objWriter_2->save($filename_2);


        header('Content-Disposition: attachment; filename=' . $filename_2);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Length: ' . filesize($filename_2));
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        readfile($filename_2);
        return;
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
