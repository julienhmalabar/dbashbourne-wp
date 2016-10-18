<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>


		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
		
			$product_id = get_the_ID();


?>
	<div class="container-fluid">
		<div class="row">
			<div class="topbanner" style="background-image: url('<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } else {  echo get_template_directory_uri()."/img/banner-product.jpg"; } ?>');">
				<div class="topbanner-title">Products</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="breadcrumb"><a href="<?=get_site_url();?>">Home</a> / <a href="<?=get_the_permalink(4);?>">Professionals</a> / Products  / <? the_title(); ?></div>
			</div>
		</div>
	</div>

	<section class="section section--sticky js-sticky">
		<div class="container">
			<div class="row">

				<div class="col-xs-12">
					<div class="productBar"> 
						<ul>
							<li class="productBar-item">
								<select class="js-fancySelectUrl">
<?php
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => -1,
    'order'          => 'ASC'
 );
 


$prod = new WP_Query( $args );

if ( $prod ->have_posts() ) : ?>
    <?php while ( $prod ->have_posts() ) : $prod ->the_post();  ?>
    								<option value="<?php the_permalink(); ?>"<? if(get_the_ID() == $product_id) echo ' selected = "selected"'; ?>><?php the_title() ?></option>
    <?php endwhile; ?>
<?php endif; wp_reset_query(); ?>                                
									</select>
							</li><!--
						 --><li class="productBar-item hidden-xs hidden-sm"><a href="#1">Bioequivalence data</a></li><!--
						 --><li class="productBar-item hidden-xs hidden-sm"><a href="#2">Price Guarantee</a></li><!--
						 --><li class="productBar-item hidden-xs hidden-sm"><a href="#3">PIP Codes</a></li><!--
						 --><li class="productBar-item hidden-xs hidden-sm"><a href="#4">Attached files</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</section>



	<section id="0" class="section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">

					<div class="productOverview">
						<div class="row">
							<div class="col-xs-12 col-sm-7">
								<div class="productOverview-head">
									<div class="productOverview-title"><? the_title(); ?></div>
									<div class="productOverview-subtitle"><? the_field('subtitle'); ?></div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-5">
<?
$dl_file = get_field('top_right_download_file');
$dl_link = get_field('top_right_download_link');

$dl_src = ($dl_file != '')?$dl_file:$dl_link;
if($dl_src != ''){
?>                            
								<div class="btn-huge">
									<!--<button type="button" class="btn-huge-link" data-toggle="modal" data-target=".exit-modal"><? the_field("top_right_download_label"); ?></button>-->
                                    <span<? if($dl_file == ''){ ?> class="external-link"<? } ?>><a<? if($dl_file != ''){ echo ' target="_blank"'; } ?> href="<?=$dl_src;?>"><? the_field("top_right_download_label"); ?></a></span>
								</div>

								<div class="modal fade exit-modal" tabindex="-1" role="dialog" aria-labelledby="exit-modal">
									<div class="modal-dialog modal-md" role="document">
										<div class="modal-content">
											<p>You are now leaving Ethypharm UK and will be redirected to an other website</p>
											
											<div>
												<button type="button" class="btn btn-bluelite" data-dismiss="modal" aria-label="Close">Cancel</button>
												<a  target="_blank" href="<?=$dl_src;?>" class="btn btn-blue">OK</a>
											</div>
										</div>
									</div>
								</div>
<?
}
?>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-4">
								<img src="<? the_field('product_picture'); ?>" class="img-responsive center-block" alt="<? the_title(); ?>" />
							</div>
							<div class="col-xs-12 col-sm-8">
								<div class="productOverview-list classic-list">
									<? the_content(); ?>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>


	<section id="1" class="section section-bioequivalence section--blue">

		<div class="container">
			<div class="row">

				<div class="col-xs-12">
					<h2 class="h2--white">Bioequivalence Data</h2>
				</div>

				<div class="col-xs-12 col-md-6">
					<? the_field('bioequivalence_data'); ?>
					<!--<a href="#" class="btn">More information</a>-->
					<br><br>
				</div>
<?
if( have_rows('bioequivalence_data_pictures') ):

 	// loop through the rows of data
    while ( have_rows('bioequivalence_data_pictures') ) : the_row();
?>
				<div class="col-xs-12 col-md-6">
					<img src="<? the_sub_field('bioequivalence_data_picture'); ?>" class="img-responsive">
				</div>
<?
	endwhile;
endif;
?>                
				
			
			</div>
		</div>

	</section>

	<section id="2" class="section">

		<div class="container">
			<div class="row">

				<div class="col-xs-12">
					<h2>Price Guarantee</h2>
				</div>

				<div class="col-xs-12 col-sm-8">
					<div class="classic-list">
                    	<? the_field('price_guarantee'); ?>
					</div>
				</div>

				<div class="col-xs-12 col-sm-4">
