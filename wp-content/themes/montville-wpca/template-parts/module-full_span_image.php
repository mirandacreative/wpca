<?php
$h = $background_image['height'];
$w = $background_image['width'];
$ratio = $h/$w;
$nh = 'height: calc(100vw * '.$ratio.');'
?>
<div class="module module-<?php echo $acf_fc_layout;?>" style="<?php echo $nh; ?>">
	<div class="overlay" style="background-image: url(<?php echo $background_image['url']; ?>); "></div>
</div>