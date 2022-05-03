<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta property="og:image" content="<?php bloginfo('html_type'); ?>"/>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<section id="header">
		<div class="desktop-menu-holder icons">
			<button class="menu-icon menu-icon--transparent animated rubberBand">
			    <span></span>
			    <span></span>
			    <span></span>
			</button>
		</div>
		<div class="desktop-menu">
			<?php 
				if ( is_active_sidebar( 'head-menu' ) ) : 
					dynamic_sidebar( 'head-menu' ); 
				endif;
			?>
		</div>
		<div class="header container">
			<div class="head-content">
				<div class="header-logo">
					<a href="<?php bloginfo('url') ?>">
					<?php
						if ( is_active_sidebar( 'website-logo' ) ) : 
							dynamic_sidebar( 'website-logo' ); 
						endif; 
					 ?>
					</a>
				</div>
			</div>
		</div>
	</section>
	<div class="main-pages">
		


