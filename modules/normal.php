<div class="content">
    <?php
	$json = fopen("list.json", "r") or die("Unable to open file!");
	$json = json_decode(fread($json,filesize("list.json")),true);
	$length = count($json);
	for ($i = $length-1 ; $i >=0 ; $i--) {
		?>
    <div class="post animated fadeInDown">
        <div class="post-title">
            <h3><a class="title-link"
                    href="?module=volume&id=<?php echo $json[$i]["id"] ?>">#<?php echo $json[$i]["id"] ?>:
                    「<?php echo $json[$i]["title"] ?>」</a>
            </h3>
        </div>
        <div class="post-content">
            <p><?php echo $json[$i]["description"] ?></p>
        </div>
        <div class="post-footer">
            <div class="meta">
                <div class="info">
                    <span class="rimeicon calendar-alt"></span>
                    <span class="date"><?php echo date ("Y 年 m  月 d 日",$json[$i]['publish_timestrap']) ?></span>
                </div>
            </div>
        </div>
    </div>
    <?php
	}
	if($length == 0) {
		?>
    <div class="post animated fadeInDown">
        <div class="post-title">
            <h3><a class="title-link">#∞:
                    「暂时没有节目」</a>
            </h3>
        </div>
        <div class="post-content">
            <p>我们正在抓紧录制</p>
        </div>
        <div class="post-footer">
            <div class="meta">
                <div class="info">
                    <span class="rimeicon calendar-alt"></span>
                    <span class="date"><?php echo date ("Y 年 m  月 d 日",0) ?></span>
                </div>
            </div>
        </div>
    </div>
    <?php
	}
	?>
</div>