<?php
/**
 * Soma Wichita functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package soma
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function soma_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on soma, use a find and replace
		* to change 'soma' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'soma', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'soma' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background', apply_filters(
			'soma_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	/**
	 * Add support for default block styles.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#default-block-styles
	 */
	add_theme_support( 'wp-block-styles' );
	/**
	 * Add support for wide aligments.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#wide-alignment
	 */
	add_theme_support( 'align-wide' );

	/**
	 * Add support for block color palettes.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#block-color-palettes
	 */
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Dusty orange', 'soma' ),
			'slug'  => 'dusty-orange',
			'color' => '#ed8f5b',
		),
		array(
			'name'  => __( 'Dusty red', 'soma' ),
			'slug'  => 'dusty-red',
			'color' => '#e36d60',
		),
		array(
			'name'  => __( 'Dusty wine', 'soma' ),
			'slug'  => 'dusty-wine',
			'color' => '#9c4368',
		),
		array(
			'name'  => __( 'Dark sunset', 'soma' ),
			'slug'  => 'dark-sunset',
			'color' => '#33223b',
		),
		array(
			'name'  => __( 'Almost black', 'soma' ),
			'slug'  => 'almost-black',
			'color' => '#0a1c28',
		),
		array(
			'name'  => __( 'Dusty water', 'soma' ),
			'slug'  => 'dusty-water',
			'color' => '#41848f',
		),
		array(
			'name'  => __( 'Dusty sky', 'soma' ),
			'slug'  => 'dusty-sky',
			'color' => '#72a7a3',
		),
		array(
			'name'  => __( 'Dusty daylight', 'soma' ),
			'slug'  => 'dusty-daylight',
			'color' => '#97c0b7',
		),
		array(
			'name'  => __( 'Dusty sun', 'soma' ),
			'slug'  => 'dusty-sun',
			'color' => '#eee9d1',
		),
	) );

	/**
	 * Optional: Disable custom colors in block color palettes.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
	 *
	 * add_theme_support( 'disable-custom-colors' );
	 */

	/**
	 * Add support for font sizes.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#block-font-sizes
	 */
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name'      => __( 'small', 'soma' ),
			'shortName' => __( 'S', 'soma' ),
			'size'      => 16,
			'slug'      => 'small',
		),
		array(
			'name'      => __( 'regular', 'soma' ),
			'shortName' => __( 'M', 'soma' ),
			'size'      => 20,
			'slug'      => 'regular',
		),
		array(
			'name'      => __( 'large', 'soma' ),
			'shortName' => __( 'L', 'soma' ),
			'size'      => 36,
			'slug'      => 'large',
		),
		array(
			'name'      => __( 'larger', 'soma' ),
			'shortName' => __( 'XL', 'soma' ),
			'size'      => 48,
			'slug'      => 'larger',
		),
	) );

	/**
	 * Optional: Add AMP support.
	 *
	 * Add built-in support for the AMP plugin and specific AMP features.
	 * Control how the plugin, when activated, impacts the theme.
	 *
	 * @link https://wordpress.org/plugins/amp/
	 */
	add_theme_support( 'amp', array(
		'comments_live_list' => true,
	) );

}
add_action( 'after_setup_theme', 'soma_setup' );

/**
 * Set the embed width in pixels, based on the theme's design and stylesheet.
 *
 * @param array $dimensions An array of embed width and height values in pixels (in that order).
 * @return array
 */
function soma_embed_dimensions( array $dimensions ) {
	$dimensions['width'] = 720;
	return $dimensions;
}
add_filter( 'embed_defaults', 'soma_embed_dimensions' );

/**
 * Register Google Fonts
 */
function soma_fonts_url() {
	$fonts_url = '';

	/**
	 * Translator: If Merriweather does not support characters in your language, translate this to 'off'.
	 */
	$merriweather = esc_html_x( 'on', 'Merriweather font: on or off', 'soma' );
	/**
	 * Translator: If Opens Sans does not support characters in your language, translate this to 'off'.
	 */
	$open_sans = esc_html_x( 'on', 'Open Sans font: on or off', 'soma' );

	$font_families = array();

	if ( 'off' !== $merriweather ) {
		$font_families[] = 'Merriweather:400,700';
	}

	if ( 'off' !== $open_sans ) {
		$font_families[] = 'Open+Sans:300,400,400i,700';
	}

	if ( in_array( 'on', array( $merriweather, $open_sans ) ) ) {
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );

}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function soma_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'soma-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'soma_resource_hints', 10, 2 );

