<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<div class="container">
		
		<nav id="fixed-nav">
			<span class="nav-title">Fine Arts Theatre</span>
			<span class="openbtn">&#9776;</span>
		</nav>
	
		<nav class="site-nav" id="sidenav">
			<div class="closebtn">&times;</div>
			<?php wp_nav_menu( array( 'theme-location' => 'primary' ) ); ?>
		</nav>
			
			
	    <div class="hero-container">
	    	<img id="hero-img" src="<?php bloginfo('template_directory'); ?>/img/header3.png" alt="Fine Arts Theatre exterior photo">
		</div>