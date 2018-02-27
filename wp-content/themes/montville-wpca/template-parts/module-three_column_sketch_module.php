<div class="module module-<?php echo $acf_fc_layout;?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="module-heading dashed">
					<?php if($title) : ?>
						<h2 class="ignore-br"><?php echo $title; ?></h2>
					<?php endif; ?>
					<?php if($subtitle) : ?>
						<div class="subtitle ignore-br"><?php echo $subtitle; ?></div>
					<?php endif; ?>
					<?php if($blurb) : ?>
						<h3 class="blurb ignore-br"><?php echo $blurb; ?></h3>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="column-content">
					<?php echo $content; ?>
				</div>
			</div>
		</div>
	</div>
</div>