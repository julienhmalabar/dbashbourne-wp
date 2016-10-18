<?php
/**
 * Template Name: Therapeutic Areas
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
			<div class="topbanner topbanner--marginBottom" style="background-image: url('<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } else {  echo get_template_directory_uri()."/img/banner-therapeutic-areas.jpg"; } ?>');">
				<div class="topbanner-title"><?php the_title(); ?></div>
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

						<!-- Content -->
					<div class="col-xs-12 col-md-8">
						
						<div class="collapsing-classic" id="accordion" role="tablist" aria-multiselectable="true">

<?php
$args = array(
    'post_type'      => 'therapeutic_areas',
    'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order'          => 'ASC'
 );

$prod = new WP_Query( $args );
if ( $prod ->have_posts() ) : ?>
    <?php while ( $prod ->have_posts() ) : $prod ->the_post(); ?>
							<div class="collapsing-item">
						    	<div class="collapsing-heading" role="tab" id="heading<? echo get_the_id(); ?>">
						        	<a role="button" data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse<? echo get_the_id(); ?>" aria-expanded="false" aria-controls="collapse1">
						          	<span class="collapsing-headingQuestion"><? the_title(); ?></span>
						          	<span class="collapsing-headingArrow"></span>
						        	</a>
						    	</div>
						    	<div id="collapse<? echo get_the_id(); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<? echo get_the_id(); ?>">
						      		<div class="collapsing-body">
						        		<? the_content(); ?>
									</div>
						    	</div>
						  	</div>
<?
 	endwhile;
endif; 
?>
						  
						  
						</div>

					</div>

					<!-- Sidebar -->
					<div class="col-xs-12 col-md-4">

						<div class="sidebar">

<?php
get_template_part( 'template-parts/quick-faq' );
?>

						</div>

					</div>

					
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