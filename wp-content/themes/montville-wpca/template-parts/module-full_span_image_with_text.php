<div class="module module-<?php echo $acf_fc_layout;?>">
	<div class="overlay" style="background-image: url(<?php echo $background_image; ?>); "></div>
	<?php if($main_section) : ?>
		<div class="content text-center">
			<?php if($main_section['title']) : ?>
				<h2 class="ignore-br"><?php echo $main_section['title']; ?></h2>
			<?php endif; ?>
			<?php if($main_section['blurb']) : ?>
				<div class="blurb ignore-br"><?php echo $main_section['blurb']; ?></div>
			<?php endif; ?>
			<?php if($main_section['button']['show_button']) : ?>
				<?php $button = $main_section['button']; ?>
				<a href="<?php echo $button['link']['url'] ?>" target="<?php echo $button['link']['target']; ?>" class="btn btn-<?php echo $button['color']; ?>"><?php echo $button['link']['title']; ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>