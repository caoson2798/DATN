<?php
try{
    require('Classes/PHPExcel.php');
    $conn_string = "host=localhost port=5432 dbname=BTL user=postgres password=geoserver";
    $dbconn = pg_connect($conn_string);
    $output="";
            // search
           
    
            // export table Cau
            if(isset($_POST['export_cau'])){
                $objExcel = new PHPExcel;
                $objExcel->setActiveSheetIndex(0);
                $sheet = $objExcel->getActiveSheet()->setTitle('user');

                $rowCount = 1;
                $sheet->setCellValue('A'.$rowCount,'gid');
                $sheet->setCellValue('B'.$rowCount,'name');
                $sheet->setCellValue('C'.$rowCount,'geom');

                $result = pg_query($dbconn, "SELECT * from cau");

                while($row = pg_fetch_array($result)){
                    $rowCount++;
                    $sheet->setCellValue('A'.$rowCount,$row['gid']);
                    $sheet->setCellValue('B'.$rowCount,$row['name']);
                    $sheet->setCellValue('C'.$rowCount,$row['geom']);
                }

                $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
                $filename = "cau.xlsx";
                $objWriter->save($filename);

            
                header('Content-Disposition: attachment; filename=' . $filename );
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Length: ' . filesize($filename));
                header('Content-Transfer-Encoding: binary');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                readfile($filename);
                return;
            }


            //export table Cong
            if(isset($_POST['export_cong'])){
                $objExcel = new PHPExcel;
                $objExcel->setActiveSheetIndex(0);
                $sheet = $objExcel->getActiveSheet()->setTitle('user');

                $rowCount = 1;
                $sheet->setCellValue('A'.$rowCount,'gid');
                $sheet->setCellValue('B'.$rowCount,'name');
                $sheet->setCellValue('C'.$rowCount,'poupinfo');
                $sheet->setCellValue('D'.$rowCount,'namxd');
                $sheet->setCellValue('E'.$rowCount,'vi tri');
                $sheet->setCellValue('F'.$rowCount,'quy mo');
                $sheet->setCellValue('G'.$rowCount,'van hanh');
                $sheet->setCellValue('H'.$rowCount,'luu luong');
                $sheet->setCellValue('I'.$rowCount,'cd_day');

                $result = pg_query($dbconn, "SELECT * from cong");

                while($row = pg_fetch_array($result)){
                    $rowCount++;
                    $sheet->setCellValue('A'.$rowCount,$row['gid']);
                    $sheet->setCellValue('B'.$rowCount,$row['name']);
                    $sheet->setCellValue('C'.$rowCount,$row['popupinfo']);
                    $sheet->setCellValue('D'.$rowCount,$row['nam_xd']);
                    $sheet->setCellValue('E'.$rowCount,$row['vi_tri']);
                    $sheet->setCellValue('F'.$rowCount,$row['quy_mo']);
                    $sheet->setCellValue('G'.$rowCount,$row['van_hanh']);
                    $sheet->setCellValue('H'.$rowCount,$row['luu_luong']);
                    $sheet->setCellValue('I'.$rowCount,$row['cd_day']);
                }

                $objWriter_2 = new PHPExcel_Writer_Excel2007($objExcel);
                $filename_2 = "cong.xlsx";
                $objWriter_2->save($filename_2);

            
                header('Content-Disposition: attachment; filename=' . $filename_2 );
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Length: ' . filesize($filename_2));
                header('Content-Transfer-Encoding: binary');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                readfile($filename_2);
                return;
        }


          // export table Dam
          if(isset($_POST['export_dam'])){
            $objExcel = new PHPExcel;
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet()->setTitle('user');

            $rowCount = 1;
            $sheet->setCellValue('A'.$rowCount,'gid');
            $sheet->setCellValue('B'.$rowCount,'Tên Đầm');
            $sheet->setCellValue('C'.$rowCount,'Dài');
            $sheet->setCellValue('D'.$rowCount,'Rộng');

            $result = pg_query($dbconn, "SELECT * from dam_polygon");

            while($row = pg_fetch_array($result)){
                $rowCount++;
                $sheet->setCellValue('A'.$rowCount,$row['gid']);
                $sheet->setCellValue('B'.$rowCount,$row['name']);
                $sheet->setCellValue('C'.$rowCount,$row['shape_leng']);
                $sheet->setCellValue('D'.$rowCount,$row['shape_area']);
            }

            $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
            $filename = "dam.xlsx";
            $objWriter->save($filename);

        
            header('Content-Disposition: attachment; filename=' . $filename );
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Length: ' . filesize($filename));
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            readfile($filename);
            return;
        }

         // export table Song
         if(isset($_POST['export_song'])){
            $objExcel = new PHPExcel;
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet()->setTitle('user');

            $rowCount = 1;
            $sheet->setCellValue('A'.$rowCount,'gid');
            $sheet->setCellValue('B'.$rowCount,'Tên Sông');
            $sheet->setCellValue('C'.$rowCount,'Dài');
            $sheet->setCellValue('D'.$rowCount,'Rộng');

            $result = pg_query($dbconn, "SELECT * from song_polygon");

            while($row = pg_fetch_array($result)){
                $rowCount++;
                $sheet->setCellValue('A'.$rowCount,$row['gid']);
                $sheet->setCellValue('B'.$rowCount,$row['name']);
                $sheet->setCellValue('C'.$rowCount,$row['shape_leng']);
                $sheet->setCellValue('D'.$rowCount,$row['shape_area']);
            }

            $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
            $filename = "song.xlsx";
            $objWriter->save($filename);

        
            header('Content-Disposition: attachment; filename=' . $filename );
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Length: ' . filesize($filename));
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            readfile($filename);
            return;
        }


        //export table Cong
        if(isset($_POST['export_trambom'])){
            $objExcel = new PHPExcel;
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet()->setTitle('user');

            $rowCount = 1;
            $sheet->setCellValue('A'.$rowCount,'gid');
            $sheet->setCellValue('B'.$rowCount,'Tên');
            $sheet->setCellValue('C'.$rowCount,'Quản lý');
            $sheet->setCellValue('D'.$rowCount,'Thông tin');
            $sheet->setCellValue('E'.$rowCount,'Năm xd');
            $sheet->setCellValue('F'.$rowCount,'Loại máy');
            $sheet->setCellValue('G'.$rowCount,'Mã lực');
            $sheet->setCellValue('H'.$rowCount,'Điện năng');

            $result = pg_query($dbconn, "SELECT * from tram_bom");

            while($row = pg_fetch_array($result)){
                $rowCount++;
                $sheet->setCellValue('A'.$rowCount,$row['gid']);
                $sheet->setCellValue('B'.$rowCount,$row['name']);
                $sheet->setCellValue('C'.$rowCount,$row['folderpath']);
                $sheet->setCellValue('D'.$rowCount,$row['popupinfo']);
                $sheet->setCellValue('E'.$rowCount,$row['nam_xd']);
                $sheet->setCellValue('F'.$rowCount,$row['loai_may']);
                $sheet->setCellValue('G'.$rowCount,$row['cs_text']);
                $sheet->setCellValue('H'.$rowCount,$row['dc_text']);
            }

            $objWriter_2 = new PHPExcel_Writer_Excel2007($objExcel);
            $filename_2 = "Trambom.xlsx";
            $objWriter_2->save($filename_2);

        
            header('Content-Disposition: attachment; filename=' . $filename_2 );
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Length: ' . filesize($filename_2));
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            readfile($filename_2);
            return;
    }




}catch(PDOException $e){
    echo $e->getMessage();
}
?>