<?php
/**
 * The template part for displaying Report Adverse Event section
 *
 */
?>

	<section class="section section--purple section-adverseevent">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-4">
					<div class="section-adverseevent-title">Report adverse events</div>
				</div>
				<div class="col-xs-12 col-md-4">
					<?php $f = get_field('left_content', 'option');  echo eae_encode_emails($f); ?>
				</div>
				<div class="col-xs-12 col-md-4">
					<?php $f = get_field('right_content', 'option'); echo $f; ?>
				</div>
			</div>
		</div>
	</section>
