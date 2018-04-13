<?php $alertgoods = get_field('alert_popup', 'option'); ?>
<div class="alertin">
	<span class="closealert">x</span>
	<?php if ($alertgoods['title']): ?>
		<h4 class="alerttitle" style="background: url('<?php echo get_site_url(); ?>/wp-content/uploads/2018/04/warning-e1523564916690.png') no-repeat left;"><?php echo $alertgoods['title']; ?></h4>
	<?php endif ?>
	<?php if ($alertgoods['content']): ?>
		<div class="alertcontent"><?php echo $alertgoods['content']; ?></div>
	<?php endif ?>
	<?php if ($alertgoods['more_info_link']): ?>
		<div class="infolink"><a href="<?php echo $alertgoods['more_info_link']; ?>">More Information</div>
	<?php endif ?>	
</div>
