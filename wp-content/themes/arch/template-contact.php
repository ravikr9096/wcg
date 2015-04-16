<?php
/*
Template Name: Contact	
*/	
?>

<?php 
	//If the form is submitted
	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		//If there is no error, send the email
		if(!isset($hasError)) {
			$fname = trim($_POST['fname']);
			$email = trim($_POST['email']);
			if(function_exists('stripslashes')) {
				$message = stripslashes(trim($_POST['message']))  . "\n\nIP: " . get_the_ip();
			} else {
				$message = trim($_POST['message'])  . "\n\nIP: " . get_the_ip();
			}

			$emailTo = get_option('arch_contactemail'); // please change this to your desire email address thru theme options
			$subject = "[" . get_bloginfo( 'name' ) . "]" . get_option('arch_subject');
			$body = "Name:" . $fname . "\n\nEmail:" . $email . "\n\nComments:" . $message;
			$headers = "From: " . $fname . " <" . $email . ">\n";
			$headers .= "Content-Type: text/plain; charset=UTF-8\n";
        	$headers .= "Content-Transfer-Encoding: 8bit\n";
			
			wp_mail( $emailTo, $subject, $body, $headers );		
			$emailSent = true;
		}
	}

	get_header(); 
?>

	<div class="inside load-item">
		<div class="page-content">

			<?php get_theme_page_title(); ?>
			
			<div class="cpage clear">

				<?php
					if(isset($emailSent) && $emailSent == true) { 
						?>
						<h3><?php echo get_option('arch_email_sent_message'); ?></h3>
						<?php 
					} 
				?>	

				<!--CONTENT-->
				<div class="contact-desc">
					
					<!--MAP-->
					<div id="map"></div>

				</div>

				<!--FORM-->
				<div id="respond">
					<form id="cform" action="<?php the_permalink(); ?>" method="post">
						<ul> 
							<li>
								<label for="fname"><?php _e( 'Name <span>(Required)</span>', ENGINE_THEME_NAME ); ?></label>
								<input type="text" name="fname" id="fname" tabindex="1" class="required" />    							
							</li>
							<li class="last">
								<label for="email"><?php _e( 'Email <span>(Required)</span>', ENGINE_THEME_NAME ); ?></label>
								<input type="text" name="email" id="email" tabindex="2" class="required email" />    							
							</li>
							<li class="msg">
								<label for="message"><?php _e( 'Message', ENGINE_THEME_NAME ); ?></label>							 
								<textarea name="message" rows="0" cols="0" id="message" tabindex="4" class="required"></textarea>        
							</li>        
						 </ul>
						 <p class="form-submit"><input type="submit" value="<?php if(get_option('arch_contact_button_value')!="") { echo get_option('arch_contact_button_value'); } else { echo "Send"; } ?>" id="submit" name="btsend"></p>
					</form> 
				</div>

			</div>

		</div>
	</div>

<?php get_footer(); ?>