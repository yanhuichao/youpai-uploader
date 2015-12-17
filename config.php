<?php
require_once('../upyun.class.php');

$upyun = new UpYun('bucket_name', 'form_api_secret');

$opts = array();
// 必选参数
$opts['save-key'] = '/{year}/{mon}/{day}/upload_{filename}{.suffix}';   // 保存路径
// 以下参数均为可选
/*
$opts['allow-file-type'] = '';   // 文件类型限制，如：jpg,gif,png
$opts['content-length-range'] = '';  // 文件大小限制，如：102400,1024000 单位：Bytes
$opts['content-md5'] = '';  // 文件校验码（根据上传文件的内容进行 md5 校验后得到的数值），如：202cb962ac59075b964b07152d234b70
$opts['content-secret'] = '';   //原图访问密钥，如：abc
$opts['content-type'] = ''; // 指定文件类型，如：image/jpeg
$opts['image-width-range'] = '';  // 图片宽度限制，如：0,1024 单位：像素
$opts['image-height-range'] = ''; // 图片高度限制，如：0,1024 单位：像素
$opts['notify-url'] = '';   // 异步回调 url，如：http://img.helloword.com/notify.php
$opts['return-url'] = 'http://localhost/return.php';    // 同步跳转 url，如：http://localhost/return.php
$opts['x-gmkerl-thumbnail'] = '';   // 缩略图版本名称，如：small
$opts['x-gmkerl-type'] = '';    // 缩略类型，如：fix_max
$opts['x-gmkerl-value'] = '';    // 缩略类型对应的参数值，根据缩略类型填写
$opts['x-gmkerl-quality'] = ''; // 缩略图质量，0~100，推荐 65~75
$opts['x-gmkerl-unsharp'] = ''; // 图片锐化，默认 true
$opts['x-gmkerl-rotate'] = '';  // 图片旋转，参数：auto 90 180 或 270
$opts['x-gmkerl-crop'] = '';    // 图片裁剪，格式：x,y,width,height
$opts['x-gmkerl-exif-switch'] = ''; // 是否保留 exif 信息，参数：true
$opts['ext-param'] = '';    // 额外参数
 */

$policy = $upyun->policyCreate($opts);
$sign = $upyun->signCreate($opts);
$action = $upyun->action();
$version = $upyun->version();
