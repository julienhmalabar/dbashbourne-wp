<?php
/**
 * Template Name: Prescribing Information
 *
 * @package WordPress
 */
 get_header();
include(locate_template('variables.php'));
if(have_posts()) : 
	while(have_posts()) : the_post();
?>

	<div class="container-fluid">
		<div class="row">
			<div class="topbanner" style="background-image: url('<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } else {  echo get_template_directory_uri()."/img/prescribing-infos.jpg"; } ?>');">
				<div class="topbanner-title"><? the_title(); ?></div>
			</div>
		</div>
	</div>
	
	<div class="container">

		<div class="row">
			<div class="col-xs-12 hidden-xs">
				<div class="breadcrumb"><?php if(function_exists('bcn_display')){ bcn_display(); }?></div>
            </div>

			<div class="col-xs-12">
				

				<div class="row">
                
                	<div class="col-xs-12">
                    	<?php the_content(); ?>
                    </div>
                    
                    
<?php
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => -1,
    'order'          => 'ASC'
 );

$prod = new WP_Query( $args );
if ( $prod ->have_posts() ) : ?>
    <?php while ( $prod ->have_posts() ) : $prod ->the_post(); $product_id = get_the_ID(); 
$dl_file = get_field('prescribing_information_block_file');
$dl_link = get_field('prescribing_information_block_link');
$dl_src = ($dl_file != '')?$dl_file:$dl_link;
	if($dl_src != ''){
?>
    
    				<!-- Prescribing Item -->
					<div class="col-xs-12 col-sm-4">
						<div class="prescribing-item">
							<div class="prescribing-item-title"><?php the_title(); ?> <span>(<?  echo get_field("generic_drug_name"); ?>)</span></div>
							<div class="prescribing-item-line1">
								<?  echo get_field("prescribing_information_block_label"); ?><br>
								&gt; <a target="_blank" href="<?=$dl_src; ?>">Download</a>
							</div>
						</div>
					</div>
    								
    <?php
	}
	endwhile; ?>
<?php endif; wp_reset_query(); ?>                    

					



				</div>

			</div>
		</div>

	</div>
    
<?php
get_template_part( 'template-parts/page-bottom' );
?>


<?php
	endwhile;
	endif;
get_footer();