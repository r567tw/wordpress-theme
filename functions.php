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
  add_theme_support("post-thumbnails");

  add_image_size("r567tw",600,300,true);
}
add_action('after_setup_theme','university_feature');


function university_post_type(){
  register_post_type('event', array(
    'supports' => array(
      'title','editor','excerpt','custom-fields','thumbnail'
    ),
    'capability_type' => 'event',
    'map_meta_cap' => true,
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

function university_post_query($query){
  if (!is_admin() AND $query->is_main_query()){
    $query->set("posts_per_page",1);
  }
}
add_filter("pre_get_posts","university_post_query");

function foo_bar_custom_rest(){
  register_rest_field('post','authorName',[
    'get_callback' => function(){
      return get_the_author();
    }
  ]);
}
add_action('rest_api_init','foo_bar_custom_rest');

function foo_bar_custom_route(){
  register_rest_route('custom/v1','search',[
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'customSearchResult' ,
  ]);
}

function customSearchResult(){
  return array("foo"=> "bar");
}

add_action('rest_api_init','foo_bar_custom_route');

