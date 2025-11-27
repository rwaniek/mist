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
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>
		<?php wp_body_open();?>

		<header>
		<?php get_template_part( 'template-parts/navbar' ); ?>
		</header>

		<?php
		
