<?php
/**
 * Template Name: FAQ
 *
 * @package WordPress
 */
 get_header();
include(locate_template('variables.php'));
if(have_posts()) : 
	while(have_posts()) : the_post();
	
	$args = array(
    'post_type'      => 'product',
    'posts_per_page' => -1,
    'order'          => 'ASC'
 );
 


$prod = new WP_Query( $args );
$products_label = array();
if ( $prod ->have_posts() ) : 
	while ( $prod ->have_posts() ) : $prod ->the_post(); 
		$products_label[get_the_id()] = get_the_title();
	endwhile; 
endif; wp_reset_query();
print_r($products_label);
	
?>




	<div class="container-fluid">
		<div class="row">
			<div class="topbanner topbanner--marginBottom" style="background-image: url('<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } else {  echo get_template_directory_uri()."/img/banner-faq.jpg"; } ?>');">
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
				<h1><?php the_title(); ?></h1>
			</div>

			<div class="row">

			<div class="col-xs-12 filter-selector">
				<div class="filter-selector-label">Filter questions by product</div>

				<input id="select-type-all" name="radio-set-1" type="radio" class="filter-selector-all" checked="checked" /><label for="select-type-all" class="filter-label-all">All products</label>
<?php
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => -1,
    'order'          => 'ASC'
 );

$prod = new WP_Query( $args );
if ( $prod ->have_posts() ) : ?>
    <?php while ( $prod ->have_posts() ) : $prod ->the_post(); ?>             
				<input id="select-type-<? echo get_the_id(); ?>" name="radio-set-1" type="radio" class="filter-selector-<? echo get_the_id(); ?>" /><label for="select-type-<? echo get_the_id(); ?>" class="filter-label-<? echo get_the_id(); ?>"><? the_title(); ?></label>
    <?php endwhile; 
endif; wp_reset_query();  ?>            
				<input id="select-type-6" name="radio-set-1" type="radio" class="filter-selector-6" /><label for="select-type-6" class="filter-label-6">Others</label>

				<div class="collapsing-faq" id="accordion" role="tablist" aria-multiselectable="true">
<?php
$args = array(
    'post_type'      => 'faq',
    'posts_per_page' => -1,
    'meta_key' 		=>'related_product',
	'orderby' => 'meta_value menu_order',
	'order'          => 'ASC'
 );

$prod = new WP_Query( $args );
if ( $prod ->have_posts() ) : ?>
	<?php while ( $prod ->have_posts() ) : $prod ->the_post(); ?>   				  
				  <div class="collapsing-item filter-selector-<?php $rp = (get_field('related_product')>0)?get_field('related_product'):6; echo $rp; ?>">
				    <div class="collapsing-heading" role="tab" id="heading<? echo get_the_id(); ?>">
				        <a role="button" data-toggle="collapse" data-parent="#accordion" class="collapsed" href="#collapse<? echo get_the_id(); ?>" aria-expanded="false" aria-controls="collapse<? echo get_the_id(); ?>">
				          <span class="collapsing-headingName"><?php  echo $products_label[$rp]; ?></span>
				          <span class="collapsing-headingQuestion"><?php the_title(); ?></span>
				          <span class="collapsing-headingArrow"></span>
				        </a>
				    </div>
				    <div id="collapse<? echo get_the_id(); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<? echo get_the_id(); ?>">
				      <div class="collapsing-body">
				        <p><?php the_content(); ?></p>
				      </div>
				    </div>
				  </div>
<?php endwhile; 
endif; wp_reset_query();  ?>  
				  


				</div>

			</div>
		</div>

	</div>

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


<?php
get_template_part( 'template-parts/page-bottom' );
?>


	
    
<?php
	endwhile;
	endif;
get_footer();