<?php
/* Template Name: Splash Template */

// remove header
beans_remove_action( 'beans_header_partial_template' );

// remove title
beans_remove_action( 'beans_post_title' );

// remove the breadcrumbs
beans_remove_action( 'beans_breadcrumb' );

// remove footer
beans_remove_action( 'beans_footer_partial_template' );

// Always add this function at the bottom of template file.
beans_load_document();