<div class="module module-<?php echo $acf_fc_layout;?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php if(!empty($slides)) : ?>
					<div class="slick-slider" id="<?php echo $acf_fc_layout.'_'.$module_key; ?>">
						<?php foreach($slides as $key => $slide) : ?>
							<div class="slick-slide" style="background-image: url(<?php echo $slide['background_image']; ?>);">
								<?php if($content = $slide['main_section']) : ?>
									<div class="content">
										<?php if($content['title']) : ?>
											<h2 class="title"><?php echo $content['title']; ?></h2>
										<?php endif; ?>
										<?php if($content['blurb']) : ?>
											<div class="blurb"><?php echo $content['blurb']; ?></div>
										<?php endif; ?>
										<?php if($content['button']['show_button']) : ?>
											<?php $button = $content['button']; ?>
											<a href="<?php echo $button['link']['url'] ?>" target="<?php echo $button['link']['target']; ?>" class="btn btn-<?php echo $button['color']; ?>"><?php echo $button['link']['title']; ?></a>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
						<ul class="slick-nav">
							<li class="slick-prev"></li>
							<?php for($i = count($slides); $i > 0; $i--){ ?>
								<li class="slick-dot <?php echo $i == count($slides)?'slick-active':null; ?>"></li>
							<?php } ?>
							<li class="slick-next"></li>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		;(function($){
			$(document).ready(function(){
				$('#<?php echo $acf_fc_layout.'_'.$module_key; ?>').slick({
					cssEase: 'ease',
					fade: true,  // Cause trouble if used slidesToShow: more than one
					arrows: false,
					dots: false,
					infinite: true,
					speed: 500,
					autoplay: false,
					autoplaySpeed: 5000,
					slidesToShow: 1,
					slidesToScroll: 1,
					slide: '.slick-slide', // Cause trouble with responsive settings
				}).on('beforeChange', function(event, slick, currentSlide, nextSlide){
					$('.slick-nav .slick-dot').removeClass('slick-active').eq(nextSlide).addClass('slick-active');
				});
				$('.slick-nav').on('click', '.slick-dot:not(.slick-active)', function(){
					$('#<?php echo $acf_fc_layout.'_'.$module_key; ?>').slick('slickGoTo', $(this).index('.slick-dot'));
				}).on('click', '.slick-next', function(){
					$('#<?php echo $acf_fc_layout.'_'.$module_key; ?>').slick('slickNext');
				}).on('click', '.slick-prev', function(){
					$('#<?php echo $acf_fc_layout.'_'.$module_key; ?>').slick('slickPrev');
				});
			});
		}(jQuery));
	</script>
</div>