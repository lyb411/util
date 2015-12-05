<?php 

/**
 * @category    NB
 * @package     cooperate
 * @subpackage  dao
 * @author      李贵兵 <liguibing@nbfanyi.com>
 * @version     2015/11/11 13:23:41
 * @copyright   Copyright (c) 2015 Nbfy.com, Inc. All Rights Reserved.
 **/

/**
 * 文件工具类
 */
class fileLib extends Controller{
    /**
     * 读取docx文档（word文档）
     * @param string $filename 文档绝对路径
     * @return string|bool
     */
    public static function readDocx($filename){            
        set_time_limit(0);
        $striped_content = '';
        $content = '';
        
        $ext = strtolower(substr(strrchr($filename, '.'), 1));
        if($ext != 'docx'){
            return '';
        }
        
        if(!$filename || !file_exists($filename)){
            return '';
        }
        
        $zip = zip_open($filename);
        if (!$zip || is_numeric($zip)){
            return '';
        }
        
        while ($zip_entry = zip_read($zip)) {            
            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;
    
            if (zip_entry_name($zip_entry) != "word/document.xml") continue;
    
            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
    
            zip_entry_close($zip_entry);
        }
        zip_close($zip);
        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content);
        
        return $striped_content;
    }
    
    /**
     * 读取文件内容，目前支持：docx,txt,xlxs
     * 
     * @parama $file_path
     */
    public function readFileContent($filePath,$contentType=true,$dataAre=false){
        $this->getLibrary('phpexcel');
        
        if(!$filePath || !file_exists($filePath)){
            return '';
        }
        
        $ext = strtolower(substr(strrchr($filePath, '.'), 1));
        if($ext == 'txt'){
            return file_get_contents($filePath);
        }
        
        if($ext == 'docx'){
            return self::readDocx($filePath);
        }
                
        if($ext == 'xlsx' || $ext == 'xls' || $ext == 'xlsm'){
            return phpexcelInit::readExcel($filePath,$contentType,$dataAre);
        }
    }
}