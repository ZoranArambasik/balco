</div>
<section id="footer">
	<div class="top-footer">
		<div class="container">
			<div class="row">
				<div class="col-12 mb-3">
					<div class="footer-logo">
						<a href="<?php bloginfo('url') ?>">
						<?php
							if ( is_active_sidebar( 'footer-logo' ) ) : 
								dynamic_sidebar( 'footer-logo' ); 
							endif; 
						 ?>
						</a>
					</div>
				</div>
				<div class="col-md-5 mb-3">
					<div class="footer-description">
						<?php
							if ( is_active_sidebar( 'footer-description' ) ) : 
								dynamic_sidebar( 'footer-description' ); 
							endif; 
						 ?>
					</div>
			        <div class="social-links">
			        	<?php if (!empty(get_theme_mod( "Linkedin" ))): ?>
			        		<a target="_blank" href="<?php echo get_theme_mod( "Linkedin" ); ?>"><i class="fab fa-linkedin-in"></i></a>
			        	<?php endif ?>
			        	<?php if (!empty(get_theme_mod( "Youtube" ))): ?>
			        		 <a target="_blank" href="<?php echo get_theme_mod("Youtube"); ?>"><i class="fab fa-youtube"></i></a>
			        	<?php endif ?>
			        	<?php if (!empty(get_theme_mod( "Instagram" ))): ?>
			        		<a target="_blank" href="<?php echo get_theme_mod( "Instagram" ); ?>"><i class="fab fa-instagram"></i></a>
			        	<?php endif ?>
			        	<?php if (!empty(get_theme_mod( "Facebook" ))): ?>
			        		<a target="_blank" href="<?php echo get_theme_mod( "Facebook" ); ?>"><i class="fab fa-facebook-f"></i></a>
			        	<?php endif ?>
			        	<?php if (!empty(get_theme_mod( "Pinterest" ))): ?>
			        		<a target="_blank" href="<?php echo get_theme_mod( "Pinterest" ); ?>"><i class="fab fa-pinterest"></i></a>
			        	<?php endif ?>
			        	<?php if (!empty(get_theme_mod( "Twitter" ))): ?>
			        		<a target="_blank" href="<?php echo get_theme_mod( "Twitter" ); ?>"><i class="fab fa-twitter"></i></a>
			        	<?php endif ?>
			        	
			        	
				    </div>
				</div>
				<div class="col-md-6 col-12 ml-auto menu-contact-footer">
					<div class="row">
						<div class="col-md-4 mb-3">
							<?php
								if ( is_active_sidebar( 'footer-menu' ) ) : 
									dynamic_sidebar( 'footer-menu' ); 
								endif; 
							 ?>
						</div>
						<div class="col-md-4 mb-3">
							<?php
								if ( is_active_sidebar( 'footer-menu-two' ) ) : 
									dynamic_sidebar( 'footer-menu-two' ); 
								endif; 
							 ?>
						</div>
						<div class="col-md-4 mb-3">
							<?php
								if ( is_active_sidebar( 'kontakt-info' ) ) : 
									dynamic_sidebar( 'kontakt-info' ); 
								endif; 
							 ?>
						</div>
					</div>
				</div>
				<div class="col-12 hr-style"><hr></div>
			</div>
			<div class="row">
				<div class="col-12">
		        	<div class="copy-right">
		        		&copy; COPYRIGHT <?php echo date('Y') ?>  |  BALCO GROUP AB  |  ORG. NR 556821-2319 
		        	</div>
		        </div>
			</div>
		</div>
	</div>
</section>
<!-- <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fa fa-chevron-up"></i></a> -->
<?php wp_footer() ?>
</body>
</html>
