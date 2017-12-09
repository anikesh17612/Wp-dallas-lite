<?php
/**
 * WP Dallas Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Dallas_Lite
 */

if ( ! function_exists( 'wp_dallas_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wp_dallas_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WP Dallas Lite, use a find and replace
		 * to change 'wp_dallas_lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wp_dallas_lite', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wp_dallas_lite' ),
			'menu-2' => esc_html__( 'Top', 'wp_dallas_lite' ),
			'menu-3' => esc_html__( 'Footer', 'wp_dallas_lite' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wp_dallas_lite_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wp_dallas_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_dallas_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_dallas_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_dallas_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_dallas_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wp_dallas_lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wp_dallas_lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Bottom A', 'wp_dallas_lite' ),
		'id'            => 'bottom-a',
		'description'   => esc_html__( 'Add widgets here.', 'wp_dallas_lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'bottom B', 'wp_dallas_lite' ),
		'id'            => 'bottom-b',
		'description'   => esc_html__( 'Add widgets here.', 'wp_dallas_lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Bottom C', 'wp_dallas_lite' ),
		'id'            => 'bottom-c',
		'description'   => esc_html__( 'Add widgets here.', 'wp_dallas_lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Bottom D', 'wp_dallas_lite' ),
		'id'            => 'bottom-d',
		'description'   => esc_html__( 'Add widgets here.', 'wp_dallas_lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wp_dallas_lite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_dallas_lite_scripts() {
	wp_enqueue_style( 'wp_dallas_lite-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wp_dallas_lite-jquerylibrary', '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '20151215', true );
	wp_enqueue_script( 'wp_dallas_lite-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'wp_dallas_lite-loadmore', get_template_directory_uri() . '/assets/js/loadmore.js', array(), '20151215', true );
	$translation_array = array( 'templateUrl' => get_template_directory_uri() ,'adminUrl'=>admin_url(),'body_layout'=>get_theme_mod('body_layout','fullwidth_body_layout'));
	wp_localize_script( 'wp_dallas_lite-loadmore', 'loadmore_params', $translation_array );
	wp_enqueue_style( 'font-family', '//fonts.googleapis.com/css?family='.get_theme_mod('body_google_font').'|'.get_theme_mod('menu_google_font').'|'.get_theme_mod('h1_google_font').'|'.get_theme_mod('h2_google_font').'|'.get_theme_mod('h3_google_font').'|'.get_theme_mod('h4_google_font').'|'.get_theme_mod('h5_google_font').'|'.get_theme_mod('h6_google_font'));
 	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '3.0.0', true );
	wp_enqueue_script( 'wp_dallas_lite-skip-link-focus-fix', get_template_directory_uri() . 'assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_style('personalblog-style',get_stylesheet_uri());//
	wp_add_inline_style( 'personalblog-style', wp_dallas_lite_css_generator() );//
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_dallas_lite_scripts' );

/*  ********************************/
/* REMOVE COLORS OPTION FROM CUSTOMIZER  */
/* ***************************** */
add_action( "customize_register", "wp_dallas_lite_JMD_customize_register" );
function wp_dallas_lite_JMD_customize_register( $wp_customize ) {
 $wp_customize->remove_section("colors");
 $wp_customize->remove_control("blogname");
 $wp_customize->remove_control("blogdescription");
 $wp_customize->remove_control("display_header_text");
}

/** 
* This code Implimented to load more post using ajax ON click load more Button 
*/
function load_posts_by_ajax_callback() {
	if($_POST['wpdal_loadpost'] ==1)
	$paged = $_POST['page'];
	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => '2',
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		?>
		<?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>
			<h2><?php the_title() ?></h2>
			<?php the_excerpt() ?>
		<?php endwhile ?>
		<?php
	endif;

	wp_die();
}
add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');

/*-----------------------------------------------------
 * 				Custom Excerpt Length
 *----------------------------------------------------*/
if(!function_exists('wpdallas_excerpt_max_charlength')):
	/* function wpdallas_excerpt_max_charlength($charlength) {
		$excerpt = get_the_excerpt();
		$charlength++;

		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				return mb_substr( $subex, 0, $excut );
			} else {
				return $subex;
			}

		} else {
			return $excerpt;
		}
	} */
	function wpdallas_excerpt_max_charlength($wordsreturned){
		  $string=get_the_excerpt();
		  $retval = $string;
		  $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $string);
		  $string = str_replace("\n", " ", $string);
		  $array = explode(" ", $string);
		  if (count($array)<=$wordsreturned)
		  {
			$retval = $string;
		  }
		  else
		  {
			array_splice($array, $wordsreturned);
			$retval = implode(" ", $array)." ...";
		  }
		  return $retval;
	}
endif;

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

/**
 * Load Jetpack compatibility file.
  */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* --------------------------------------------*
			Required Plugins	
---------------------------------------------*/

require_once( get_template_directory()  . '/lib/plugin-check.php');


/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

require_once( get_template_directory()  . '/lib/theme-register-function.php'); 
require_once( get_template_directory()  . '/lib/googlefonts.php'); 
require_once( get_template_directory()  . '/lib/theme-core-style.php');
require_once( get_template_directory()  . '/lib/social.php'); 



