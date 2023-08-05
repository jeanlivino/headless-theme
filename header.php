<?php

/**
 * The header
 */
$isLead = $_GET["sendLead"];

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if (wp_title('', false)) {
																	echo ' :';
																} ?> <?php bloginfo('name'); ?></title>

	<link href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png" rel="shortcut icon">
	<link href="<?php echo get_template_directory_uri(); ?>/assets/img/touch.png" rel="apple-touch-icon-precomposed">
	<link href="https://fonts.googleapis.com/css?family=Barlow:400,700&display=swap" rel="stylesheet">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php wp_head(); ?>


<body>