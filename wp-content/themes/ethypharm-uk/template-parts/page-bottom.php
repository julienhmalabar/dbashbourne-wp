<?php
/**
 * The template part for displaying Page Bottom section
 *
 */
 
if(get_field( "add_about_ethypharm_section")){
	get_template_part( 'template-parts/about' );
}
if(get_field( "add_contact_section")){
	get_template_part( 'template-parts/contact-push' );
}
if(get_field( "add_category_c_section")){
	get_template_part( 'template-parts/category-c' );
}
if(get_field( "add_report_adverse_events_section")){
	get_template_part( 'template-parts/report' );
}
?>