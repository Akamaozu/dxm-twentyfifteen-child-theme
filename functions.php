<?php

// enqueue parent stylesheet
  add_action( 'wp_enqueue_scripts', 'enqueue_parent_style' );

  function enqueue_parent_style() {
    
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/child-style.css' );
  }

// create post footer widget-area
  register_sidebar( array(
    'name' => 'Post Footer',
    'id' => 'post-footer-widget-area',
    'before_widget' => '<div id="post-footer-widget-area" class="hentry">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ) );

// put post footer widget before comment section
  add_filter( 'comments_template_query_args', 'append_post_footer' );

  function append_post_footer( $comment_args ) {

    if ( is_single() ) {

      dynamic_sidebar( 'post-footer-widget-area' );
    }
    
    return $comment_args;
  }

?>