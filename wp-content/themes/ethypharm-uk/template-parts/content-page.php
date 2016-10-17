<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 
 include(locate_template('variables.php'));
 
 
 if(is_front_page())
{
	get_template_part( 'template-customs/homepage' );
	
}
else
{
	switch(get_the_ID())
	{
		case $immobilier_et_patrimoine:
			get_template_part( 'template-customs/html/immobilier_et_patrimoine' );
			break;

		case $optimisation_fiscale:
			get_template_part( 'template-customs/html/optimisation_fiscale' );
			break;

		case $notre_selection:
			get_template_part( 'template-customs/notre_selection' );
			break;
			
	}
}
?>
