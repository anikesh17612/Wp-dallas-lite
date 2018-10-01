<?php
/**
 * Dallas Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dallas Lite
 */

if ( ! function_exists( 'dallaslite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dallaslite_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Dallas Lite, use a find and replace
		* to change 'dallaslite' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'dallas-lite' );
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
		register_nav_menus(array(
			'menu-1' => esc_html__( 'Primary', 'dallas-lite' ),
			'menu-2' => esc_html__( 'Top', 'dallas-lite' ),
			'menu-3' => esc_html__( 'Footer', 'dallas-lite' ),
		));

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));
		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('dallaslite_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		 $defaults = array(
			'height'      => 250,
			'width'       => 250,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );

		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		*/
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 'auto' );
	}
endif;
add_action( 'after_setup_theme', 'dallaslite_setup' );

/**
 * Dallas Lite only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dallaslite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dallaslite_content_width', 640 );
}
add_action( 'after_setup_theme', 'dallaslite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dallaslite_widgets_init() {
	register_sidebar(array(
		'name' => esc_html__( 'Sidebar', 'dallas-lite' ),
		'id' => 'sidebar-1',
		'description' => esc_html__( 'Add widgets here.', 'dallas-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__( 'Bottom A', 'dallas-lite' ),
		'id' => 'bottom-a',
		'description' => esc_html__( 'Add widgets here.', 'dallas-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__( 'bottom B', 'dallas-lite' ),
		'id' => 'bottom-b',
		'description' => esc_html__( 'Add widgets here.', 'dallas-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__( 'Bottom C', 'dallas-lite' ),
		'id' => 'bottom-c',
		'description' => esc_html__( 'Add widgets here.', 'dallas-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__( 'Bottom D', 'dallas-lite' ),
		'id' => 'bottom-d',
		'description' => esc_html__( 'Add widgets here.', 'dallas-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
add_action( 'widgets_init', 'dallaslite_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function dallaslite_scripts() {
	wp_enqueue_style( 'dallaslite-style', get_stylesheet_uri() );
	wp_enqueue_script('dallaslite-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(
		'jquery'
	) , '20151215', true);
	wp_enqueue_style( 'font-family', 'https://fonts.googleapis.com/css?family=' . get_theme_mod( 'body_google_font', 'Lato' ) . '|' . get_theme_mod( 'menu_google_font', 'Lato' ) . '|' . get_theme_mod( 'h1_google_font', 'Lato' ) . '|' . get_theme_mod( 'h2_google_font', 'Lato' ) . '|' . get_theme_mod( 'h3_google_font', 'Lato' ) . '|' . get_theme_mod( 'h4_google_font', 'Lato' ) . '|' . get_theme_mod( 'h5_google_font', 'Lato' ) . '|' . get_theme_mod( 'h6_google_font', 'Lato' ) );
	wp_enqueue_style( 'bootstrap-min-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
	if ( esc_url( get_theme_mod( 'right-to-left','true' ) ) ) {
		wp_enqueue_style( 'rtl-css', get_template_directory_uri() . '/rtl.css' );
	}
	wp_enqueue_script('dallaslite_script', get_template_directory_uri() . '/assets/js/functions.js', array(
		'jquery'
	) , '20160816', true);
	wp_enqueue_script('dallaslite-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(
		'jquery'
	) , '20151215', true);
	wp_enqueue_style( 'dallaslite_style', get_stylesheet_uri() );
	wp_add_inline_style( 'dallaslite_style', dallaslite_css_generator() );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_localize_script('dallaslite_script', 'screenReaderText', array(
		'expand' => __( 'expand child menu', 'dallas-lite' ),
		'collapse' => __( 'collapse child menu', 'dallas-lite' ),
	));
}
add_action( 'wp_enqueue_scripts', 'dallaslite_scripts' );

 /**
 * This code Implimented to add class on body if using RTL
 */
add_filter( 'body_class', 'dallaslite_load_rtl' );
/**
 * REMOVE COLORS OPTION FROM CUSTOMIZER
 *
 * @param object $classes classes to RTL.
 */
function dallaslite_load_rtl( $classes ) {
	if ( get_theme_mod( 'right-to-left' ) === 'true' ) {
		$classes[] = 'rtl';
	}

	if ( get_theme_mod( 'body_layout' ) === 'box_layout' ) {
		$classes[] = 'box_layout';
	}

	return $classes;
}
/**
 * Load Posts at the home page.
 */
