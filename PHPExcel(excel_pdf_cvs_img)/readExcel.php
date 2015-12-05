<?php
/**
 * @date 2015/11/12 16:31:11
 * @author liguibing(liguibing@nbfanyi.com)
 */
header('Content-Type:text/html;charset=utf-8');
set_time_limit(0);
ini_set("memory_limit","2G");

//phpexcel file
include_once dirname(__FILE__).'/PHPExcel/Classes/PHPExcel.php';

//模板，没有数据
//$fileName = './file/amzon_tpl.xlsx';
//有数据的模板
$fileName = './file/demo.xlsx';// Flat.File.Wireless.xls

//扩展名
$ext = strtolower(substr(strrchr($fileName, '.'), 1));
//2003 excel
if($ext == 'xls' ){
    $objReader = new PHPExcel_Reader_Excel5();
}
//2007 excel
if($ext == 'xlsx'){
    $objReader = new PHPExcel_Reader_Excel2007();
}
echo "\n开始读取\t{$fileName}\t文件";
$objPHPExcel = $objReader->load($fileName);

$objPHPExcel->setActiveSheetIndex(0);/工作区域表从0开始
$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

print_r($sheetData);

