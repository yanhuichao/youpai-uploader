<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>又拍单图上传测试</title>
        <link rel="stylesheet" type="text/css" href="./webuploader/webuploader.css" >
        <script type="text/javascript" src="./jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="./webuploader/webuploader.js"></script>
        <script type="text/javascript" src="./up.js"></script>
    </head>
    <body>
        <?php
        require_once('./config.php');
        ?>

<div id="uploader-demo">
    <!--用来存放item-->
    <div id="fileList" class="uploader-list"></div>
    <div id="filePicker">选择图片</div>
        <input id="policy" type="hidden" name="policy" value="<?php echo $policy; ?>" />
        <input id="sign" type="hidden" name="signature" value="<?php echo $sign; ?>" />
        <input id="action" type="hidden" name="action" value="<?php echo $action; ?>" />
</div>


   <!-- 
    <form action="<?php echo $action; ?>" method="post" enctype="Multipart/form-data">
            <input type="hidden" name="policy" value="<?php echo $policy; ?>" />
            <input type="hidden" name="signature" value="<?php echo $sign; ?>" />
            <input type="file" name="file" />
            <input type="submit" />
        </form>
    -->
    </body>
</html>
