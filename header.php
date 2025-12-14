<?php
/**
 * Header file for the Mist theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mist
 * @since 1.0
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<meta name="rating" content="adult">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon-96x96.png" sizes="96x96" />
		<link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon.svg" />
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon.ico" />
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon.png" />
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/img/favicon/site.webmanifest" />
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>
		<?php wp_body_open();?>

		<header>
		<?php get_template_part( 'template-parts/navbar' ); ?>
		</header>

		<?php
		