/**
 * Enqueue WordPress theme styles within Gutenberg.
 */
function soma_gutenberg_styles() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'soma-fonts', soma_fonts_url(), array(), null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion

	// Enqueue main stylesheet.
	wp_enqueue_style( 'soma-base-style', get_theme_file_uri( '/css/editor-styles.css' ), array(), '20180514' );
}
add_action( 'enqueue_block_editor_assets', 'soma_gutenberg_styles' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function soma_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Hero Canvas', 'soma' ),
		'id'            => 'hero-canvas',
		'description'   => esc_html__( 'Add widgets here.', 'soma' ),
		'before_widget' => '<figure id="%1$s" class="widget %2$s">',
		'after_widget'  => '</figure>',
		'before_title'  => '<!--',
		'after_title'   => '-->',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'soma' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'soma' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Primary', 'soma' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'soma' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Secondary', 'soma' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'soma' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'soma_widgets_init' );

/**
 * Enqueue styles.
 */
function soma_styles() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'soma-fonts', soma_fonts_url(), array(), null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion

	// Enqueue Font Awesome CDN.
	wp_enqueue_style( 'soma-icons' , 'https://use.fontawesome.com/releases/v5.6.3/css/all.css', array(), '5.6.3' );

	// Enqueue main stylesheet.
	wp_enqueue_style( 'soma-base-style', get_stylesheet_uri(), array(), soma_bust_cache( 'style.css' ) );

	// Register component styles that are printed as needed.
	wp_register_style( 'soma-comments', get_theme_file_uri( '/css/comments.css' ), array(), soma_bust_cache( '/css/comments.css' ) );
	wp_register_style( 'soma-content', get_theme_file_uri( '/css/content.css' ), array(), soma_bust_cache( '/css/content.css' ) );
	wp_register_style( 'soma-sidebar', get_theme_file_uri( '/css/sidebar.css' ), array(), soma_bust_cache( '/css/sidebar.css' ) );
	wp_register_style( 'soma-widgets', get_theme_file_uri( '/css/widgets.css' ), array(), soma_bust_cache( '/css/widgets.css' ) );
	wp_register_style( 'soma-front-page', get_theme_file_uri( '/css/front-page.css' ), array(), soma_bust_cache( '/css/front-page.css' ) );
	wp_register_style( 'soma-hero-canvas', get_theme_file_uri( '/css/hero-canvas.css' ), array(), soma_bust_cache( '/css/hero-canvas.css' ) );
	wp_register_style( 'soma-page-header', get_theme_file_uri( '/css/page-header.css' ), array(), soma_bust_cache( '/css/page-header.css' ) );
}
add_action( 'wp_enqueue_scripts', 'soma_styles' );

/**
 * Enqueue scripts.
 */
