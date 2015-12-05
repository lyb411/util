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
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('C1', "Product Description");
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('D1', "产品描述");
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('E1', "Product Attributes Bullet Points1");
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('F1', "产品亮点1");
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('G1', "Product Attributes Bullet Points2");
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('H1', "产品亮点2");
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('I1', "Product Attributes Bullet Points3");
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('J1', "产品亮点3");
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('K1', "Product Attributes Bullet Points4");
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('L1', "产品亮点4");
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('M1', "Product Attributes Bullet Points5");
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('N1', "产品亮点5");
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('O1', "Search Terms1");
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('P1', "搜索词1");
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('Q1', "Search Terms2");
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('R1', "搜索词2");
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('S1', "Search Terms3");
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('T1', "搜索词3");
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('U1', "Search Terms4");
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('V1', "搜索词4");
$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('W1', "搜索词5");
$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('X1', "Platinum Keywords1");
$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('Y1', "白金关键词1");
$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('Z1', "Platinum Keywords2");
$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('AA1', "白金关键词2");
$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('AB1', "Platinum Keywords3");
$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('AC1', "白金关键词3");
$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('AD1', "Platinum Keywords4");
$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('AE1', "白金关键词4");
$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('AF1', "Platinum Keywords5");
$objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('AG1', "白金关键词5");
$objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('AH1', "Colour");
$objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('AI1', "颜色");
$objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('AJ1', "Size");
$objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setCellValue('AK1', "尺寸");
$objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setAutoSize(true);

//设置默认字体
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')->setSize(12);

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


/*----------------------数组方式填充数据
$dataArray = array(array('2010',    'Q1',   'United States',    790),
    array('2010',    'Q2',   'United States',    730),
    array('2010',    'Q3',   'United States',    860),
    array('2010',    'Q4',   'United States',    850),
    array('2011',    'Q1',   'United States',    800),
    array('2011',    'Q2',   'United States',    700),
    array('2011',    'Q3',   'United States',    900),
    array('2011',    'Q4',   'United States',    950),
    array('2010',    'Q1',   'Belgium',          380),
    array('2010',    'Q2',   'Belgium',          390),
    array('2010',    'Q3',   'Belgium',          420),
    array('2010',    'Q4',   'Belgium',          460),
    array('2011',    'Q1',   'Belgium',          400),
);
$objPHPExcel->getActiveSheet()->fromArray($dataArray, NULL, 'A2');
*/

//-----------------设置填充颜色-------------------------------------/
$objPHPExcel->getActiveSheet()->getStyle('B8:C8')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('B8:C8')->getFill()->getStartColor()->setARGB('FF808080');


//-----------------------------------设置边框------------------------/
$styleThinBlackBorderOutline = array(
    'borders' => array(
        'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN, //淡颜色 BORDER_THICK
            'color' => array('argb' => 'FF000000'), //颜色：  FF993300
        ),
    ),
);
$objPHPExcel->getActiveSheet()->getStyle('C9:D10')->applyFromArray($styleThinBlackBorderOutline);

//----------------设置单元格宽度--------------------------------------/
//自动
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
//指定宽度
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(35);

//---------------合并表格(基本上已经满足所有)--------------------------/
$objPHPExcel->getActiveSheet()->mergeCells('F2:J2');

//------------------------表格文字样式相关-----------------------------/
$objRichText = new PHPExcel_RichText();
//创建普通文本
$objRichText->createText('你好');
//创建富文本
$objPayable = $objRichText->createTextRun('你 好 吗？');
//加粗
$objPayable->getFont()->setBold(true);
//斜体
$objPayable->getFont()->setItalic(true);
//文字颜色
$objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_DARKGREEN ) );
$objPHPExcel->getActiveSheet()->setCellValue('B2', $objRichText);

//------------------------设置头样式，特别适合表头------------------------/
$objPHPExcel->getActiveSheet()->getStyle('A13:E13')->applyFromArray(
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

//---------------------------------------------------------------------/

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