function dallaslite_load_more_scripts() {
	global $wp_query;
	// In most cases it is already included on the page and this line can be removed.
	wp_enqueue_script( 'jquery' );
	// register our main script but do not enqueue it yet.
	wp_register_script( 'dallaslite_loadmore', get_stylesheet_directory_uri() . '/assets/js/dallaslite_loadmore.js', array( 'jquery' ) );
	// now the most interesting part.
	// we have to pass parameters to dallaslite_loadmore.js script but we can get the parameters values only in PHP.
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script().
	wp_localize_script( 'dallaslite_loadmore', 'dallaslite_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX.
		'posts' => wp_json_encode( $wp_query->query_vars ), // everything about your loop is here.
		'current_page' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
		'max_page' => $wp_query->max_num_pages,
	) );
	wp_enqueue_script( 'dallaslite_loadmore' );
}
add_action( 'wp_enqueue_scripts', 'dallaslite_load_more_scripts' );


/**
 * Load Posts By AJAX at the home page.
 */
function dallaslite_loadmore_ajax_handler() {
	// prepare our arguments for the query.
	if ( isset( $_POST['query'], $_POST['foo_nonce'] ) && wp_verify_nonce( sanitize_key( $_POST['foo_nonce'] ), 'foo_action' ) ) {// Input var okay.
		$foo = sanitize_text_field( wp_unslash( $_POST['query'] ) );// Input var okay.
		$args = wp_json_encode( sanitize_text_field( wp_unslash( $_POST['query'] ) ) );// Input var okay.
	}
	if ( isset( $_POST['page'], $_POST['foo_nonce'] ) && wp_verify_nonce( sanitize_key( $_POST['foo_nonce'] ), 'foo_action' ) ) {// Input var okay.
		$foo = sanitize_text_field( wp_unslash( $_POST['page'] ) );// Input var okay.
	}
		$args['paged'] = sanitize_text_field( wp_unslash( $_POST ['page'] + 1 ) ); // Input var okay.
		$args['post_status'] = 'publish';
	// it is always better to use WP_Query but not here.
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) :
		// run the loop.
		while ( $the_query->have_posts() ) : $the_query->the_post();
			// look into your theme code how the posts are inserted, but you can use your own HTML of course.
			// do you remember? - my example is adapted for Twenty Seventeen theme.
			get_template_part( 'template-parts/content', get_post_format() );
			// for the test purposes comment the line above and uncomment the below one.
		endwhile;
	endif;
	wp_die(); // here we exit the script and even no wp_reset_query() required!.
}
add_action( 'wp_ajax_loadmore', 'dallaslite_loadmore_ajax_handler' ); // wp_ajax_{action}.
add_action( 'wp_ajax_nopriv_loadmore', 'dallaslite_loadmore_ajax_handler' ); // wp_ajax_nopriv_{action}.


/**
 * Load Posts at the home page.
 */

if ( ! function_exists( 'dallaslite_excerpt_max_charlength' ) ) :
	/**
	 * Custom Excerpt Length
	 *
	 * @param object $wordsreturned varrible for word resturned.
	 */
	function dallaslite_excerpt_max_charlength( $wordsreturned ) {
		$wordsreturned = intval( $wordsreturned );
		$string = get_the_content();
		$retval = $string;
		$string = preg_replace( '/(?<=\S,)(?=\S)/', ' ', $string );
		$string = str_replace( "\n", ' ', $string );
		$array = explode( ' ', $string );
		if ( count( $array ) <= $wordsreturned ) {
			$retval = $string;
		} else {
			array_splice( $array, $wordsreturned );
			$retval = implode( ' ', $array ) . ' ...';
		}
		return $retval;
	}
endif;

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Get the user mata data tag.
 *
 * @param object $user_id varrible for user_id.
 * @param string $fieldvalue varrible for get user meta tag varrible.
 */
function dallaslite_user_data( $user_id, $fieldvalue ) {
	$new_user = get_userdata( $user_id );
	if ( 'first_name' === $fieldvalue ) {
		return $new_user->user_firstname;
	} elseif ( 'last_name' === $fieldvalue ) {
		return $new_user->user_lastname;
	} elseif ( 'description' === $fieldvalue ) {
		return $new_user->description;
	} else {
		return '';
	}
}
/**
 * Loadmore button.
 */
function dallaslite_loadmore_btn() {
	global $wp_query; // you can remove this line if everything works for you.
	// don't display the button if there are not enough posts.
	$max_num_pages_new = $wp_query->max_num_pages > 1;
	if ( $max_num_pages_new ) {
		echo '<div class="dallaslite_loadmore btn btn-primary">Load More</div>'; // you can use <a> as well.
	}
}

/**
 * Registers an editor stylesheet for the theme.
 */
function dallaslite_add_editor_styles() {
	add_editor_style( 'dallaslite-editor-style.css' );
}
add_action( 'admin_init', 'dallaslite_add_editor_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
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

require_once( get_template_directory() . '/lib/class-theme-register-function.php' );

require_once( get_template_directory() . '/lib/googlefonts.php' );

require_once( get_template_directory() . '/lib/theme-core-style.php' );

