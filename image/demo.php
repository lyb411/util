<?php 
include './Image.php';

echo '<pre>';
$img = '/tmp/20151005/5613e8ca1832d87cb24a35a89b178fca.jpg';

$image = new Image(Image::IMAGE_GD);//GD库处理
$image->open($img);

/******************************获取图像信息**********************************************************************************************/
$width = $image->width(); // 返回图片的宽度
$height = $image->height(); // 返回图片的高度
$type = $image->type(); // 返回图片的类型
$mime = $image->mime(); // 返回图片的mime类型
$size = $image->size(); // 返回图片的尺寸数组 0 图片宽度 1 图片高度

/******************************生成缩略图，按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg******************************************/
//$image->thumb(150, 150)->save('/tmp/20151005/thumb.jpg');//我们看到实际生成的缩略图并不是150*150，因为默认采用原图等比例缩放的方式生成缩略图，最大宽度是150。
/* IMAGE_THUMB_SCALE     =   1 ; //等比例缩放类型(默认)
 IMAGE_THUMB_FILLED    =   2 ; //缩放后填充类型
IMAGE_THUMB_CENTER    =   3 ; //居中裁剪类型
IMAGE_THUMB_NORTHWEST =   4 ; //左上角裁剪类型
IMAGE_THUMB_SOUTHEAST =   5 ; //右下角裁剪类型
IMAGE_THUMB_FIXED     =   6 ; //固定尺寸缩放类型 */

/******************************添加图片水印*************************************************************************************************/
/* $image->crop(440, 440)->save('/tmp/20151005/crop.jpg');//将图片裁剪为440x440并保存为corp.jpg
$image->water('/tmp/20151005/logo.png')->save("/tmp/20151005/water.gif");// 给裁剪后的图片添加图片水印（水印文件位于./logo.png），位置为右下角，保存为water.gif

// 给原图添加水印并保存为water_o.gif（需要重新打开原图）
$image->open($img)->water('/tmp/20151005/logo.png')->save("water_o.gif");  

//透明水印图片
$image->open($img)->water('/tmp/20151005/logo.png',Image::IMAGE_WATER_SOUTHEAST,30)->save("/tmp/20151005/water_o.gif");

//水印位置(water参数)：
IMAGE_WATER_NORTHWEST =   1 ; //左上角水印
IMAGE_WATER_NORTH     =   2 ; //上居中水印
IMAGE_WATER_NORTHEAST =   3 ; //右上角水印
IMAGE_WATER_WEST      =   4 ; //左居中水印
IMAGE_WATER_CENTER    =   5 ; //居中水印
IMAGE_WATER_EAST      =   6 ; //右居中水印
IMAGE_WATER_SOUTHWEST =   7 ; //左下角水印
IMAGE_WATER_SOUTH     =   8 ; //下居中水印
IMAGE_WATER_SOUTHEAST =   9 ; //右下角水印
*/

/******************************添加图片文字水印*************************************************************************************************/
//$image->open($img)->text('N邦翻译','./zhttfs/5.ttf',20,'#FFFFFF',Image::IMAGE_WATER_SOUTHEAST)->save("/tmp/20151005/new.jpg");

/******************************裁剪图片,将图片裁剪为400x400并保存为corp.jpg*****************************************************************/
//$image->crop(400, 400)->save('/tmp/20151005/crop.jpg');
//支持从某个坐标开始裁剪，例如下面从（100，30）开始裁剪
//$image->crop(400, 400,100,30)->save('./crop.jpg');

/******************************居中裁剪 后生成的缩略图****************************************************************************************/
//$image->thumb(150, 150,Image::IMAGE_THUMB_CENTER)->save('./thumb.jpg');

/******************************左上角剪裁****************************************************************************************/
//$image->thumb(150, 150,Image::IMAGE_THUMB_NORTHWEST)->save('./thumb.jpg');

/******************************缩放填充****************************************************************************************/
//$image->thumb(150, 150,\Think\Image::IMAGE_THUMB_FILLED)->save('./thumb.jpg');

/******************************固定大小,生成一个固定大小为150*150的缩略图并保存为thumb.jpg*****************************************************/
//$image->thumb(150, 150,\Think\Image::IMAGE_THUMB_FIXED)->save('./thumb.jpg');









