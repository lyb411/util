<?php 
/**
 * 文件上传
 */
include './Upload.php';

/**
 * 上传参数
    在上传操作之前，我们可以对上传的属性进行一些设置，Upload类支持的属性设置包括：
    属性	描述
    maxSize	文件上传的最大文件大小（以字节为单位），0为不限大小
    rootPath	文件上传保存的根路径
    savePath	文件上传的保存路径（相对于根路径）
    saveName	上传文件的保存规则，支持数组和字符串方式定义
    saveExt	上传文件的保存后缀，不设置的话使用原文件后缀
    replace	存在同名文件是否是覆盖，默认为false
    exts	允许上传的文件后缀（留空为不限制），使用数组或者逗号分隔的字符串设置，默认为空
    mimes	允许上传的文件类型（留空为不限制），使用数组或者逗号分隔的字符串设置，默认为空
    autoSub	自动使用子目录保存上传文件 默认为true
    subName	子目录创建方式，采用数组或者字符串方式定义
    hash	是否生成文件的hash编码 默认为true
    callback	检测文件是否存在回调，如果存在返回文件信息数组
 */
if(!empty($_FILES)){
    
    /******************** 上传单个文件****************************************************/
    
    $upload = new Upload();// 实例化上传类
    $fileName = md5(mt_rand(100,1000).microtime(true).uniqid());//文件名
    $upload->maxSize   =     3145728 ;// 设置附件上传大小，3M=1024*1024*3
    $upload->exts      =     array('jpg', 'png', 'jpeg','gif');// 设置附件上传类型，后缀不区分大小写
    $upload->rootPath  =      './Uploads/'; // 设置附件上传根目录    
    $upload->subName   =     array('date','Ymd');
    $upload->saveName   =     $fileName;//保持上传文件名不变，如果你想保持上传的文件名不变，那么只需要设置命名规范为空即可，$upload->saveName = '';
    
    $info   =   $upload->uploadOne($_FILES['photo']);    
    echo '<pre>';       
    print_r($info);
    print_r($upload->getError());//上传失败错误值，字符串
    
    //返回值：
    /**
     * Array
         (
            [name] => b.jpg
            [type] => image/jpeg
            [size] => 63172
            [key] => 0
            [ext] => jpg
            [md5] => d78ce021b9b971fa5247d72df7d14b3c
            [sha1] => 490a3bbf53dbb24119e905a9ec470b0f9067f957
            [savename] => 56127e4f0c7fa.jpg
            [savepath] => 20151005/
        )
     */
    
    
}

?>

<form action="/liguibing/upload/demo.php" enctype="multipart/form-data" method="post" >
    <input type="file" name="photo" />
    <input type="submit" value="提交" >
</form>







