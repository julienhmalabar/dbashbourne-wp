<?php
/**
 * Template Name: Home Pro
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
			<div class="topbanner topbanner--marginBottom" style="background-image: url('<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } else {  echo get_template_directory_uri()."/img/banner-home-pro.jpg"; } ?>');">
				<div class="topbanner-title"><?php the_title(); ?></div>
			</div>
		</div>
	</div>
	
	<div class="container home-specific">

		<div class="row">
			<div class="col-xs-12 hidden-xs">
				<div class="breadcrumb"><?php if(function_exists('bcn_display')){ bcn_display(); }?></div>
			</div>

			<div class="col-xs-12">
				<h1><?php the_field('subtitle'); ?></h1>

				<div class="home-specific-pro">

					<div class="row">

						<!-- Content -->
						<div class="col-xs-12 col-md-6 col-md-offset-1">
							
							<div class="home-specific-pro-img">
								<img src="<?php the_field('picture'); ?>" class="img-responsive" alt="<?php the_field('subtitle'); ?>" />
							</div>

							<div class="row">
<?
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => -1,
	'meta_key'	 => 'pro_home_page',
	'meta_value'	 => true
 );
$products = array();
$prod = new WP_Query( $args );
if ( $prod ->have_posts() ) : 
	while ( $prod ->have_posts() ) : $prod ->the_post(); 
		$product['title'] = get_the_title();
		$product['excerpt'] = get_the_excerpt();
		$product['generic_drug_name'] = get_field('generic_drug_name');
		$products[] = $product;
	endwhile;
endif;
wp_reset_query();


$lines =  sizeof($products);

?>
								<div class="col-xs-12 col-sm-6">
									
<?
for($i=0;$i<ceil($lines/2);$i++){
?>
                                    <div class="home-specific-pro-item"> 
                                    	<span class="line1"><?=$products[$i]['title']; ?> <span style="text-transform:lowercase">(<?=$products[$i]['generic_drug_name']; ?>)</span></span>
										<span class="line2"><?=$products[$i]['excerpt']; ?></span>
									</div>   
<?
}
?>
										
<?
if(ceil($lines/2)<=  $lines/2){ ?>								
                                    
                                    <div>
										<a href="product.html" class="btn btn-blue">Discover</a>
									</div>

<?
}
?>
								</div>

								<div class="col-xs-12 col-sm-6">
<?
for($i=ceil($lines/2);$i<$lines;$i++){
?>
                                    <div class="home-specific-pro-item"> 
                                    	<span class="line1"><?=$products[$i]['title']; ?> <span style="text-transform:lowercase">(<?=$products[$i]['generic_drug_name']; ?>)</span></span>
										<span class="line2"><?=$products[$i]['excerpt']; ?></span>
									</div>   
<?
}
?>
<?
if(ceil($lines/2)>  $lines/2){ ?>								
                                    
                                    <div>
										<a href="product.html" class="btn btn-blue">Discover</a>
									</div>

<?
}
?>
									
								</div>
								
							</div>

						</div>

<?

if( have_rows('right_panels') ):
?>
						<!-- Sidebar -->
						<div class="col-xs-12 col-md-4 col-md-offset-1">

							<div class="sidebar">
<?
 	// loop through the rows of data
    while ( have_rows('right_panels') ) : the_row();
?>	

								<div class="<? the_sub_field('panel_class'); ?>">
									<div class="line1"><? the_sub_field('panel_title'); ?></div>
									<div class="line2"><? the_sub_field('panel_content'); ?></div>
									<? if(get_sub_field('panel_link_url')){ ?><div class="line3">&gt; <a target="<? the_sub_field('panel_link_target'); ?>" href="<? the_sub_field('panel_link_url'); ?>"><? the_sub_field('panel_link_label'); ?></a></div><? } ?>
								</div>
                                
<?
	endwhile;
?>
								

							</div>

						</div>
<?
endif;
?>
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