<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 include(locate_template('variables.php'));
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta content="width=device-width,initial-scale=1" name="viewport">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/main.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.json">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/safari-pinned-tab.svg" color="#5bbad5 ">
    <meta name="theme-color" content="#ffffff ">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
    
    
<?
if(is_page_template('page-templates/faq.php')){

$products_label = [];
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => -1,
    'order'          => 'ASC'
 );

$prod = new WP_Query( $args );
if ( $prod ->have_posts() ) : ?>
<style type="text/css">
    <?php while ( $prod ->have_posts() ) : $prod ->the_post(); $products_label[get_the_id()]  = get_the_title(); ?> 
	.filter-selector input.filter-selector-<? echo get_the_id(); ?>:checked ~ label.filter-label-<? echo get_the_id(); ?> { background: #ef8214; color: #fff; }
	.filter-selector input.filter-selector-<? echo get_the_id(); ?>:checked ~ .collapsing-faq .filter-selector-<? echo get_the_id(); ?> { 	display: block; }
    <?php endwhile;  ?>
</style>
<?	
endif; wp_reset_query();
}
?>
<script type="text/javascript">
	var path = '<?php echo get_template_directory_uri(); ?>';

</script>

</head>
<? 

$ancestors = get_post_ancestors(get_the_id());

if(in_array(4,$ancestors)){
	add_filter( 'body_class', function( $classes ) {
    	return array_merge( $classes, array( 'parent-pageid-4' ) );
	} );
}
else
if(in_array(14,$ancestors)){
	add_filter( 'body_class', function( $classes ) {
    	return array_merge( $classes, array( 'parent-pageid-14' ) );
	} );
}
elseif(get_the_id() !=  $id_patients && get_the_id() != $id_pro && is_page()){
	
	add_filter( 'body_class', function( $classes ) {
    	return array_merge( $classes, array( 'home' ) );
	} );
	
}


 ?>
<body <?php body_class(); ?>>
<!-- HEADER -->
	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12">
			<header>
 <?
if(is_page_template('page-templates/csc.php')){
?>           
            	<!-- TOPBAR -->
				<div class="row">
						<div class="topbar">
							<a href="<?=get_permalink($id_cat_c); ?>"><?=get_the_title($id_cat_c); ?> &gt;</a>
						</div>
				</div>
<?
}
?>

				<!-- LOGO + Contact link -->
				<div class="row">
					<div class="logobar">
						<div class="nav-icon js-nav hidden-lg hidden-md"><i class="i-nav-icon"></i><i class="i-close hidden"></i></div>
						<div class="logobar-logo"><a href="<?=get_site_url();?>"><span></span></a></div>
					</div>
				</div>

				<!-- DOUBLE NAV -->
				<div class="row">
					<div class="navbar-wrapper">
						<nav class="navbar navbar--pro">
<?php
if ( has_nav_menu( 'primary-left' ) )
{
	wp_nav_menu( array(
		'theme_location' => 'primary-left',
		'menu_class'     => 'nav-left',
		'container' => '',
	) );
}
if ( has_nav_menu( 'primary-right' ) )
{
	wp_nav_menu( array(
		'theme_location' => 'primary-right',
		'menu_class'     => 'nav-right',
		'container' => '',
	) );
}
?>
							<!--<ul class="nav-left">
								<li class="navbar-item-title hidden-sm hidden-xs"><a href="homepage-pro.html">Professionals</a></li>
								<li class="navbar-item-title nav-mobiletitle"><a href="homepage-pro.html">Professionals</a></li>
								<li><a href="prescribing-infos.html">Prescribing information</a></li>
								<li><a href="product.html">Products</a></li>
								<li><a href="cost-saving-calculator.html">Cost savings calculator</a></li>
								<li><a href="contact.html">Contact</a></li>
							</ul>-->
                            <!--
						<ul class="nav-right">
								<li class="navbar-item-title hidden-sm hidden-xs"><a href="homepage-public.html">Patients</a></li>
								<li class="navbar-item-title nav-mobiletitle"><a href="homepage-pro.html">Patients</a></li>
								<li class="hidden-md hidden-lg"><a href="therapeutic-areas.html">Products</a></li>
								<li class="hidden-md hidden-lg"><a href="faq.html">Frequently asked questions</a></li>
								<li class="hidden-md hidden-lg"><a href="contact.html">Contact</a></li>
							</ul>-->
						</nav>
					</div>
				</div>	

			</header>
			</div>

		</div>

	</div>