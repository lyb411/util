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

//工作区域表格选取
$objPHPExcel->setActiveSheetIndex(0);

//表头
$objPHPExcel->getActiveSheet()->setCellValue('A1', "Item Title");
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('B1', "项目标题");
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);

$objPHPExcel->getActiveSheet()->setCellValue('C1', "Product Description");
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('D1', "产品描述");
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);

$objPHPExcel->getActiveSheet()->setCellValue('E1', "Product Attributes Bullet Points1");
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('F1', "产品亮点1");
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);

$objPHPExcel->getActiveSheet()->setCellValue('G1', "Product Attributes Bullet Points2");
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('H1', "产品亮点2");
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(12);

$objPHPExcel->getActiveSheet()->setCellValue('I1', "Product Attributes Bullet Points3");
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('J1', "产品亮点3");
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(12);

$objPHPExcel->getActiveSheet()->setCellValue('K1', "Product Attributes Bullet Points4");
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('L1', "产品亮点4");
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(12);

$objPHPExcel->getActiveSheet()->setCellValue('M1', "Product Attributes Bullet Points5");
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('N1', "产品亮点5");
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(12);

$objPHPExcel->getActiveSheet()->setCellValue('O1', "Search Terms1");
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('P1', "搜索词1");
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(12);

$objPHPExcel->getActiveSheet()->setCellValue('Q1', "Search Terms2");
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('R1', "搜索词2");
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(12);

$objPHPExcel->getActiveSheet()->setCellValue('S1', "Search Terms3");
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('T1', "搜索词3");
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(12);

$objPHPExcel->getActiveSheet()->setCellValue('U1', "Search Terms4");
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('V1', "搜索词4");
$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(12);

$objPHPExcel->getActiveSheet()->setCellValue('W1', "搜索词5");
$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('X1', "Platinum Keywords1");
$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('Y1', "白金关键词1");
$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(12);

$objPHPExcel->getActiveSheet()->setCellValue('Z1', "Platinum Keywords2");
$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('AA1', "白金关键词2");
$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(12);

$objPHPExcel->getActiveSheet()->setCellValue('AB1', "Platinum Keywords3");
$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('AC1', "白金关键词3");
$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(12);

$objPHPExcel->getActiveSheet()->setCellValue('AD1', "Platinum Keywords4");
$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('AE1', "白金关键词4");
$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(12);

$objPHPExcel->getActiveSheet()->setCellValue('AF1', "Platinum Keywords5");
$objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('AG1', "白金关键词5");
$objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(12);

$objPHPExcel->getActiveSheet()->setCellValue('AH1', "Colour");
$objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('AI1', "颜色");
$objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(12);

$objPHPExcel->getActiveSheet()->setCellValue('AJ1', "Size");
$objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('AK1', "尺寸");
$objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(12);

//设置默认字体
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')->setSize(12);

//表头样式
$objPHPExcel->getActiveSheet()->getStyle('A1:AK1')->applyFromArray(
    array(
        'font'    => array(
            'bold'      => true
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
        ),
        'borders' => array(
            'top'     => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        ),
        'fill' => array(
            'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
            'rotation'   => 90,
            'startcolor' => array(
                'argb' => 'FFA0A0A0'
            ),
            'endcolor'   => array(
                'argb' => 'FFFFFFFF'
            )
        )
    )
);


//填充数据--传统方式
$arr = array(2,3,4,5,6,7,8,9);
foreach ($arr as $i) {
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, "NFFDFD")
        ->setCellValue('B'.$i, "Product Description")
        ->setCellValue('C'.$i, "Product Attributes Bullet Points1")
        ->setCellValue('M'.$i, "Platinum Keywords1")
        ->setCellValue('N'.$i, "Platinum Keywords2")
        ->setCellValue('O'.$i, "Platinum Keywords3")
        ->setCellValue('R'.$i, "Colour")
        ->setCellValue('S'.$i, "Size");
}
//再填充数据
$objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A10', "Item Title")
        ->setCellValue('R11', "Colour")
        ->setCellValue('S12', "Size");


//--------------------------表名称转换---------------------------------/
$fileName = iconv("gbk", "utf-8", $fileName);

//---------------------------工作表区域重命名表---------------------------------/
//文字颜色
$objPHPExcel->getActiveSheet()->getTabColor()->setARGB('FF0094FF');
//名称
$objPHPExcel->getActiveSheet()->setTitle('这是第一个工作区域');
$objPHPExcel->setActiveSheetIndex(0);
//将输出重定向到一个客户端web浏览器(Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=\"$fileName\"");
header('Cache-Control: max-age=0');

//如果是直接下载，浏览器兼容
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

//保存版本,保存低版本参数：Excel5，高版本：Excel2007
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//浏览器下载文件或cli保存文件
if(!empty($_GET['excel'])){
    //文件通过浏览器下载
    $objWriter->save('php://output'); 
}else{
    //脚本方式运行，保存在当前目录
    $objWriter->save($fileName); 
}

echo "\n\n生成完毕\n\n";






