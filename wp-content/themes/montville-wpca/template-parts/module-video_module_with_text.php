<div class="module module-<?php echo $acf_fc_layout;?>" id="<?php echo $acf_fc_layout.'-'.$module_key; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="video-wrapper">
					<div class="video-poster" style="background-image: url(<?php echo $video['video_placeholder']; ?>);"></div>
					<?php echo $video['video_source']; ?>
				</div>
				<?php if($main_section) : ?>
					<div class="content">
						<?php if($main_section['title']) : ?>
							<div class="title"><?php echo $main_section['title']; ?></div>
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
		</div>
	</div>
	<script type="text/javascript">
		if(!players) var players = new Array();
		players[<?php echo $module_key; ?>] = {
			id: document.querySelector('#<?php echo $acf_fc_layout.'-'.$module_key; ?> iframe').getAttribute('id'),
			settings: {
				events: {
					'onReady': onPlayerReady<?php echo $module_key; ?>,
					'onStateChange': onPlayerStateChange<?php echo $module_key; ?>
				}
			}
		};
		function onPlayerReady<?php echo $module_key; ?>(event){
			jQuery('#<?php echo $acf_fc_layout.'-'.$module_key; ?> .video-poster').on('click', function(e){
				event.target.playVideo();
				jQuery(this).closest('.video-wrapper').addClass('playing');
			});
		}
		function onPlayerStateChange<?php echo $module_key; ?>(event) {
			if (event.data == YT.PlayerState.ENDED) {
				jQuery('#<?php echo $acf_fc_layout.'-'.$module_key; ?> .video-wrapper').removeClass('playing');
			}
		}
	</script>
</div>