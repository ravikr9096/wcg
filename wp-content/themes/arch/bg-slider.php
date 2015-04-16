<?php
	if(is_home()) {
		?>
		<!--CAPTION and ARROW-->
		<div class="welcome-arrow load-item">
			<?php
				if(get_option('arch_slide_title')!="true") {
					?><div id="slidecaption"></div><?php
				}

				if(get_option('arch_arrow_nav')!="true") {
					?>
					<ul class="nav clear">
						<li class="sprev"><a id="prevslide">&nbsp;</a></li>
						<li class="snext"><a id="nextslide">&nbsp;</a></li>
					</ul>
					<?php
				}
			?>
		</div>
		<?php
	}			
?>

<?php
	function slide_settings() {
		?>
			slide_interval          : 	<?php if(get_option('arch_slide_int')!="") { echo get_option('arch_slide_int'); } else { echo "3000"; } ?> ,
			transition 				: 	<?php if(get_option('arch_slide_trans')!="") { echo get_option('arch_slide_trans'); } else { echo "1"; } ?> ,							
			transition_speed 		: 	<?php if(get_option('arch_slide_speed')!="") { echo get_option('arch_slide_speed'); } else { echo "700"; } ?> , 								   
			slide_links 			: 	'blank',			
			min_width		        :   <?php if(get_option('arch_min_width')!="") { echo get_option('arch_min_width'); } else { echo "0"; } ?>,
			min_height		        :   <?php if(get_option('arch_min_height')!="") { echo get_option('arch_min_height'); } else { echo "0"; } ?>,
			vertical_center         :   <?php if(get_option('arch_vertical_center')!="") { echo get_option('arch_vertical_center'); } else { echo "1"; } ?>,
			horizontal_center       :   <?php if(get_option('arch_horizontal_center')!="") { echo get_option('arch_horizontal_center'); } else { echo "1"; } ?>,
			fit_always				:	<?php if(get_option('arch_fit_always')!="") { echo get_option('arch_fit_always'); } else { echo "0"; } ?>,
			fit_portrait         	:   <?php if(get_option('arch_fit_portrait')!="") { echo get_option('arch_fit_portrait'); } else { echo "1"; } ?>,
			fit_landscape			:   <?php if(get_option('arch_fit_landscape')!="") { echo get_option('arch_fit_landscape'); } else { echo "0"; } ?>,
		<?php
	}

	$bg_order = get_option('arch_bg_order');
	$bg_orderby = get_option('arch_bg_orderby');	

	if(get_option('arch_bg_homepage_slider') == "true") {
		if(is_front_page()) {
			$args = array( 'post_type' => 'projects', 'posts_per_page' => -1, 'meta_query' => array( array( 'key' => 'bgslide', 'value' => 'on', 'compare' => '=' ) ) );
			$my_query = new WP_Query( $args );

			if( $my_query->have_posts() ) {
				?>
				<script type="text/javascript">	
					(function($) {
					  	"use strict";					  	
					  	jQuery(function($){	

							var image_slides=[];
							<?php
								while($my_query->have_posts()){
							        $my_query->the_post();

							        $image_query = new WP_Query( array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'order' => $bg_order, 'orderby' => $bg_orderby, 'post_mime_type' => 'image', 'posts_per_page' => -1, 'post_parent' => get_the_ID() ) );

						        	while( $image_query->have_posts() ) {
							            $image_query->the_post();
							            $image_attributes = wp_get_attachment_image_src('', 'full');
							            $image_attributes_thumb = wp_get_attachment_image_src('', 'thumbnail');	
							            $cf_image_link = get_post_meta($id, '_cf-image-link', true); 

							           	if(get_option('arch_title_link') != "true") {
							            	?>
								            	image_slides.push({image : '<?php echo $image_attributes[0] ?>', title : '<a href="<?php if(get_post_meta($id, '_cf-image-link', true)) { echo $cf_image_link; } else { the_permalink(); } ?>"><?php the_title(); ?></a>', thumb : '<?php echo $image_attributes_thumb[0] ?>'})	
								            <?php
							            }else {
							            	?>
								            	image_slides.push({image : '<?php echo $image_attributes[0] ?>', title : '<a href="<?php if(get_post_meta($id, '_cf-image-link', true)) { echo $cf_image_link; } else { the_permalink(); } ?>"><?php the_title(); ?></a>', thumb : '<?php echo $image_attributes_thumb[0] ?>'})	
								            <?php
							            }	
							        }
							    }	
							    wp_reset_query();					
							?>		

							$.supersized({			
								<?php slide_settings(); ?>
								slides: image_slides,								
							});
					    });	

					})(jQuery);									    
				</script>
				<?php
			}else {
				temp_bg_image();
			}
		}else {
			$bgimage = get_post_meta(@$post->ID, "bgimage", true);
			$archive_bgimage = get_option('arch_archive_bgimage');
			$search_bgimage = get_option('arch_search_bgimage');
			$notfound_bgimage = get_option('arch_notfound_bgimage');

			if(is_archive()) {
				if($archive_bgimage != "") {
				?>
				<script type="text/javascript">	
					(function($) {
					  	"use strict";
					  	jQuery(function($){			
							$.supersized({	
								<?php slide_settings(); ?>
								slides: [ {image : '<?php echo $archive_bgimage; ?>', title : '<?php the_title(); ?>'} ] 
							});
					    });		
					})(jQuery);
				</script>
				<?php	
				}else { default_img_bg(); }
			}elseif(is_search()) {
				if($search_bgimage != "") {
				?>
				<script type="text/javascript">	
					(function($) {
					  	"use strict";
					  	jQuery(function($){			
							$.supersized({	
								<?php slide_settings(); ?>
								slides: [ {image : '<?php echo $search_bgimage; ?>', title : '<?php the_title(); ?>'} ] 
							});
					    });		
					})(jQuery);								    
				</script>
				<?php	
				}else { default_img_bg(); }
			}elseif(is_404()) {
				if($notfound_bgimage != "") {
					?>
						<script type="text/javascript">	
							(function($) {
							  	"use strict";
							  	jQuery(function($){			
									$.supersized({	
										<?php slide_settings(); ?>
										slides: [ {image : '<?php echo $notfound_bgimage; ?>', title : '<?php the_title(); ?>'} ] 
									});
							    });		
							})(jQuery);    
						</script>
					<?php	
				}else { default_img_bg(); }
			}elseif(is_page() || is_single()) {
				if($bgimage != "") {
					?>
					<script type="text/javascript">	
						(function($) {
						  	"use strict";
						  	jQuery(function($){			
								$.supersized({
									<?php slide_settings(); ?> 
									slides: [ {image : '<?php echo $bgimage; ?>', title : '<?php the_title(); ?>'} ] 
								});
						    });		
						})(jQuery);									    
					</script>
					<?php	
				}else { default_img_bg(); }
			}else {
				default_img_bg();
			}
		}		    
	}else {
		$args = array( 'post_type' => 'projects', 'posts_per_page' => -1, 'meta_query' => array( array( 'key' => 'bgslide', 'value' => 'on', 'compare' => '=' ) ) );
		$my_query = new WP_Query( $args );

		if( $my_query->have_posts() ) {
			?>
			<script type="text/javascript">	
				(function($) {
				  	"use strict";
				  	jQuery(function($){
						var image_slides=[];
						<?php
							while($my_query->have_posts()){
						        $my_query->the_post();

						        $image_query = new WP_Query( array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'order' => $bg_order, 'orderby' => $bg_orderby, 'post_mime_type' => 'image', 'posts_per_page' => -1, 'post_parent' => get_the_ID() ) );

					        	while( $image_query->have_posts() ) {
						            $image_query->the_post();
						            $image_attributes = wp_get_attachment_image_src('', 'full');
						            $image_attributes_thumb = wp_get_attachment_image_src('', 'thumbnail'); 
							        $cf_image_link = get_post_meta($id, '_cf-image-link', true); 

						            if(get_option('arch_title_link') != "true") {
						            	?>
							            	image_slides.push({image : '<?php echo $image_attributes[0] ?>', title : '<a href="<?php if(get_post_meta($id, '_cf-image-link', true)) { echo $cf_image_link; } else { the_permalink(); } ?>"><?php the_title(); ?></a>', thumb : '<?php echo $image_attributes_thumb[0] ?>'})	
							            <?php
						            }else {
						            	?>
							            	image_slides.push({image : '<?php echo $image_attributes[0] ?>', title : '<a href="<?php if(get_post_meta($id, '_cf-image-link', true)) { echo $cf_image_link; } else { the_permalink(); } ?>"><?php the_title(); ?></a>', thumb : '<?php echo $image_attributes_thumb[0] ?>'})	
							            <?php
						            }					            
						        }
						    }	
						    wp_reset_query();					
						?>		

						$.supersized({			
							<?php slide_settings(); ?>							
							slides: image_slides,							
						});
				    });	
				})(jQuery);	    
			</script>
			<?php
		}else {
			temp_bg_image();
		}
	}


	//FUNCTIONS... 

	function default_img_bg() {
		$theme_bgimage = get_option('arch_theme_bgimage');
		?>
		<script type="text/javascript">	
			(function($) {
			  	"use strict";
			  	jQuery(function($){			
					$.supersized({	
						<?php slide_settings(); ?>
						slides: [ {image : '<?php echo $theme_bgimage; ?>', title : '<?php the_title(); ?>'} ] 
					});
			    });		
			})(jQuery);    
		</script>
		<?php	
	}	

	function temp_bg_image() {
		?>
		<script type="text/javascript">	
			(function($) {
			  	"use strict";
			  	jQuery(function($){			
					$.supersized({ 
						<?php slide_settings(); ?>
						slides: [ 
							{image : 'http://wp.themecss.com/Arch/wp-content/uploads/2013/01/2608974320_a4ec241445_o.jpg', title : '<a href="#">This is your temporary background image</a>'}, 
							{image : 'http://wp.themecss.com/Arch/wp-content/uploads/2013/01/home.jpg', title : '<a href="#">Check our documentation on how to set up</a>'} 
						] });
			    });			
			})(jQuery);						    
		</script>
		<?php	
	}
?>