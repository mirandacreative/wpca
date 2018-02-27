<div class="module module-<?php echo $acf_fc_layout;?>">
	<div class="container">
		<div class="row">
			<div class="col">
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
			<?php if(!empty($column)) : ?>
				<?php foreach($column as $key => $col) : ?>
					<div class="col-lg-3 col-md-6">
						<?php if($col['enable_link']) : ?>
							<a href="<?php echo $col['link']['url']; ?>" target="<?php echo $col['link']['target']; ?>">
						<?php endif; ?>
						<div class="block" style="background-image: url(<?php echo $col['image']; ?>);">
							<div class="description"><?php echo $col['text']; ?></div>
						</div>
						<?php if($col['enable_link']) : ?>
							</a>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>