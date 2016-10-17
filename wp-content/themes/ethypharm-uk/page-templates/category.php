<?php
/**
 * Template Name: Simple 2 cols page
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
			<div class="topbanner topbanner--marginBottom" style="background-image: url('<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } else {  echo get_template_directory_uri()."/img/banner-category.jpg"; } ?>');">
				<div class="topbanner-title"><?php the_title(); ?></div>
			</div>
		</div>
	</div>

	<div class="container">

		<div class="row">
			<div class="col-xs-12 hidden-xs">
				<div class="breadcrumb"><?php if(function_exists('bcn_display')){ bcn_display(); }?></div>
			</div>
        </div>
    </div>

	<section class="section">

		<div class="container">
			<div class="row">

				<div class="col-xs-12">
					<h1 class="h1--blue"><? $h1 = get_field("alternate_page_h1"); echo (strlen($h1)>0)?$h1:get_the_title();  ?></h1>
				</div>

<?php
get_template_part( 'template-parts/page-content' );
?>


				

			</div>
		</div>

	</section>


<?php
get_template_part( 'template-parts/page-bottom' );
?>



	
    
<?php
	endwhile;
	endif;
get_footer();