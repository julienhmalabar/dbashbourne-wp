<?php
/**
 * The template part for displaying Page Content
 *
 */
 

$nb_col= 0;
while ( have_rows('page_content_areas') ): the_row();
	if(get_sub_field('display_area')){
		$nb_col++;
	}
endwhile;
?>
				<div class="col-xs-12<? if($nb_col>0){ ?> col-sm-5<? } else { ?> col-sm-10<? } ?>  col-sm-offset-1">
					<? the_content(); ?>
				</div>
<?
$left = true;
$ofset = 0;
if( have_rows('page_content_areas') ):
	while ( have_rows('page_content_areas') ) : the_row();
		if(get_sub_field('display_area')){
				$left  = !$left;
				$ofset++;
				
				if($left){
?>
			</div><!-- close row -->
            <div class="row">
<?
				}
?>
				<div class="col-xs-12<? if(!$left || ($left && $ofset!=$nb_col)){ ?> col-sm-5<? } else{ ?> col-sm-10<? } ?><? if($left){ ?> col-sm-offset-1<? } ?>">
					<?php echo get_sub_field('page_content_area'); ?>
				</div>
<?
		}
	endwhile;
endif;
?>