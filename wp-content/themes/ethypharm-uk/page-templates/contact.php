<?php
/**
 * Template Name: Contact
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
			<div class="topbanner topbanner--marginBottom" style="background-image: url('<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } else {  echo get_template_directory_uri()."/img/contact.jpg"; } ?>');">
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

			
<section class="section section-contact">

		<div class="container">
			<div class="row">
				
				<form action="">

					<div class="col-xs-12">
						<div class="section-contact-title"><? $h1 = get_field("alternate_page_h1");  echo (strlen($h1)>0)?$h1:get_the_title(); ?></div>
						<div class="section-contact-subtitle"><? $h2 = get_field("alternate_page_h2");  if (strlen($h1)>0 && strlen($h2)>0){ echo $h2; } else { echo "&nbsp;";  } ?></div>
					</div>
                    
                    
<?php
get_template_part( 'template-parts/page-content' );
?>

					<div class="section-contact-content">

						<div class="col-xs-12 col-sm-6">
							<label>
								<span>Name:</span>
								<input type="text" id="name" name="name" required>
							</label>

							<label>
								<span>Email:</span>
								<input type="email" id="email" name="email" required>
							</label>

							<label>
								<span>Phone:</span>
								<input type="tel" id="phone" name="phone" required>
							</label>
							<div class="section-contact-select">
								<select class="js-fancySelect" id="select" name="select" required>
									<option value="">You are:</option>
									<option value="Healthcare professional">Healthcare professional</option>
									<option value="Member of the public">Member of the public</option>
								</select>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6">
							<div class="section-contact-textarea">
								<div>Enquiry:</div>
								<textarea id="message" name="message" required></textarea>
							</div>
							<div class="section-contact-checkhuman">
								<!-- <div class="g-recaptcha" data-sitekey="6Lc0zwkUAAAAAKui9c1AevG5q3oFclMdPp6soJph"></div> -->
                                <div class="g-recaptcha" data-sitekey="6LcARggUAAAAACLXb95x6xiadRUC56ysnj1UGA2H"></div>
                                
							</div>
						</div>

						<div class="col-xs-12">
							<div class="section-contact-error">
								<p class="error-email">Email address is invalid.</p>
								<p class="error-recaptcha">Please, check recaptacha.</p>
								<p class="error-global">All fields are mandatory.</p>
							</div>
							<div class="section-contact-button">
                            	<input type="hidden" name="recpts" id="recpts" value="<?php the_field('contact_infos_title', 'option'); ?>" />
								<button name="submit" class="btn btn-purple btn-large js-sendMail">Send</button>
							</div>
						</div>

					</div>

				</form>

					<div id="section-contact-message">

						<div class="col-xs-12">
							<div class="section-contact-subtitle">Your message has been sent successfully.</div>
						</div>
					</div>

				


			</div>
		</div>

	</section>
    
    
    <section class="section section-contact-map">


		<div class="section-contact-map-left">
			<div class="googlemap">
				<iframe src="<?php the_field('contact_infos_google_map', 'option'); ?>" width="800" height="350" frameborder="0" style="border:0"></iframe>
			</div>
		</div><!-- 

		 --><div class="section-contact-map-right">
			<div class="section-contact-map-title"><?php the_field('contact_infos_title', 'option'); ?></div>
			<?php the_field('contact_infos_content', 'option'); ?>
            <p><?php $mail = get_field('contact_infos_e-mail', 'option'); if(strlen($mail)>5){ $out = '<a href="mailto:'.$mail.'">'.$mail.'</a>'; echo eae_encode_emails($out); } ?></p>
		</div>


	</section>

    



<?php
get_template_part( 'template-parts/page-bottom' );
?>



	
    
<?php
	endwhile;
	endif;
get_footer();