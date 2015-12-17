<?php
// 普通的页面跳转型回调（回调过来的所有信息均为 UTF－8 编码，签名验证的时候需要注意编码是否一致）
$form_api_secret = '';  // 表单 API 功能的密钥

if (!isset($_GET['code']) || !isset($_GET['message']) || !isset($_GET['url']) || !isset($_GET['time'])) {
    header('HTTP/1.1 403 Not Access');
    die();
}

if (isset($_GET['sign'])) {
    if (md5("{$_GET['code']}&{$_GET['message']}&{$_GET['url']}&{$_GET['time']}&" . $form_api_secret) == $_GET['sign']) {
        if ($_GET['code'] == 200) {
            // 上传成功
            // 进行用户上传文件的记录等操作
            // 或者可以在这输出 js 回调你的表单页面
            die('上传成功');    
        }
        else {
            // 上传失败
            die('上传失败');
        }
    }
    else {
        // 回调的签名错误
        header('HTTP/1.1 403 Not Access');
        die('回调的签名错误');
    }
}
elseif (isset($_GET['non-sign'])) {
    if (md5("{$_GET['code']}&{$_GET['message']}&{$_GET['url']}&{$_GET['time']}&") == $_GET['non-sign']) {
        // 合法的上传回调
        // 上传失败
        die('上传失败'); 
    }
    else {
        // 回调的签名错误
        header('HTTP/1.1 403 Not Access');
        die('回调的签名错误');
    }
}
else {
    header('HTTP/1.1 403 Not Access');
    die();
}
