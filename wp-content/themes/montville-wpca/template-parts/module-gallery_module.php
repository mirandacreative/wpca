<div class="module module-<?php echo $acf_fc_layout;?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="module-heading blurb-right dashed">
					<?php if($title) : ?>
						<h2><?php echo $title; ?></h2>
					<?php endif; ?>
					<?php if($blurb) : ?>
						<div class="blurb ignore-br"><?php echo $blurb; ?></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<?php if(!empty($gallery)){
				foreach($gallery as $key => $image){ ?>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<a href="<?php echo $image['url']; ?>" data-fancybox="gallery-<?php echo $module_key; ?>" data-options='{"loop" : "true"}'>
							<img src="<?php echo $image['sizes']['medium']; ?>" class="img-thumbnail" alt="<?php echo $image['alt']; ?>">
						</a>
					</div>
				<?php }
			} ?>
		</div>
		<?php if($button['show_button']) : ?>
			<div class="row">
				<div class="col text-center">
					<a href="<?php echo $button['link']['url'] ?>" target="<?php echo $button['link']['target']; ?>" class="btn btn-<?php echo $button['color']; ?>"><?php echo $button['link']['title']; ?></a>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>