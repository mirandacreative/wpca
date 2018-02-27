<div class="module module-<?php echo $acf_fc_layout;?>">
	<div class="container">
		<div class="row no-gutters">
			<div class="col" style="background-image: url(<?php echo $background_image; ?>);">
				<div class="row align-items-center">
					<div class="overlay gradient-<?php echo $gradient_overlay; ?>"></div>
					<div class="col-lg-6 order-lg-2 offset-lg-0 col-md-10 offset-md-1 col-sm-10 offset-sm-1">
						<?php if($main_section) : ?>
							<div class="main-section text-center text-lg-right">
								<?php if($main_section['title']) : ?>
									<h2 class="title"><?php echo $main_section['title']; ?></h2>
								<?php endif; ?>
								<?php if($main_section['blurb']) : ?>
									<div class="blurb"><?php echo $main_section['blurb']; ?></div>
								<?php endif; ?>
								<?php if($main_section['button']['show_button']) : ?>
									<?php $button = $main_section['button']; ?>
									<a href="<?php echo $button['link']['url'] ?>" target="<?php echo $button['link']['target']; ?>" class="btn btn-<?php echo $button['color']; ?>"><?php echo $button['link']['title']; ?></a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="col-lg-4 order-lg-1 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1">
						<?php if($white_section && ($white_section['heading'] || $white_section['subheading'])) : ?>
							<div class="white-section text-center">
								<?php if($white_section['heading']) : ?>
									<div class="heading"><?php echo $white_section['heading']; ?></div>
								<?php endif; ?>
								<?php if($white_section['subheading']) : ?>
									<div class="subheading"><?php echo $white_section['subheading']; ?></div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>