function soma_scripts() {

	// If the AMP plugin is active, return early.
	if ( soma_is_amp() ) {
		return;
	}

	wp_enqueue_script( 'soma-smooth-scroll', get_theme_file_uri( '/js/libs/smooth-scroll.min.js' ), array(), '15.2.1', false );
	wp_script_add_data( 'soma-smooth-scroll', 'async', true );
	wp_enqueue_script( 'soma-rellax', get_theme_file_uri( '/js/libs/rellax.min.js' ), array(), '1.7.2', false );
	wp_script_add_data( 'soma-rellax', 'async', true );

	// Enqueue the navigation script.
	wp_enqueue_script( 'soma-navigation', get_theme_file_uri( '/js/navigation.js' ), array(), soma_bust_cache( '/js/navigation.js' ), false );
	wp_script_add_data( 'soma-navigation', 'defer', true );
	wp_localize_script( 'soma-navigation', 'somaScreenReaderText', array(
		'expand'   => __( 'Expand child menu', 'soma' ),
		'collapse' => __( 'Collapse child menu', 'soma' ),
	));

	// Enqueue skip-link-focus script.
	wp_enqueue_script( 'soma-skip-link-focus-fix', get_theme_file_uri( '/js/skip-link-focus-fix.js' ), array(), soma_bust_cache( '/js/skip-link-focus-fix.js' ), false );
	wp_script_add_data( 'soma-skip-link-focus-fix', 'defer', true );

	// Enqueue main scripts.
	wp_enqueue_script( 'soma-main', get_theme_file_uri( '/js/main.js' ), array(
		'soma-smooth-scroll',
		'soma-rellax',

	), soma_bust_cache( '/js/main.js' ), false );
	wp_script_add_data( 'soma-main', 'async', true );

	// Enqueue comment script on singular post/page views only.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'soma_scripts' );

/**
 * Custom responsive image sizes.
 */
require get_template_directory() . '/inc/image-sizes.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/pluggable/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Optional: Add theme support for lazyloading images.
 *
 * @link https://developers.google.com/web/fundamentals/performance/lazy-loading-guidance/images-and-video/
 */
require get_template_directory() . '/pluggable/lazyload/lazyload.php';

/*
 * Custom.
 */

function soma_bust_cache( $file_path = null ) {
	$file_path_uri = get_stylesheet_directory_uri() . '/' . $file_path;
	$file_last_mod = filemtime(get_stylesheet_directory() . '/' . $file_path);

	return $file_last_mod;
}

add_shortcode( 'preview_posts', function( $atts = array(), $content = null ) {
	extract( shortcode_atts( array(
		'posts_per_page' => '3',
		'post_type' => 'post',
	), $atts ) );

	$output = '';

	// The Query
	$args = array(
		'post_type' => $post_type,
		'ignore_sticky_posts' => 1,
		'posts_per_page' => $posts_per_page,
	);
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) {
		$output .= '<ul>';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$output .= soma_preview_posts_helper();
		}
		$output .= '</ul>';
		// Restore original Post Data
		wp_reset_postdata();
	} else {
		// No posts found
		$output .= '<ul><li>No posts found</li></ul>';
	}

	return '<div class="preview-posts">' . $output . '</div>';
} );

function soma_preview_posts_helper() {
	$output = '';
	$link_open = '<a href="' . get_the_permalink() . '" rel="bookmark">';
	$link_close = '</a>';
	$output .= '<li>';
	$output .= has_post_thumbnail() ? '<div class="preview-posts__thumbnail-wrapper">' . $link_open : '';
	$output .= get_the_post_thumbnail();
	$output .= has_post_thumbnail() ? $link_close . '</div>' : '';
	$output .= '<h4 class="preview-posts__title">' . $link_open . get_the_title() . $link_close . '</h4>';
	$output .= '<div class="mb-1">' . get_the_excerpt() . '</div>';
	$output .= '<div class="wp-block-button btn--sm">';
	$output .= '<a class="wp-block-button__link" href="'. get_the_permalink() .'" rel="bookmark">Read More</a>';
	$output .= '</div>';
	$output .= '</li>';

	return $output;
}

add_shortcode( 'search_form', function( $atts = array(), $content = null ) {
	return get_search_form( false );
} );

add_filter( 'wp_nav_menu_objects', function ( $menu_items ) {

	// A list of placeholders to replace.
	// You can add more placeholders to the list as needed.
	$placeholders = array(
		'#search_form#' => array(
			'shortcode' => 'search_form',
			'atts' => array(), // Shortcode attributes.
			'content' => null, // Content for the shortcode.
		),
	);

	foreach ( $menu_items as $menu_item ) {
		if ( isset( $placeholders[ $menu_item->url ] ) ) {
			global $shortcode_tags;
			$placeholder = $placeholders[ $menu_item->url ];

			if ( isset( $shortcode_tags[ $placeholder['shortcode'] ] ) ) {
				$menu_item->classes[] = 'menu-item-search-form';
				$menu_item->url = null;
				$menu_item->title = call_user_func(
					$shortcode_tags[ $placeholder['shortcode'] ]
					, $placeholder['atts']
					, $placeholder['content']
					, $placeholder['shortcode']
				);
			}
		}
	}

	return $menu_items;
} );

/*
 * Return attachment ID from image URL
 */
function soma_get_image_id( $image_url ) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));

	return $attachment[0];
}