<?
$dl_file = get_field('price_guarantee_download_file');
$dl_link = get_field('price_guarantee_download_link');
$dl_src = ($dl_file != '')?$dl_file:$dl_link;
$target = ($dl_file != '')?' target="_blank"':' target="_blank"';
if($dl_src != ''){
?>                
					<a <?=$target; ?> href="<?=$dl_src;?>" class="btn-huge">
						<div class="btn-huge-title">Download</div>
						<div class="btn-huge-desc"><? the_field('price_guarantee_download_text'); ?></div>
						<div class="btn-huge-link">> <span>Download file</span></div>
					</a>
<? } ?>                    
				</div>

			</div>
		</div>

	</section>

	<section id="3" class="section section--noTopPadding">

		<div class="container">
			<div class="row">

				<div class="col-xs-12">
					<h2>PIP Code</h2>
				</div>

				
<?
$nb_rows = 0;
$pip_datas = [];
$pip_datas_fields = array("strength","pack_size","pip_code","aah_codes","bar_code","nhs_list_price");
if( have_rows('pip-code') ):

 	// loop through the rows of data
    while ( have_rows('pip-code') ) : the_row();
		$nb_rows ++;
		foreach($pip_datas_fields as $k => $v){
			
			$pip_datas[$v][] = get_sub_field($v); 
		}
	endwhile;
endif;
if(sizeof($pip_datas)>0){
?>    
				<div class="productTable">

					<div class="productTable-tools">
						<span class="productTable-tools--left js-prevColumn"><i class="i-arrow2-left"></i></span>
						<span class="productTable-tools--right js-nextColumn"><i class="i-arrow2-right"></i></span>
					</div>

					<div class="productTable-wrapper js-table-wrapper">
						<div class="productTable-table js-table-table">
<?
if(sizeof($pip_datas["strength"])>0){
?>							<div class="productTable-column js-table-column">
								<div class="productTable-cell">Strength</div>
<? for($i=0; $i< $nb_rows; $i++){ ?>                                
								<div class="productTable-cell"><?=($pip_datas["strength"][$i]!='')?$pip_datas["strength"][$i]:'&nbsp;'; ?></div>
<? } ?>
							</div><? } ?><!--
						 --><?
if(sizeof($pip_datas["pack_size"])>0){
?><div class="productTable-column js-table-column">                        
								<div class="productTable-cell">Pack size</div>
<? for($i=0; $i< $nb_rows; $i++){ ?>                                 
								<div class="productTable-cell"><?=($pip_datas["pack_size"][$i]!='')?$pip_datas["pack_size"][$i]:'&nbsp;'; ?></div>
<? } ?>
							</div><? } ?><!-- 
							 --><?
if(sizeof($pip_datas["pip_code"])>0){
?><div class="productTable-column js-table-column">
								<div class="productTable-cell">PIP Code</div>
<? for($i=0; $i< $nb_rows; $i++){ ?>                                 
								<div class="productTable-cell"><?=($pip_datas["pip_code"][$i]!='')?$pip_datas["pip_code"][$i]:'&nbsp;'; ?></div>
<? } ?>
							</div><? } ?><!-- 
							 --><?
if(sizeof($pip_datas["bar_code"])>0){
?><div class="productTable-column js-table-column">
								<div class="productTable-cell">Bar Code</div>
<? for($i=0; $i< $nb_rows; $i++){ ?>
								<div class="productTable-cell"><?=($pip_datas["bar_code"][$i]!='')?$pip_datas["bar_code"][$i]:'&nbsp;'; ?></div>
<? } ?>
							</div><? } ?><!-- 
							 --><?
if(sizeof($pip_datas["nhs_list_price"])>0){
?><div class="productTable-column js-table-column">
								<div class="productTable-cell">NHS List Price</div>
<? for($i=0; $i< $nb_rows; $i++){ ?>
								<div class="productTable-cell"><?=$pip_datas["nhs_list_price"][$i]; ?></div>
<? } ?>
							</div><? } ?>
						</div>

					</div>

				</div>
<?
}
?>

			</div>
		</div>

	</section>


<?
if( have_rows('attached_files') ):
?>

	<section id="4" class="section section--purple">

		<div class="container">
			<div class="row">

				<div class="col-xs-12">
					<h2 class="h2--white">Attached files</h2>
				</div>
                <div class="col-xs-12">
					<ul class="download-list ul-double">
<?
 	// loop through the rows of data
    while ( have_rows('attached_files') ) : the_row();
	
	
		$dl_file = get_sub_field('file_upload');
		$dl_link = get_sub_field('file_external');
		$dl_src = ($dl_file != '')?$dl_file:$dl_link;
		if($dl_src != ''){
	
?>

						<li><span<? if($dl_file == ''){ ?> class="external-link"<? } ?>><a<? if($dl_file != ''){ echo ' target="_blank"'; } ?> href="<?=$dl_src; ?>"><? the_sub_field('file_label'); ?></a></span></li>
						
					
<?
		}
	endwhile;
?>
					</ul>
				</div>
                

			</div>
		</div>

	</section>
<?
endif;

			// End of the loop.
		endwhile;
		?>



	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
