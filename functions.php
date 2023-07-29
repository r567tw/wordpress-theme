<?php

function university_files() {
  wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'university_files');

function university_feature(){
  register_nav_menu('header','Header Menu Location');
  register_nav_menu('footer-1','Left Footer Menu Location');
  register_nav_menu('footer-2','Right Footer Menu Location');
  add_theme_support("title-tag");

}
add_action('after_setup_theme','university_feature');


function university_post_type(){
  register_post_type('event', array(
    'public' => true,
    'show_in_rest' => true,
    'rewrite' => array('slug' => "events"),
    'has_archive' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item'    => 'Edit Event',
      'all_items'     => 'All Events',
      'singular_name' => 'Event',
      'add_new'       => 'Add New Event'
    ),
    // https://developer.wordpress.org/resource/dashicons/#sos
    'menu_icon' =>  'dashicons-calendar'
  ));

}
add_action("init","university_post_type");