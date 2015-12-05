<?php
/**
 * @date 2015/11/12 16:31:11
 * @author liguibing(liguibing@nbfanyi.com)
 */
include_once dirname(__FILE__).'/PHPExcel/PHPExcel.php';

class phpexcelInit {
    
    /**
     * 读取excel信息
     * xls,xlsx,
     * 
     * @param string $fileName         文件绝对路径
     * @param bool $dataArea	       excel区域 
	 *
     * @return array() | string
     */
    public static function readExcel($fileName='',$contentType=false,$dataArea=false){
        ini_set('memory_limit','300M');
        $ext = strtolower(substr(strrchr($fileName, '.'), 1));
        
        //2003 excel
        if($ext == 'xls' ){
            $objReader = new PHPExcel_Reader_Excel5();
        }
        
        //2007 excel
        if($ext == 'xlsx'){
            $objReader = new PHPExcel_Reader_Excel2007();
        }
        $objPHPExcel = $objReader->load($fileName);
        
		if($dataArea == true){
			$objPHPExcel->setActiveSheetIndex(3);
		}
        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        if($contentType){
            //返回字符串
            $str = '';
            foreach ($sheetData as $k => $v) {
                foreach($v as $kk=>$vv){
                    $str .= $vv;
                }
            }
            return $str;
        }
        return $sheetData;
    }
    
    //demo
    /*
     include 'PHPExcel/PHPExcel.php';
    $inputFileType = 'Excel2007';
    $inputFileName = './test.xlsx';
    $inputFileName = './example1.xls';
    //echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using PHPExcel_Reader_Excel5<br />';
    $objReader = new PHPExcel_Reader_Excel5();
    // $objReader = new PHPExcel_Reader_Excel2007();
    //  $objReader = new PHPExcel_Reader_Excel2003XML();
    //  $objReader = new PHPExcel_Reader_OOCalc();
    //  $objReader = new PHPExcel_Reader_SYLK();
    //  $objReader = new PHPExcel_Reader_Gnumeric();
    //  $objReader = new PHPExcel_Reader_CSV();
    $objPHPExcel = $objReader->load($inputFileName);
    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);*/
}


