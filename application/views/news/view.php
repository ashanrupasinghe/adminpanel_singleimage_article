<div class="row">
<div class="col-md-10 col-md-offset-1">
<?php
echo '<h2>'.$news_item['title'].'</h2>';
$imgsrc=base_url();
$imgsrc.='uploads/'.$news_item['images'];
echo '<img src="'.$imgsrc.'" width="100" height="100"><br><br>';
echo $news_item['text'];
?>
</div>
</div>