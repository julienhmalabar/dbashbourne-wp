<?php
/**
 * The template part for displaying Contact section
 *
 */
  include(locate_template('variables.php'));
?>

	<section class="section section--gray section-searchmore m-top75">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="section-searchmore-title"><?php the_field('contact_section_title', 'option');  ?></div>
					<div class="section-searchmore-subtitle"><?php the_field('contact_section_text', 'option');  ?></div>
					<div class="section-searchmore-buttonzone">
						<a href="<?=get_permalink($id_contact); ?>" class="btn btn-orange btn-large">Contact</a>
					</div>
				</div>
			</div>
		</div>
	</section>
