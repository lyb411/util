<?php
/**
 * @date 2015/11/12 16:31:11
 * @author liguibing(liguibing@nbfanyi.com)
 */
$str = file_get_contents('file/def.txt');

$newStr = explode("\r\n", $str);
foreach($newStr as $k=>$v){
    print_r($v);
    echo "\n\n";
}