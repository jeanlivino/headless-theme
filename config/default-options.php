<?php
/*
My Default Options
Author: Jean Livino - Descomplique Digital
Author URI: https://www.descompliquedigital.com.br/
*/

// support thumbnails
add_theme_support('post-thumbnails');

// remove the admin bar
function remove_admin_bar()
{
  // if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
  // }
}
add_action('after_setup_theme', 'remove_admin_bar');

// create the posttypes
function create_posttypes()
{
  //  POST TYPE
  register_post_type(
    'post_type',
    array(
      'labels' => array(
        'name' => __('Post Name'),
        'singular_name' => __('Post'),
        'add_new_item'          => __('Adicionar novo'),
      ),
      'menu_icon' => 'dashicons-admin-users',
      'menu_position' => 5,
      'public' => false,
      'show_in_menu'     => true,
      'show_ui'     => true,
      'has_archive' => false,
      'supports' => array('title')
    )
  );
}
add_action('init', 'create_posttypes');

// create taxonomies
add_action('init', 'create_taxonomies');

function create_taxonomies()
{
  register_taxonomy(
    'name',
    'post_type', //change to your post type
    array(
      'label' => __('Tax Name'),
      'hierarchical' => true,
    )
  );
}

// create thumbnails size
function create_thumbsize()
{
  add_image_size('portfolio-thumb', 280, 200, true);
};
add_action('after_setup_theme', 'create_thumbsize');

// remove admin bars and links on menu
function remove_admin_bar_links()
{
  global $wp_admin_bar;
  if (!current_user_can('administrator')) {
    $wp_admin_bar->remove_menu('wp-logo'); // Remove the WordPress logo
    $wp_admin_bar->remove_menu('about'); // Remove the about WordPress link
    $wp_admin_bar->remove_menu('wporg'); // Remove the WordPress.org link
    $wp_admin_bar->remove_menu('documentation'); // Remove the WordPress documentation link
    $wp_admin_bar->remove_menu('support-forums'); // Remove the support forums link
    $wp_admin_bar->remove_menu('feedback'); // Remove the feedback link
    $wp_admin_bar->remove_menu('site-name'); // Remove the site name menu
    $wp_admin_bar->remove_menu('view-site'); // Remove the view site link
    $wp_admin_bar->remove_menu('updates'); // Remove the updates link
    $wp_admin_bar->remove_menu('comments'); // Remove the comments link
    //         $wp_admin_bar->remove_menu('profile'); // Remove the profile link
    $wp_admin_bar->remove_menu('new-content'); // Remove the content link
    $wp_admin_bar->remove_menu('w3tc'); // If you use w3 total cache remove the performance link
    //         $wp_admin_bar->remove_menu('my-account'); // Remove the user details tab
  }
}
add_action('wp_before_admin_bar_render', 'remove_admin_bar_links');

function custom_menu_page_removing()
{
  if (!current_user_can('administrator')) {
    remove_menu_page('wpcf7');
    remove_menu_page('index.php'); //Dashboard
    remove_menu_page('jetpack'); //Jetpack*
    remove_menu_page('edit.php'); //Posts
    remove_menu_page('upload.php'); //Media
    remove_menu_page('edit.php?post_type=page'); //Pages
    remove_menu_page('edit.php?post_type=portfolio'); //portfolio
    remove_menu_page('edit-comments.php'); //Comments
    remove_menu_page('edit.php?post_type=product'); //product
    remove_menu_page('themes.php'); //Appearance
    remove_menu_page('plugins.php'); //Plugins
    remove_menu_page('users.php'); //Users
    remove_menu_page('index.php'); //dashboard
    remove_menu_page('tools.php'); //Tools
    remove_menu_page('options-general.php'); //Settings
    remove_menu_page('edit.php?post_type=acf-field-group');
    remove_menu_page('profile.php'); //Profile
  }
}
add_action('admin_menu', 'custom_menu_page_removing');
if (function_exists('acf_add_options_page')) {
  $option_page = acf_add_options_page(array(
    'page_title' => 'Informações do App',
    'menu_title' => 'Informações do App',
    'menu_slug' => 'siteinfo',
    'capability' => 'edit_posts',
    'redirect' => false,
    'position' => 5
  ));
}
