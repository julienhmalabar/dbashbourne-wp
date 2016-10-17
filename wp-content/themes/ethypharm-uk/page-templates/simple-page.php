<?php
/**
 * Template Name: Simple page Purple Header
 *
 * @package WordPress
 */
 get_header();
include(locate_template('variables.php'));
if(have_posts()) : 
	while(have_posts()) : the_post();
	
	

?>


	

	<section class="section section--purple">

		<div class="container">
			<div class="row">
				

				<div class="col-xs-12">
					<div class="section404" style="padding-bottom:0">
						<div class="section404-title"><? $h1 = get_field("alternate_page_h1");  echo (strlen($h1)>0)?$h1:get_the_title(); ?></div>
                        <div class="section404-subtitle">
                        <? $h2 = get_field("alternate_page_h2");  if (strlen($h1)>0 && strlen($h2)>0){ echo $h2; } else { echo "&nbsp;";  } ?> </div>
                       
                        

					</div>
                </div>
            </div>
        </div>
    </section>

	<section class="section">

		<div class="container">
			<div class="row">

				

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