<?php

// Include Beans. Do not remove the line below.
require_once( get_template_directory() . '/lib/init.php' );

add_action( 'wp_enqueue_scripts', 'beans_child_enqueue_assets' );

function beans_child_enqueue_assets() {
	
	wp_enqueue_style( 'open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans' );
	wp_enqueue_style( 'merriweather', 'https://fonts.googleapis.com/css?family=Merriweather' );

}

/*
 * Remove this action and callback function if you do not whish to use LESS to style your site or overwrite UIkit variables.
 * If you are using LESS, make sure to enable development mode via the Admin->Appearance->Settings option. LESS will then be processed on the fly.
 */
add_action( 'beans_uikit_enqueue_scripts', 'beans_child_enqueue_uikit_assets' );

function beans_child_enqueue_uikit_assets() {
	$base = get_stylesheet_directory_uri() . '/assets/styles';

	beans_compiler_add_fragment( 'uikit', array(
		get_stylesheet_directory_uri() . '/style.less',
		"{$base}/forms.less",
	), 'less' );
}

add_shortcode('bw-icon', function($atts = array(), $content = null) {
	$atts = shortcode_atts(array(
		'icon' => '',
		'link' => '#',
		'rel' => 'noopener',
		'target' => '_blank',
	), $atts);
	return '<a
		href="' . $atts['link'] . '" target="' . $atts['target'] . ' rel="' . $atts['rel'] . '"
		class="uk-icon-button uk-icon-' . $atts['icon'] . '"></a>';
});