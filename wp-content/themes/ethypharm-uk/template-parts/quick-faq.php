<?php
/**
 * The template part for displaying FAQ section
 *
 */
include(locate_template('variables.php'));
?>

							<div class="sidebar-faq">
                                <div class="line1">Frequently<br>asked questions</div>
<?php

$url_faq = get_permalink($id_faq);
$args = array(
    'post_type'      => 'faq',
    'posts_per_page' => 4,
    'meta_key' 		=>'display',
	'meta_value'	=> 1,
	'orderby' => 'menu_order',
	'order'          => 'ASC'
 );

$prod = new WP_Query( $args );
if ( $prod ->have_posts() ) : ?>
	<?php while ( $prod ->have_posts() ) : $prod ->the_post(); ?>   
                                <div class="sidebar-faq-item"><a href="<?=$url_faq;?>#collapse<?php echo get_the_id(); ?>"><?php the_title(); ?></a></div>
    <?php endwhile; 
endif; wp_reset_query();  ?>  
                                <div class="knowmore">> <a href="<?=$url_faq;?>">See all questions</a></div>
                            </div>