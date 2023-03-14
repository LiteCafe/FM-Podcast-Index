<?php
if(isset($_REQUEST['id'])) {
    if(file_exists($file_path)) {
        $file_path = "./volume/".$_REQUEST['id'].".json";
        $json = fopen($file_path, "r") or die("Unable to open file!");
        $json = json_decode(fread($json,filesize($file_path)),true);
?>
<div class="content">
    <div class="back">
        <a href="../"><span class="rimeicon arrow-left"></span></i> 返回</a>
    </div>
    <div class="post-page">
        <div class="post">
            <div class="post-title">
                <h3><a>#<?php echo $json['id'] ?>: 「<?php echo $json['title'] ?>」</a></h3>
            </div>
            <br />
            <audio controls preload="metadata" src="./audio/<?php echo $json['audio_file'] ?>?t=<?php echo time()?>"
                type="audio/mpeg" class="audioPlayer"></audio>
            <div class="post-content">
                <p><?php echo $json['description'] ?></p>
                <h4>主要内容：</h4>
                <ul>
                    <?php
$length = count($json['content']);
for ($i=0;$i<$length;$i++) {
?>
                    <li><?php echo $json['content'][$i][0] ." - ".$json['content'][$i][1];
?>
                        </a>
                    </li>
                    <?php
}
?>
                </ul>
                <h4>参考链接：</h4>
                <ul>
                    <?php
$length = count($json['references']);
for ($i=0;$i<$length;$i++) {
?>
                    <li><?php echo $json['references'][$i][0] . ' - '.$json['references'][$i][1]." ";
?><a <?php if($json['references'][$i][3] != null) {
echo "href=\"".$json['references'][$i][3]."\"";
}
?>><?php echo $json['references'][$i][2];
?>
                        </a>
                    </li>
                    <?php
}
?>
                </ul>
                <h4>主播：</h4>
                <ul>
                    <?php
$length = count($json['hosts']);
for ($i=0;$i<$length;$i++) {
?>
                    <li><a <?php if($json['hosts'][$i][1] != null) {
echo "href=\"".$json['hosts'][$i][1]."\"";
}
?>><?php echo $json['hosts'][$i][0];
?></a>
                    </li>
                    <?php
}
?>
                </ul>
                <p></p>
            </div>
            <div class="post-footer">
                <div class="meta">
                    <div class="info">
                        <span class="rimeicon calendar-alt"></span>
                        <span class="date"><?php echo $weekArray[date("w",$json['publish_timestrap'])];
echo ", ".date("d M Y H:i:s",$json['publish_timestrap']) ?>
                            +0800</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    } 
    else {
        include "./modules/404.php";
    }
}
?>