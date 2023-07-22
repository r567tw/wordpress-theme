<?php

function custom_style(){
    wp_enqueue_style("custom_style",get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'custom_style');

