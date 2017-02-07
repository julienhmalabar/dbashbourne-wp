<?php
/**
 * Template Name: Cost Saving Calculator
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
			<div class="topbanner topbanner--marginBottom" style="background-image: url('<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } else {  echo get_template_directory_uri()."/img/banner-cost-calculator.jpg"; } ?>');">
				<div class="topbanner-title"><?php the_title(); ?></div>
			</div>
		</div>
	</div>

	<div class="container">

		<div class="row">
			<div class="col-xs-12 hidden-xs">
				<div class="breadcrumb"><?php if(function_exists('bcn_display')){ bcn_display(); }?></div>
			</div>

			<div class="col-xs-12 cost-calculator-tools">

				<h1 class="h1--blue">How much could you save?</h1>
				

				<div class="row">

					<div id="cost-calculator-ccg" class="col-xs-12 col-sm-offset-1 col-sm-4">
						<div class="cost-calculator-titleselect">Ccg</div>
						<div class="cost-calculator-select">
							<select class="js-fancySelect">
								
							</select>
						</div>
						<div class="cost-calculator-totalpricing">
							<div class="cost-calculator-totaltext clearfix">
								<span class="line1">TOTAL CCG SAVINGS</span>
								<span class="line2">across our producs</span>
							</div>
							<div class="cost-calculator-pricing" id="saving-ccg">£0.00</div>
						</div>
					</div>

					<div class="col-sm-2 hidden-xs">
						<div class="cost-calculator-separator">
							<i class="i-arrow2-right"></i>
						</div>
						
					</div>

					<div id="cost-calculator-practice" class="col-xs-12 col-sm-4">
						<div class="cost-calculator-titleselect">Practice</div>
						<div class="cost-calculator-select">
							<select class="js-fancySelect">
								
							</select>
						</div>
						<div class="cost-calculator-totalpricing">
							<div class="cost-calculator-totaltext">
								<span class="line1">TOTAL PRACTICE SAVINGS</span>
								<span class="line2">across our producs</span>
							</div>
							<div id="saving-practice" class="cost-calculator-pricing">£0.00</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	


	<section id="3" class="section section--noBottomPadding section--noTopPadding section--relativepos section--overflow">

		<div class="cscTable-grid">
			<div class="cscTable-grid-line1"></div>
			<div class="cscTable-grid-line2"></div>
			<div class="cscTable-grid-line3"></div>
		</div>

<?
$nb_col= 0;
while ( have_rows('csc_products') ): the_row();
	if(get_sub_field('publish_this_product')){
		$nb_col++;
	}
endwhile;
$nb_col++;
if( have_rows('csc_products') ):
?>
		<div class="container">
			<div class="row">
				<div class="cscTable">
					<div class="cscTable-tools">
						<span class="cscTable-tools--left js-prevColumn"><i class="i-arrow2-left"></i></span>
						<span class="cscTable-tools--right js-nextColumn"><i class="i-arrow2-right"></i></span>
					</div>

					<div class="cscTable-wrapper js-table-wrapper">
						<div class="cscTable-table js-table-tablex1">
							<div class="cscTable-column cscTable-column--hidden-768 js-table-column" style="width:<? echo 100/$nb_col; ?>%">
								<div class="cscTable-cell">&nbsp;</div>
								<div class="cscTable-cell">UNIT PRICE</div>
								<div class="cscTable-cell">12 MONTHS SAVINGS</div>
							</div><!--
						 --><?
// loop through the rows of data
while ( have_rows('csc_products') ) : the_row();
	if(get_sub_field('publish_this_product')){ ?><div class="cscTable-column js-table-column" style="width:<? echo 100/$nb_col; ?>%">
								<div class="cscTable-cell"><?php echo get_sub_field('product_label'); ?></div>
								<div class="cscTable-cell">
									<span class="hidden-lg hidden-md hidden-sm">UNIT PRICE<br></span>
									<?php echo get_sub_field('product_unit_price'); ?>
								</div>
								<div class="cscTable-cell">
									<span class="hidden-lg hidden-md hidden-sm">12 months savings<br></span>
									£<span class="update-data" data-item="<?php echo get_sub_field('product_data_item'); ?>">15.367,60</span>
								</div>
							</div><!-- 
						 --><?
	}
endwhile; ?>
						</div>

					</div>

				</div>


			</div>
		</div>
	</section>
<?php
endif;
?>

<?php
get_template_part( 'template-parts/page-bottom' );


?>





	
    
<?php
	endwhile;
	endif;
get_footer();