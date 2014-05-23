<?php
/**
 * Header for the landing page template.
 *
 * It will be displayed when "Landing Page" is chosen as a the template for the
 * current page.
 *
 * @package Follet_Theme
 * @since   1.1
 */
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body id="wrapper" <?php body_class(); ?> <?php follet_microdata( 'body' ); ?>>

	<div id="page" class="hfeed site landing-page">

		<?php get_template_part( 'templates/top-navigation-landing-page', get_post_format() ); ?>

		<?php get_template_part( 'templates/header-landing-page', get_post_format() ); ?>

		<div id="content-wrapper" class="<?php follet_container_class( 'content-wrapper' ); ?>">

			<div id="content" class="site-content row">
