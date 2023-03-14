<?php
$weekArray=["Sun","Mon","Tues","Wed","Thur","Fri","Sat"];

$modules = isset($_REQUEST['module']) ? $_REQUEST['module']: "normal";

?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta name="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="TechFusionFM.com" />
    <title>
        <?php
        
if(isset($_REQUEST['id'])) {
    $file_path = "./volume/".$_REQUEST['id'].".json";
    
    if(file_exists($file_path)) {
        $json = fopen($file_path, "r") or die("Unable to open file!");
        $json = json_decode(fread($json,filesize($file_path)),true);
        echo "#".$json["id"].": ".$json["title"]." ";
    } 
    
    else {
        echo "404";
    }
    #0: Title
} else {
?>
        雾凇电台<?php }?> | RimeRadio
    </title>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0" name="viewport" />
    <link rel="stylesheet" href="assets/css/style.css??t=<?php echo time();?>" />
    <link rel="stylesheet" href="assets/css/rimeicons.css?t=<?php echo time();?>" />
</head>

<body>
    <div class="nav">
        <div class="nav-content">
            <div class="nav-title"><a>Rime Radio</a></div>
            <div class="nav-link">
                <a href="/">首页</a>
                <a href="?module=about" class="<?php echo $modules == 'about' ? "active": ""; ?>">关于</a>
            </div>
        </div>
    </div>
    <?php

include "./modules/".$modules.".php"; 

?>
    <script src="assets/js/jquery.min.js?v3.6.4"></script>
</body>

</html>