<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 
 include(locate_template('variables.php'));
?>

	<!-- FOOTER -->
	<div class="container">
		<div class="row">

			<div class="col-xs-12">
				<footer class="footer">

					<div class="row">
						<div class="col-xs-12 col-md-3">

<?php 
$args = array(
    'post_type'      => 'page',
    'p'				 => $id_pro
 );

$parent = new WP_Query( $args );
if ( $parent->have_posts() ) : ?>
							
    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
        						<div class="footer-listTitle"><a href="<?php the_permalink(); ?>"><i class="i-puce"></i> <?php the_title(); ?></a></div>
    <?php endwhile; ?>
    						
<?php endif; wp_reset_query(); ?>  
							
<?php
$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    =>  $id_pro,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
 );

$parent = new WP_Query( $args );
if ( $parent->have_posts() ) : ?>
							<ul class="footer-list">
    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
        						<li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
    						</ul>
<?php endif; wp_reset_query(); ?>                            
							
						</div>

						<div class="col-xs-12 col-md-3">
<?php
$args = array(
    'post_type'      => 'page',
    'p'				 => $id_patients
 );

$parent = new WP_Query( $args );
if ( $parent->have_posts() ) : ?>
							
    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
        						<div class="footer-listTitle"><a href="<?php the_permalink(); ?>"><i class="i-puce"></i> <?php the_title(); ?></a></div>
    <?php endwhile; ?>
    						
<?php endif; wp_reset_query(); ?>                        
							
<?php
$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    =>  $id_patients,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
 );

$parent = new WP_Query( $args );
if ( $parent->have_posts() ) : ?>
							<ul class="footer-list">
    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
        						<li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
    						</ul>
<?php endif; wp_reset_query(); ?>
						</div>

						<div class="col-xs-12 col-md-2">
							<div class="footer-listTitle">
								<i class="i-puce"></i> Products
								<a class="footer-listTitle-arrows js-footerCollapse" role="button" data-toggle="collapse" href="#collapseFooter" aria-expanded="false" aria-controls="collapseFooter">
									<i class="i-arrow-top hidden"></i>
									<i class="i-arrow-bottom"></i>
								</a>
							</div>

							<div class="collapse out" id="collapseFooter">

								<div class="row">
<?php
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => -1,
    'order'          => 'ASC'
 );

$prod = new WP_Query( $args );
if ( $prod ->have_posts() ) : ?>
    <?php while ( $prod ->have_posts() ) : $prod ->the_post(); ?>
    								<ul class="col-xs-12 col-sm-6 footer-list">
										<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
									</ul>
    <?php endwhile; ?>
<?php endif; wp_reset_query(); ?>                                
								</div>

							</div>

						</div>

						<div class="col-xs-12 col-md-2">
							<div class="footer-listTitle"><a href="contact.html"><i class="i-puce"></i> Contact</a></div>
						</div>
                        
                        <div class="col-xs-12 col-md-2">
							<div class="footer-listTitle"><a target="_blank" href="javascript:void(0);" data-toggle="modal" data-target=".ethyfr-modal"><i class="i-puce"></i> Ethypharm Group</a></div>
                            
                            <div class="modal fade display-modal ethyfr-modal" tabindex="-1" role="dialog" aria-labelledby="ethyfr-modal" id="ethyfr-modal">
								<div class="modal-dialog modal-md" role="document">
									<div class="modal-content">
										<p>You are now leaving Ethypharm UK and will be redirected to Ethypharm France website</p>
								
									<div>
										<button type="button" class="btn btn-purplelite" data-dismiss="modal" aria-label="Close">Cancel</button>
										<a href="http://www.ethypharm.fr/" class="btn btn-purple">OK</a>
									</div>
								</div>
                            
							</div>
						</div>
                    
						</div>

					</div>

				</footer>
			</div>

		</div>
	</div>



<div class="terms">
	<div class="container-fluid">
    	<div class="page-code"><?php the_field( "web_page_code"); ?></div>
		<div class="row">

			<div class="col-xs-12" style="text-align:center">
				
                <?php
if ( has_nav_menu( 'footer' ) )
{
	wp_nav_menu( array(
		'theme_location' => 'footer',
		'menu_class'     => 'termsList',
		'container' => '',
	) );
} ?>
				<ul class="termsList">
					<li>Copyright - Ethypharm - 2016</li>
				</ul>
			</div>

		</div>
	</div>
</div>




	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/fancyselect.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>


<script type="text/javascript">
	
		$(document).on("click",".external-link a",function(e){
			
			e.preventDefault()
			var href = $(this).attr("href");
			$(".custom-modal a").attr("href",href);
			$('.custom-modal').modal('show');
		});
		
		
	
</script>

