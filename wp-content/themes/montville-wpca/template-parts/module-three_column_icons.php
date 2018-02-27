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
					<div class="col-md-4">
						<div class="block">
							<div class="thumbnail">
								<img src="<?php echo $col['image']; ?>" alt="<?php echo $col['title']; ?>">
							</div>
							<div class="description">
								<div class="title"><?php echo $col['title']; ?></div>
								<div class="blurb"><?php echo $col['blurb']; ?></div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>