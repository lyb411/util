<?php
/**
 * @date 2015/11/12 16:31:11
 * @author liguibing(liguibing@nbfanyi.com)
 */
header('Content-Type:text/html;charset=utf-8');
set_time_limit(0);
ini_set("memory_limit","1024M");


//include phpexcel file
include_once dirname(__FILE__).'/PHPExcel/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();
//读取对象
$worksheet = $objPHPExcel->getActiveSheet();
//写对象
$objProps = $objPHPExcel->getProperties();

$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
               ->setLastModifiedBy("Maarten Balliauw")
               ->setTitle("Office 2007 XLSX Test Document")
               ->setSubject("Office 2007 XLSX Test Document")
               ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
               ->setKeywords("office 2007 openxml php")
               ->setCategory("Test result file");
               
//===================================================
//文件名
$date = date("Y_m_d",time());
$fileName = "test_excel";
$fileName .= "_{$date}.xlsx";

//数据
$headArr = array("第一列","第二列","第三列");
$data = array(array(1,2),array(1,3),array(5,7));

//设置表头
$key = ord("A");
foreach($headArr as $v){
    $colum = chr($key);
    $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
    $key += 1;
}
 
$column = 2;
$objActSheet = $objPHPExcel->getActiveSheet();
foreach($data as $key => $rows){ //行写入
    $span = ord("A");
    foreach($rows as $keyName=>$value){// 列写入
        $j = chr($span);
        $objActSheet->setCellValue($j.$column, $value);
        $span++;
    }
    $column++;
}

$fileName = iconv("gbk", "utf-8", $fileName);
//重命名表
$objPHPExcel->getActiveSheet()->setTitle('Simple');
//设置活动单指数到第一个表,所以Excel打开这是第一个表
$objPHPExcel->setActiveSheetIndex(0);
//将输出重定向到一个客户端web浏览器(Excel2007)
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header("Content-Disposition: attachment; filename=\"$fileName\"");
      header('Cache-Control: max-age=0');
      $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
      if(!empty($_GET['excel'])){
        $objWriter->save('php://output'); //文件通过浏览器下载
    }else{
        $objWriter->save($fileName); //脚本方式运行，保存在当前目录
    }