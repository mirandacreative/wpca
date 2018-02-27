<div class="module module-<?php echo $acf_fc_layout;?> text-center" id="<?php echo $acf_fc_layout.'-'.$module_key; ?>">
	<div class="video-wrapper">
		<div class="video-poster" style="background-image: url(<?php echo $video['video_placeholder']; ?>);"></div>
		<?php echo $video['video_source']; ?>
		<?php if($title) : ?>
			<div class="title">
				<div class="container">
					<div class="row">
						<div class="col text-center">
							<?php echo $title; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
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