<div class="modal custom-modal fade exit-modal" tabindex="-1" role="dialog" aria-labelledby="exit-modal" id="exit-modal">
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
if(is_page_template('page-templates/csc.php')){
?>
<script type="text/javascript">
	  
	  var ccg_lines = {}; // objet datas ccg
	  var practice_lines = {}; // objet datas practice
	  
function readCCGFile(file)
{
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                var allText = rawFile.responseText;
                
				
				var file_lines = allText.split(/\r\n|\n/);
				
				var headers = file_lines[0].split(';');
    			
	
				for (var i = 1; i < file_lines.length; i++) {
        			var data = file_lines[i].split(';');
        			if (data.length == headers.length) {

            			var tarr = {};
            			for (var j = 1; j < headers.length; j++) {
                			tarr[headers[j]] = data[j].trim();
            			}
						data[0] = data[0].trim();
						var val = data[data.length-1];
						// generate select option values
						$("#cost-calculator-ccg select").append('<option data-saving-ccg="'+val+'" value="'+data[0]+'">'+data[0]+'</option>');
						ccg_lines[data[0]] = tarr;
						
						if(i==1){ // initialize datas with first occurence
							val = val.replace(",",".");
							val = val.replace(" ",",");
							$("#saving-ccg").html('£'+val);
							var raw_value = data[0]; 
							$(".update-data").each(function(){
								var this_item = $(this).data("item");
								if(ccg_lines[raw_value][this_item] != undefined){
									var val =  ccg_lines[raw_value][this_item];
									val = val.replace(",",".");
									val = val.replace(" ",",");
									$(this).html(val);
								}
							});
						}
            			
        			}
    			}
	
	
				
				
            }
        }
    }
    rawFile.send(null);
	
	readPRACTICEFile("<? echo get_field('practice_file'); ?>"); 
}



function readPRACTICEFile(file)
{
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                var allText = rawFile.responseText;
                
				
				var file_lines = allText.split(/\r\n|\n/);
				
				
				var headers = file_lines[0].split(';');
    			
	
				for (var i = 1; i < file_lines.length; i++) {
        			var data = file_lines[i].split(';');
        			if (data.length == headers.length) {

            			var tarr = {};
						var tarr = {};
            			for (var j = 1; j < headers.length; j++) {
                			tarr[headers[j]] = data[j].trim();
            			}
						//tarr[data[1].trim()] = tarr_2;
						
						data[0] = data[0].trim();
						if(practice_lines[data[0]] == undefined){ practice_lines[data[0]] = []; }
						practice_lines[data[0]].push(tarr);
						
						if(i==1){
							var raw_value = data[0]; 
						}
            			
        			}
					
					
    			}
				
				/* set first cost-calculator-practice list */
				k = raw_value;
				$("#cost-calculator-practice select").html("");
				$("#cost-calculator-practice ul").html("");
				$("#cost-calculator-practice select").append('<option value="">Please choose a practice name</option>');
				
				
				for(var z=0;z<practice_lines[k].length;z++){ 
					$("#cost-calculator-practice select").append('<option value="'+z+'">'+practice_lines[k][z]["Practice Name"]+'</option>');
					$("#cost-calculator-practice ul").append('<li data-raw-value="'+z+'">'+practice_lines[k][z]["Practice Name"]+'</li>');
					$("#cost-calculator-practice .trigger").html("Please choose a practice name");
				}
						
	
	
				
				
            }
        }
    }
    rawFile.send(null);
}

	readCCGFile("<? echo get_field('ccg_file'); ?>");



	$(document).on("click","#cost-calculator-ccg li",function(){ // chage ccg select
		
		var raw_value = $(this).data("raw-value");
		var val =  ccg_lines[raw_value]["Grand Total"];
		
		val = val.replace(",",".");
		val = val.replace(" ",",");
		
		$("#saving-ccg").html('£'+val);
		$("#saving-practice").html('£0.00');
		
		
		$(".update-data").each(function(){
			var this_item = $(this).data("item");
			if(ccg_lines[raw_value][this_item] != undefined){
				var val =  ccg_lines[raw_value][this_item];
				
				val = val.replace(",",".");
				val = val.replace(" ",",");
				
				$(this).html(val);
			}
		});
		
		
		$("#cost-calculator-practice ul").html("");
		k = raw_value;
		
		$("#cost-calculator-practice select").html("");
		$("#cost-calculator-practice ul").html("");
		
		for(var i=0;i<practice_lines[k].length;i++){ 
			
			$("#cost-calculator-practice select").append('<option value="'+i+'">'+practice_lines[k][i]["Practice Name"]+'</option>');
			$("#cost-calculator-practice ul").append('<li data-raw-value="'+i+'">'+practice_lines[k][i]["Practice Name"]+'</li>');
			$("#cost-calculator-practice .trigger").html("Please choose a practice name");
		}
		
	});
	
	
	
	$(document).on("click","#cost-calculator-practice li",function(){ // change practice select
		
		var ccg_value = $("#cost-calculator-ccg li.selected").data("raw-value"); 
		var practice_value = $(this).data("raw-value"); 
		
		
		
		var val =  practice_lines[ccg_value][practice_value]["Grand Total"];
		val = val.replace(",",".");
		val = val.replace(" ",",");
		
		$("#saving-practice").html('£'+val);
		
		
		
		$(".update-data").each(function(){
			var this_item = $(this).data("item");
			if(practice_lines[ccg_value][practice_value][this_item] != undefined){
				var val =  practice_lines[ccg_value][practice_value][this_item];
				val = val.replace(",",".");
				val = val.replace(" ",",");
				$(this).html(val);
			}
		});
		
	});

</script>
<? } ?>

<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86303436-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
