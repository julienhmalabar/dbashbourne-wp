<?php
/**
 * Template Name: Home
 *
 * @package WordPress
 */
 get_header();
include(locate_template('variables.php'));
if(have_posts()) : 
	while(have_posts()) : the_post();
?>

	<div class="topbanner-home">

		<div class="topbanner-home-block hidden-sm hidden-xs">

			<div class="topbanner-home-left">
				<div class="topbanner-home-block-title">Healthcare<br>professional</div>
				<a href="<?=get_permalink($id_pro); ?>" class="btn btn-large">Discover</a>
			</div><!-- 
			 --><div class="topbanner-home-right">
		 		<div class="topbanner-home-block-title">Patients &amp; members<br>of the public</div>
				<a href="<?=get_permalink($id_patients); ?>" class="btn btn-large">Discover</a>
			</div>

		</div>


		<div class="topbanner-responsive-block hidden-md hidden-lg">
			<div class="topbanner-responsive-block-col">
				<img alt="Healthcare professionals" src="<?php echo get_template_directory_uri(); ?>/img/banner-home-left.jpg" class="img-responsive">
				<div class="topbanner-responsive-block-cta">
					<div class="topbanner-home-block-title">Healthcare<br>professionals</div>
					<a href="<?=get_permalink($id_pro); ?>" class="btn btn-large">Discover</a>
				</div>
			</div><!-- 
		 --><div class="topbanner-responsive-block-col">
				<img alt="Patients &amp; members of the public" src="<?php echo get_template_directory_uri(); ?>/img/banner-home-right.jpg" class="img-responsive">
				<div class="topbanner-responsive-block-cta">
					<div class="topbanner-home-block-title">Patients &amp; members<br>of the public</div>
					<a href="<?=get_permalink($id_patients); ?>" class="btn btn-large">Discover</a>
				</div>
			</div>
		</div>


	</div>


<?php
get_template_part( 'template-parts/page-bottom' );
?>



	<section class="section section-homeWorld">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 ">
					<div class="section-homeWorld-line1"><?php the_field('box_title_ew', 'option'); ?></div>
                    <?php the_field('box_base_line_ew', 'option'); ?>
					
					<div class="section-homeWorld-desc"><?php the_field('box_text_ew', 'option'); ?></div>

					<button type="button" class="btn btn-large btnWorld" data-toggle="modal" data-target=".worldwide-modal">Learn more</button>
					<div class="modal fade worldwide-modal" tabindex="-1" role="dialog" aria-labelledby="worldwide-modal" id="worldwide-modal">
						<div class="modal-dialog modal-md" role="document">
							<div class="modal-content">
								<p>You are now leaving Ethypharm UK and will be redirected to Ethypharm Global website</p>
								
								<div>
									<button type="button" class="btn btn-purplelite" data-dismiss="modal" aria-label="Close">Cancel</button>
									<a href="http://www.ethypharm.com/" class="btn btn-purple">OK</a>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
<?php
	endwhile;
	endif;
get_footer();