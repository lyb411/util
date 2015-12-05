<?php 

//页面请求时间，创建验证码需要
define('NOW_TIME',      $_SERVER['REQUEST_TIME']);

include './verify.php';

/**
验证码参数
可以对生成的验证码设置相关的参数，以达到不同的显示效果。 这些参数包括：
参数	描述
expire	验证码的有效期（秒）
useImgBg	是否使用背景图片 默认为false
fontSize	验证码字体大小（像素） 默认为25
useCurve	是否使用混淆曲线 默认为true
useNoise	是否添加杂点 默认为true
imageW	验证码宽度 设置为0为自动计算
imageH	验证码高度 设置为0为自动计算
length	验证码位数
fontttf	指定验证码字体 默认为随机获取
useZh	是否使用中文验证码
bg	验证码背景颜色 rgb数组设置，例如 array(243, 251, 254)
seKey	验证码的加密密钥
codeSet	验证码字符集合 3.2.1 新增
zhSet	验证码字符集合（中文） 3.2.1 新增
 */

//001==实例============
$Verify = new verify();
$Verify->length = 4;
$Verify->entry(1);

//002==实例============
//如果你需要在一个页面中生成多个验证码的话，entry方法需要传入可标识的信息，例如： 验证码1：
//$Verify = new Verify();
//$Verify->entry(1);
//$Verify->entry(2);

//003==实例============
/* $config=array(
	'imageW'	=>'130',
	'imageH'	=>'35',
	'fontSize'	=>'18',
	'length'	=>4,
    'useCurve'    =>    false,    //是否使用混淆曲线
    'useNoise'    =>    false,    //是否使用杂点 
);
$Verify = new Verify($config);//需要重新实例化
$Verify->entry(); */

//004====背景图========
// 开启验证码背景图片功能 随机使用 Verify/bgs 目录下面的图片
/* $Verify = new Verify();
$config=array(
    'imageW'	=>'130',
    'imageH'	=>'35',
    'fontSize'	=>'18',
    'length'	=>4,
    'useCurve'    =>    false,    //是否使用混淆曲线
    'useNoise'    =>    false,    //是否使用杂点
    'useImgBg'    => true,//背景图
);
$Verify->entry(); */

//005==========中文, 验证码字体使用Verify/ttfs/5.ttf
/* $Verify = new Verify();
$Verify->useZh = true;
$Verify->entry(); */


//006=====指定验证码字符验证码(自定义)
/* $Verify = new Verify();
$Verify->codeSet = '012ABDerwr3456789zwen';
$Verify->entry(); */

//007=====指定验证码字符验证码(自定义)--中文
/* $Verify = new Verify();
$Verify->useZh = true;
$Verify->zhSet = '们以我到他会作时要动国产的一是工就年阶义发成部民可出能方进在了不和有大这'; 
$Verify->entry(); */

//===========检测验证码==================================
/* include './verify.php';
$Verify = new Verify();
$id = 1;//编号，如果没有，在不填写
$info = $Verify->check('qylf', $id);
var_dump($info);//返回true通过，反正不正确,不区分大小写 */







