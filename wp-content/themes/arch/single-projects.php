<?php
	if(get_option('arch_project_hover_link')=="Url") {
		get_header();

			?>
			<div class="inside load-item">
				<div class="page-content project-inside">
					<?php get_theme_page_title(); ?>
					<?php get_projects_category(); ?>
				</div>
			</div>

			<!--PROJECTS-->
			<div class="project-page <?php if(strpos($theUA,'msie')) { } else { echo "load-item"; } ?> clear">
				
				<!--PROJECT LIST-->
				<div class="horScroll">
					<section class="project-list clear">
						<?php
							if ( post_password_required() ) {
								?><div class="protected"><?php the_content(); ?></div><?php
							}else {
								$pattachment_order = get_option('arch_attachment_order');
								$pattachment_orderby = get_option('arch_attachment_orderby');

								if(get_option('arch_project_thumb_slider')!="true") {
									$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'order' => $pattachment_order, 'orderby' => $pattachment_orderby, 'post_status' => null, 'post_parent' => $post->ID );
								}else {
									$thumb_id = get_post_thumbnail_id( get_the_ID() );
									$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'order' => $pattachment_order, 'orderby' => $pattachment_orderby, 'post_status' => null, 'post_parent' => $post->ID, 'exclude' => $thumb_id );
								}
								
								$attachments = get_posts( $args );	

								if ( $attachments ) {								
									foreach ( $attachments as $attachment ) {
										$img_title = $attachment->post_title;
										$attachment_id = $attachment->ID;
										$type = get_post_mime_type( $attachment->ID ); 
										$large_image_url = wp_get_attachment_image_src( $attachment_id, 'full' ); 

										switch ( $type ) {
											case 'video/mp4':
												?>
												<div class="projects">
													<video id="videojs_gallery" class="video-js vjs-default-skin" controls preload="none" width="294" height="177" poster="" data-setup="{}">
														<source src="<?php echo wp_get_attachment_url( $attachment->ID ); ?>" type='video/mp4' />
													</video>
													<div class="project-details">
														<h3><?php echo $img_title; ?></h3>		
													</div>	
												</div>
												<?php
											break;
											default:
												?>
												<div class="projects">
													<div class="link-hover">
														<a href="<?php echo $large_image_url[0]; ?>" rel="gallery" alt="<?php echo $img_title; ?>">
															<?php echo wp_get_attachment_image( $attachment->ID, 'portfolio-medium' ); ?>
															<div class="blog-hover"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/link.png" alt="" title="" /></div>
														</a>
													</div>	
													<div class="project-details-single">
														<h3><?php echo $img_title; ?></h3>		
													</div>											
												</div>											
												<?php
											break;
										}									
									}
								}else {
									_e( 'No Attachment', ENGINE_THEME_NAME );
								}
							}
						?>
					</section>
				</div>

			</div>
			<?php

		get_footer();
	}else {
		?>
		<!DOCTYPE html>
		<style type="text/css">
			html, body, div, span, object, iframe,
			h1, h2, h3, h4, h5, h6, p, blockquote, pre,
			abbr, address, cite, code,
			del, dfn, em, img, ins, kbd, q, samp,
			small, strong, sub, sup, var,
			b, i,
			dl, dt, dd, ol, ul, li,
			fieldset, form, label, legend,
			table, caption, tbody, tfoot, thead, tr, th, td,
			article, aside, canvas, details, figcaption, figure,
			footer, header, hgroup, menu, nav, section, summary,
			time, mark, audio, video { margin:0; padding:0; border:0; outline:0; font-size:100%; vertical-align:baseline; background:transparent; }
			html body { font:12px/1.8em arial; color:#707070; font-family:'Open Sans', sans-serif; margin:0; padding:0; line-height:22px; color:#6f6f6f; overflow-y:hidden; background:#FFF; } 
			body embed { position:absolute; top:0; right:0; }
			article,aside,details,figcaption,figure, footer,header,hgroup,menu,nav,section { display:block; }
			nav ul, ul li { list-style:none; }
			blockquote, q { quotes:none; }
			blockquote:before, blockquote:after, q:before, q:after { content:''; content:none; }
			a { margin:0; padding:0; font-size:100%; vertical-align:baseline; background:transparent; }
			ins { background-color:#ff9; color:#000; text-decoration:none; }
			mark { background-color:#ff9; color:#000; font-style:italic; font-weight:bold; }
			del { text-decoration: line-through; }
			abbr[title], dfn[title] { border-bottom:1px dotted; cursor:help; }
			table { border-collapse:collapse; border-spacing:0; }
			hr { display:block; height:1px; border:0; border-top:1px solid #CCC; margin:1em 0; padding:0; }
			input, select { vertical-align:middle; }

			@import url(http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800);
			
			.psingle-desc { padding:30px; color:#757575; font-size:13px; }
			.psingle-desc h2 { padding:0; margin:0 0 4px 0; font:600 18px 'Open Sans', sans-serif; color:#474747; }
			.psingle-desc span a { color:#9d9d9d; font-size:13px; text-decoration:none; display:inline-block; margin-bottom:20px; }
			.psingle-desc span a:hover { text-decoration:underline; }
			.psingle-desc p { margin:0 0 20px 0; padding:0; }
			a.visit:link, a.visit:visited { background:#FF9C00; color:#FFF; padding:10px 25px; text-align:center; font:14px 'Open Sans', sans-serif; text-decoration:none; display:inline-block; }
			a.visit:hover { background-color:#ea9106; }
			.psingle-images iframe { height:450px !important; margin-bottom:0 !important; }
			.protected { padding:30px; }

			@media only screen and (max-width: 960px) {
				.modal-projects { overflow:hidden; }
			}
			@media only screen and (max-width: 480px) {
				.portfolio-flexslider .slides img { max-width:353px; height:auto; }
				.psingle-images iframe { width:353px !important; height:218px !important; }
			}
			@media only screen and (max-width : 320px) {
				.portfolio-flexslider .slides img { max-width:250px; height:auto; }
				.psingle-images iframe { width:250px !important; height:160px !important; }
			}
		</style>
		<link rel='stylesheet' id='style-css'  href='<?php echo get_stylesheet_directory_uri(); ?>/style.css' type='text/css' media='all' />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/flexslider/flexslider.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/responsive.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/touchTouch/touchTouch.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/video/video-js.css" type="text/css" media="all" />

		<link rel="stylesheet" href="<?php echo plugins_url(); ?>/typo-shortcodes/typo-style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo plugins_url(); ?>/typo-shortcodes/js/toggle/style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo plugins_url(); ?>/typo-shortcodes/js/tabs/tabs.css" type="text/css" media="all" />
		<script type="text/javascript" src="<?php echo includes_url(); ?>js/jquery/jquery.js?ver=1.8.3"></script> 

		<style type="text/css">
		<?php
			if(get_option('arch_button_text_color')!="" ) { 
				?>a.visit { color:<?php echo get_option('arch_button_text_color') ?> !important; }<?php
			}
			if(get_option('arch_button_bg_color')!="" ) { 
				?>a.visit { background-color:<?php echo get_option('arch_button_bg_color') ?> !important; }<?php
			}
		?>
		</style>

		<!--BLOG CONTENT-->
		<div class="modal-projects">
			
			<?php 
				if ( post_password_required() ) {
					?><div class="protected"><?php the_content(); ?></div><?php
				}else {
					if ( have_posts() ) :
						while (have_posts()) : the_post(); 
						?>
							<div class="psingle-images">
								<?php
									if ( get_post_meta( $post->ID, "video", true ) ) {
										?>
										<iframe width="728" height="450" src="<?php echo get_post_meta( $post->ID, "video", true ); ?>" frameborder="0" allowfullscreen></iframe>
										<?php
									}else {
										?>
										<!--SLIDER-->
										<div class="portfolio-flexslider">
											<ul class="slides">
												<?php
													$pattachment_order = get_option('arch_attachment_order');
													$pattachment_orderby = get_option('arch_attachment_orderby');

													if(get_option('arch_project_thumb_slider')!="true") {
														$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'order' => $pattachment_order, 'orderby' => $pattachment_orderby, 'post_status' => null, 'post_parent' => $post->ID );
													}else {
														$thumb_id = get_post_thumbnail_id( get_the_ID() );
														$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'order' => $pattachment_order, 'orderby' => $pattachment_orderby, 'post_status' => null, 'post_parent' => $post->ID, 'exclude' => $thumb_id );
													}
													
													$attachments = get_posts( $args );	

													if ( $attachments ) {								
														foreach ( $attachments as $attachment ) {
															$img_title = $attachment->post_title;
															$attachment_id = $attachment->ID;
															$type = get_post_mime_type( $attachment->ID ); 
															$large_image_url = wp_get_attachment_image_src( $attachment_id, 'full' ); 

															switch ( $type ) {
																case 'video/mp4':
																	?>
																	<li>
																		<video id="videojs_gallery" class="video-js vjs-default-skin" controls preload="none" width="728" height="450" poster="" data-setup="{}">
																			<source src="<?php echo wp_get_attachment_url( $attachment->ID ); ?>" type='video/mp4' />
																		</video>
																	</li>
																	<?php
																break;
																default:
																	?>
																	<li><?php echo wp_get_attachment_image( $attachment->ID, 'portfolio-large' ); ?></li>
																	<?php
																break;
															}
															
														}
													}else {
														?><img src="<?php echo get_template_directory_uri(); ?>/img/placeholder-large.jpg" alt="" title="" /><?php
													}	
												?>
											</ul>
										</div>
										<?php	
									}
								?>
							</div>

							<div class="verScroll">
								<div class="psingle-desc">
									<h2><?php the_title(); ?></h2>
									<?php
										$taxonomy = 'project_categories';
										$terms = get_the_terms($post->ID, $taxonomy );
										if(!empty($terms)) {
											foreach ($terms as $term) { $term_name[] = '<span><a href="'.get_term_link($term, $taxonomy).'" target="_parent">'.$term->name.'</a></span>'; }	
											echo $term_list = join( ", ", $term_name );	
										}																
									?>
									<?php the_content(); ?>
									<?php
										if(get_post_meta( $post->ID, "url", true)!="") {
											?>
											<a href="<?php echo get_post_meta( $post->ID, "url", true); ?>" class="visit" target="_blank">
												<?php if(get_option('arch_vsite')!="") { echo get_option('arch_vsite'); } else { _e( 'Visit Link', ENGINE_THEME_NAME ); } ?></a>
											<?php
										}
									?>			
								</div>
							</div>

						<?php endwhile;
					endif;
				}
			?>
		</div>

		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/flexslider/jquery.flexslider-min.js"></script>
		<script type="text/javascript" src="<?php echo plugins_url(); ?>/typo-shortcodes/js/toggle/jquery.toggle.js"></script>
		<script type="text/javascript" src="<?php echo plugins_url(); ?>/typo-shortcodes/js/tabs/jquery.tabs.js"></script>
		<script type="text/javascript" src="<?php echo plugins_url(); ?>/typo-shortcodes/js/alert.js"></script>
		<script type='text/javascript' src='<?php echo includes_url(); ?>js/jquery/ui/jquery.ui.core.min.js?ver=1.9.2'></script>
		<script type='text/javascript' src='<?php echo includes_url(); ?>js/jquery/ui/jquery.ui.widget.min.js?ver=1.9.2'></script>
		<script type='text/javascript' src='<?php echo includes_url(); ?>js/jquery/ui/jquery.ui.mouse.min.js?ver=1.9.2'></script>
		<script type='text/javascript' src='<?php echo includes_url(); ?>js/jquery/ui/jquery.ui.draggable.min.js?ver=1.9.2'></script>
		<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jquery.easing-1.3.min.js?ver=3.6'></script>
		<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/scrollpane/jquery.mousewheel.min.js?ver=3.6'></script>
		<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/touchTouch/touchTouch.jquery.js?ver=3.6'></script>
		<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/video/video.js?ver=3.6'></script>
		<?php
	}	
?>