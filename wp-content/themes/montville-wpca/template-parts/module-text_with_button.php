
<div class="module module-<?php echo $acf_fc_layout;?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-12 module-<?php echo $acf_fc_layout;?>-title">
					<?php if($title) : ?>
						<h2><?php echo $title; ?></h2>
					<?php endif; ?>
			</div>
			<?php if ($content): ?>
				<div class="col-lg-8 col-md-12">
					<div class="content">
						<div class="description ignore-br"><?php echo $content['description']; ?></div>
						<?php if($content['button']['show_button'] && $button = $content['button']) : ?>
							<a href="<?php echo $button['link']['url'] ?>" target="<?php echo $button['link']['target']; ?>" class="btn btn-<?php echo $button['color']; ?>"><?php echo $button['link']['title']; ?></a>
						<?php endif; ?>
					</div>
				</div>
			<?php endif ?>
		</div>
	</div>
</div>