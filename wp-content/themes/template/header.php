<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Susty
 */
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

    <script>document.documentElement.classList.remove("no-js")</script>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

    <link rel="icon" href="/favicon.ico">

	<?php wp_head(); ?>
	<?php /* usercentrics needs jquery for IE 11 */ ?>

</head>


<body <?php body_class( 'black' ); ?>>
	<div id="wrapper" class="hfeed <?php echo get_field('color');?>">
	<header id="header" role="banner">
		

	</header>


	

	<div class="menu-container">
		<a class='mobile-menu-icon'></a>
		<?php

		wp_nav_menu( array(
			'menu' => 'main-menu'
		) );

		?>

	</div>

		<div id="container">
