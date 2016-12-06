<?php
header('content-type:image/png');
//1.创建背景框   imagecreatetruecolor    创建一张真彩背景
$bg_w=200;//长
$bg_h=50;//高
$bgcolorarrayint=array(rand(0,255),rand(0,255),rand(0,255));
$textcolorarrayint=array(255,255,255);
$hp=5;//高偏
$xp=25;//长
$num=4;//验证码个数
$size=20;//验证码字体大小
$bg=imagecreatetruecolor($bg_w, $bg_h);//就是一张黑色图片
//2.背景涂色
//随机颜色
$bg_c=imagecolorallocate($bg,$bgcolorarrayint[0],$bgcolorarrayint[1],$bgcolorarrayint[2]);//创建背景颜色
imagefilledrectangle($bg, 0, 0, $bg_w, $bg_h, $bg_c);//填充颜色
//3.放入文字  imagechar() 字体大小1-5
$text_c=imagecolorallocate($bg, $textcolorarrayint[0],$textcolorarrayint[1],$textcolorarrayint[2]);//创建字体颜色
//字符串的下标从0开始   长度是从1开始
// $str='qwerrtyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789';//希望出现的随机字符
// $maxindex=strlen($str)-1;//获取最大下标
$number=array('min'=>48,'max'=>57);
$lower=array('min'=>97,'max'=>122);
$upper=array('min'=>65,'max'=>90);
$arr=array($number,$lower,$upper);
$str='';
for ($i=0; $i <$num ; $i++){
	$tmp=$arr[rand(0,2)];//从小写大写  数字当中随机抽取一组出来
	$code=chr(rand($tmp['min'],$tmp['max']));
	$str.=$code;
	// imagechar($bg, 6,$xp+50*$i, $bg_h/2+$hp,$code, $text_c);//放字符
	imagettftext($bg, 20, rand(-30,30), $xp+50*$i,($bg_h-$size)/2+$size+rand(-$hp,$hp) , $text_c, './font/123.ttf', $code);
}
session_start();
$_SESSION['code']=strtoupper($str);
//干扰元素   干扰点   干扰线   干扰字符
$pix_c=imagecolorallocate($bg, 255, 255, 255);
for ($i=0; $i <100; $i++) {
	imagesetpixel($bg, rand(0,$bg_w),rand(0,$bg_h), $pix_c);
}
for ($i=0; $i <5; $i++) {
	imageline($bg,rand(0,10),rand(0,$bg_h),rand($bg_w-10,$bg_w),rand(0,$bg_h), $pix_c);
}
// imagechar($bg, 1, 10, 10, '123123', $pix_c);
for ($i=0; $i <20 ; $i++) { 
	imagettftext($bg, $size, 0, rand(0,$bg_w),rand(0,$bg_h), $pix_c, './font/123.ttf', '*');
}
//输出图像   imagepng/imagejpeg
imagepng($bg);//输出背景



?>