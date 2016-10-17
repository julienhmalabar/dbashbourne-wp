<?php
/**
 * Template Name: Home Patients
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
			<div class="topbanner topbanner--marginBottom" style="background-image: url('<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } else {  echo get_template_directory_uri()."/img/banner-home-public.jpg"; } ?>');">
				<div class="topbanner-title"><?php the_title(); ?></div>
			</div>
		</div>
	</div>

	<div class="container home-specific-public">

		<div class="row">
			<div class="col-xs-12 hidden-xs">
				<div class="breadcrumb"><?php if(function_exists('bcn_display')){ bcn_display(); }?></div>
			</div>

			<div class="col-xs-12">
				<h1><?php the_field('subtitle'); ?></h1>

				<div class="home-specific-public-content">

					<div class="row">

						<!-- Content -->
						<div class="col-xs-12 col-md-6 col-md-offset-1">
							
							<div class="home-specific-public-content-img">
								<img src="<?php the_field('picture'); ?>" class="img-responsive" alt="<?php the_field('subtitle'); ?>" />
							</div>

							<div class="row">
<?
$args = array(
    'post_type'      => 'therapeutic_areas',
    'posts_per_page' => -1,
	'meta_key'	 => 'publish_on_patients_home_page',
	'meta_value'	 => true,
	'order'          => 'ASC'
 );
$products = array();
$prod = new WP_Query( $args );
if ( $prod ->have_posts() ) : 
	while ( $prod ->have_posts() ) : $prod ->the_post(); 
		$product['title'] = get_the_title();
		$product['excerpt'] = get_the_excerpt();
		$products[] = $product;
	endwhile;
endif;
wp_reset_query();
$lines =  sizeof($products);
$cpt = 0;
foreach($products as $k=>$v){
		$cpt++;
?>
								<div class="col-xs-12 col-sm-6">
									<div class="home-specific-public-content-item">
										<span class="line1"><?=$v["title"]; ?></span>
										<span class="line2"><?=$v["excerpt"]; ?></span>
									</div>
<?
if(($lines / 2 == ceil($lines/2) && $cpt == $lines-1) || ($lines / 2 != ceil($lines/2) && $cpt == $lines) ){ // pair => à gauche
?>                                    
                                    <div>
										<a href="<?=get_permalink($id_therapeutic_areas); ?>" class="btn btn-orange">Discover</a>
									</div>
<?
}
?>
								</div>
<?
}
?>
								
								
							</div>

						</div>

						<!-- Sidebar -->
						<div class="col-xs-12 col-md-4 col-md-offset-1">

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

	</div>

    


<?php
get_template_part( 'template-parts/page-bottom' );
?>



	
    
<?php
	endwhile;
	endif;
get_footer();