<?php
/**
 * Dallas Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dallas Lite
 */

/**
 * Dallas Lite only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}
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
		add_theme_support('custom-logo', array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		));
	}
endif;
add_action( 'after_setup_theme', 'dallaslite_setup' );
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

/*
* Enable support for Post Thumbnails on posts and pages.
*
* @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
*/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 1200, 'auto' );
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
	$translation_array = array(
		'templateUrl' => get_template_directory_uri(),
		'adminUrl' => admin_url(),
		'body_layout' => get_theme_mod( 'body_layout', 'fullwidth_body_layout' ),
	);
	wp_localize_script( 'dallaslite-loadmore', 'loadmore_params', $translation_array );
	wp_enqueue_style( 'font-family', 'https://fonts.googleapis.com/css?family=' . get_theme_mod( 'body_google_font', 'Lato' ) . '|' . get_theme_mod( 'menu_google_font', 'Lato' ) . '|' . get_theme_mod( 'h1_google_font', 'Lato' ) . '|' . get_theme_mod( 'h2_google_font', 'Lato' ) . '|' . get_theme_mod( 'h3_google_font', 'Lato' ) . '|' . get_theme_mod( 'h4_google_font', 'Lato' ) . '|' . get_theme_mod( 'h5_google_font', 'Lato' ) . '|' . get_theme_mod( 'h6_google_font', 'Lato' ) );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css' );
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
 * REMOVE COLORS OPTION FROM CUSTOMIZER
 *
 * @param object $wp_customize wp_customize to print for resource hints.
 */
function dallaslite_override_customize_register( $wp_customize ) {
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_control( 'blogname' );
	$wp_customize->remove_control( 'blogdescription' );
	$wp_customize->remove_control( 'display_header_text' );
}
add_action( 'customize_register', 'dallaslite_override_customize_register' );
	/**
	 * This code Implimented to load more post using ajax ON click load more Button
	 */
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
	if ( get_theme_mod( 'right-to-left' ) == 'true' ) {
		$classes[] = 'rtl';
	}

	if ( get_theme_mod( 'body_layout' ) == 'box_layout' ) {
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
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here.
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
	if ( isset( $_POST ['foo'], $_POST ['foo_nonce'] ) && wp_verify_nonce( sanitize_key( $_POST ['foo_nonce'] ), 'foo_action' ) ) {
		$foo = wp_unslash( sanitize_text_field( $_POST ['foo'] ) );
		$args = json_decode( stripslashes( $_POST ['query'] ), true );
	}
		$args['paged'] = $_POST ['page'] + 1; // we need next page to be loaded.
		$args['post_status'] = 'publish';
	// it is always better to use WP_Query but not here.
	query_posts( $args );
	if ( have_posts() ) :
		// run the loop.
		while ( have_posts() ) : the_post();
			// look into your theme code how the posts are inserted, but you can use your own HTML of course.
			// do you remember? - my example is adapted for Twenty Seventeen theme.
			get_template_part( 'template-parts/content', get_post_format() );
			// for the test purposes comment the line above and uncomment the below one.
			// the_title();.
		endwhile;
	endif;
	die; // here we exit the script and even no wp_reset_query() required!.
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
		$string = get_the_excerpt();
		$retval = $string;
		$string = preg_replace( '/(?<=\S,)(?=\S)/', ' ', $string );
		$string = str_replace( "\n", ' ', $string );
		$array = explode( ' ', $string );
		if ( count( $array ) <= $wordsreturned ) {
			$retval = $string;
		} else {
			$retval = implode( ' ', $array ) . ' ...';
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
/**
 * User Follow social icon
 *
 * Show custom user profile fields
 *
 * @param  object $profileuser A WP_User object
 * @return void
 */
add_action( 'profile_update', 'dallaslite_edit_profile', 10, 2 );
$user_id = get_current_user_id();
/**
 * Edit User Profile data.
 *
 * @param object $user_id varrible for user ID.
 */
function dallaslite_edit_profile( $user_id ) {
	// Do something.
	if ( isset( $_POST ['foo'], $_POST ['foo_nonce'] ) && wp_verify_nonce( sanitize_key( $_POST ['foo_nonce'] ), 'foo_action' ) ) {
		$foo = sanitize_text_field( wp_unslash( $_POST ['foo'] ) );
	}
	if ( current_user_can( 'edit_user',$user_id ) ) {
		global $wpdb;
		$fburl = wp_cache_get( 'mycomments' );
		if ( false == $comments ) {
			$fburl = $wpdb->update(
				'wp_usermeta',
				array(
					'meta_value' => $_POST['fb_url'],
				),
				array(
						'meta_key' => 'fb_url',
						'user_id' => $user_id,
					)
			);
				wp_cache_set( 'mycomments', $fburl );
		}
		$twitterurl = wp_cache_get( 'mycomments' );
		if ( false == $comments ) {
			$fburl = $wpdb->update(
				'wp_usermeta',
				array(
					'meta_value' => $_POST['twitter_url'],
				),
				array(
						'meta_key' => 'twitter_url',
						'user_id' => $user_id,
					)
			);
				wp_cache_set( 'mycomments', $twitterurl );
		}
		$gplusurl = wp_cache_get( 'mycomments' );
		if ( false == $comments ) {
			$gplusurl = $wpdb->update(
				'wp_usermeta',
				array(
					'meta_value' => $_POST['gplus_url'],
				),
				array(
						'meta_key' => 'gplus_url',
						'user_id' => $user_id,
					)
			);
				wp_cache_set( 'mycomments', $gplusrurl );
		}
		$linkedinurl = wp_cache_get( 'mycomments' );
		if ( false == $comments ) {
			$linkedinurl = $wpdb->update(
				'wp_usermeta',
				array(
					'meta_value' => $_POST['linkedin_url'],
				),
				array(
						'meta_key' => 'linkedin_url',
						'user_id' => $user_id,
					)
			);
				wp_cache_set( 'mycomments', $linkedinurl );
		}
		$behanceurl = wp_cache_get( 'mycomments' );
		if ( false == $comments ) {
			$behanceurl = $wpdb->update(
				'wp_usermeta',
				array(
					'meta_value' => $_POST['behance_url'],
				),
				array(
						'meta_key' => 'behance_url',
						'user_id' => $user_id,
					)
			);
				wp_cache_set( 'mycomments', $behanceurl );
		}
		$youtubeurl = wp_cache_get( 'mycomments' );
		if ( false == $comments ) {
			$youtubeurl = $wpdb->update(
				'wp_usermeta',
				array(
					'meta_value' => $_POST['youtube_url'],
				),
				array(
						'meta_key' => 'youtube_url',
						'user_id' => $user_id,
					)
			);
				wp_cache_set( 'mycomments', $youtubeurl );
		}
		$snapchaturl = wp_cache_get( 'mycomments' );
		if ( false == $comments ) {
			$snapchaturl = $wpdb->update(
				'wp_usermeta',
				array(
					'meta_value' => $_POST['snapchat_url'],
				),
				array(
						'meta_key' => 'snapchat_url',
						'user_id' => $user_id,
					)
			);
				wp_cache_set( 'mycomments', $snapchaturl );
		}
		$skypeurl = wp_cache_get( 'mycomments' );
		if ( false == $comments ) {
			$skypeurl = $wpdb->update(
				'wp_usermeta',
				array(
					'meta_value' => $_POST['skype_url'],
				),
				array(
						'meta_key' => 'skype_url',
						'user_id' => $user_id,
					)
			);
				wp_cache_set( 'mycomments', $skypeurl );
		}
		$pinteresturl = wp_cache_get( 'mycomments' );
		if ( false == $comments ) {
			$pinteresturl = $wpdb->update(
				'wp_usermeta',
				array(
					'meta_value' => $_POST['pinterest_url'],
				),
				array(
						'meta_key' => 'pinterest_url',
						'user_id' => $user_id,
					)
			);
				wp_cache_set( 'mycomments', $pinteresturl );
		}
	} // End if().
}
	add_action( 'edit_user_profile_update', 'dallaslite_update_profile_fields' );
/**
 * User ID.
 *
 * @param object $user_id varrible for user ID.
 */
function dallaslite_update_profile_fields( $user_id ) {
	echo 'sid';
	exit;
	if ( isset( $_POST ['foo'], $_POST ['foo_nonce'] ) && wp_verify_nonce( sanitize_key( $_POST ['foo_nonce'] ), 'foo_action' ) ) {
		$foo = sanitize_text_field( wp_unslash( $_POST ['foo'] ) );
		// if ( current_user_can( 'edit_user', $user_id ) )
		if ( isset( $_POST ['fb_url'] ) && ! empty( $_POST ['fb_url'] ) ) { // Input var okay.
			update_user_attribute( $user_id, 'fb_url', esc_url_raw( wp_unslash( $_POST ['fb_url'] ) ) );
		}
		if ( isset( $_POST ['twitter_url'] ) && ! empty( $_POST ['twitter_url'] ) ) { // Input var okay.
			update_user_attribute( $user_id, 'twitter_url', esc_url_raw( wp_unslash( $_POST ['twitter_url'] ) ) );
		}
		if ( isset( $_POST ['gplus_url'] ) && ! empty( $_POST ['gplus_url'] ) ) { // Input var okay.
			update_user_attribute( $user_id, 'gplus_url', esc_url_raw( wp_unslash( $_POST ['gplus_url'] ) ) );
		}
		if ( isset( $_POST ['linkedin_url'] ) && ! empty( $_POST ['linkedin_url'] ) ) { // Input var okay.
			update_user_attribute( $user_id, 'linkedin_url', esc_url_raw( wp_unslash( $_POST ['linkedin_url'] ) ) );
		}
		if ( isset( $_POST ['behance_url'] ) && ! empty( $_POST ['behance_url'] ) ) { // Input var okay.
			update_user_attribute( $user_id, 'behance_url', esc_url_raw( wp_unslash( $_POST ['behance_url'] ) ) );
		}
		if ( isset( $_POST ['youtube_url'] ) && ! empty( $_POST ['youtube_url'] ) ) { // Input var okay.
			update_user_attribute( $user_id, 'youtube_url', esc_url_raw( wp_unslash( $_POST ['youtube_url'] ) ) );
		}
		if ( isset( $_POST ['snapchat_url'] ) && ! empty( $_POST ['snapchat_url'] ) ) { // Input var okay.
			update_user_attribute( $user_id, 'snapchat_url', esc_url_raw( wp_unslash( $_POST ['snapchat_url'] ) ) );
		}
		if ( isset( $_POST ['skype_url'] ) && ! empty( $_POST ['skype_url'] ) ) { // Input var okay.
			update_user_attribute( $user_id, 'skype_url', esc_url_raw( wp_unslash( $_POST ['skype_url'] ) ) );
		}
		if ( isset( $_POST ['pinterest_url'] ) && ! empty( $_POST ['pinterest_url'] ) ) { // Input var okay.
			update_user_attribute( $user_id, 'pinterest_url', esc_url_raw( wp_unslash( $_POST ['pinterest_url'] ) ) );
		}
	}
}

/**
 * Get the user mata data tag.
 *
 * @param object $user_id varrible for user_id.
 * @param string $fieldvalue varrible for get user meta tag varrible.
 */
function dallas_lite_user_data( $user_id, $fieldvalue ) {
	$new_user = get_userdata( $user_id );
	if ( 'first_name' == $fieldvalue ) {
		return $new_user->user_firstname;
	} else if ( 'last_name' == $fieldvalue ) {
		return $new_user->user_lastname;
	} else if ( 'description' == $fieldvalue ) {
		return $new_user->description;
	} else {
		return '';
	}
}

/**
 * Edit User Profile user.
 *
 * @param object $profileuser varrible for profile user.
 */
function dallaslite_user_profile_fields( $profileuser ) {
?>
	<table class="form-table">
		<tr>
			<th>
				<label for="fb_url"><?php esc_html_e( 'Facebook','dallas-lite' ); ?></label>
			</th>
			<td>
				<input type="text" name="fb_url" id="fb_url" value="<?php echo esc_attr( get_the_author_meta( 'fb_url', $profileuser->ID ) ); ?>" class="regular-text" />
				<br /><span class="description"><?php esc_html_e( 'Facebook url.','dallas-lite' ); ?></span>
			</td>
		</tr>
		<tr>
			<th>
				<label for="twitter_url"><?php esc_html_e( 'Twitter url','dallas-lite' ); ?></label>
			</th>
			<td>
				<input type="text" name="twitter_url" id="twitter_url" value="<?php echo esc_attr( get_the_author_meta( 'twitter_url', $profileuser->ID ) ); ?>" class="regular-text" />
				<br /><span class="description"><?php esc_html_e( 'Twitter url.','dallas-lite' ); ?></span>
			</td>
		</tr>
		<tr>
			<th>
				<label for="gplus_url"><?php esc_html_e( 'Google Plus url','dallas-lite' ); ?></label>
			</th>
			<td>
				<input type="text" name="gplus_url" id="gplus_url" value="<?php echo esc_attr( get_the_author_meta( 'gplus_url', $profileuser->ID ) ); ?>" class="regular-text" />
				<br /><span class="description"><?php esc_html_e( 'Google Plus url.','dallas-lite' ); ?></span>
			</td>
		</tr>
		<tr>
			<th>
				<label for="linkedin_url"><?php esc_html_e( 'Linkedin  url','dallas-lite' ); ?></label>
			</th>
			<td>
				<input type="text" name="linkedin_url" id="linkedin_url" value="<?php echo esc_attr( get_the_author_meta( 'linkedin_url', $profileuser->ID ) ); ?>" class="regular-text" />
				<br /><span class="description"><?php esc_html_e( 'Linkedin url.','dallas-lite' ); ?></span>
			</td>
		</tr>
		<tr>
			<th>
				<label for="behance_url"><?php esc_html_e( 'Behance url','dallas-lite' ); ?></label>
			</th>
			<td>
				<input type="text" name="behance_url" id="behance_url" value="<?php echo esc_attr( get_the_author_meta( 'behance_url', $profileuser->ID ) ); ?>" class="regular-text" />
				<br /><span class="description"><?php esc_html_e( 'Behance url.','dallas-lite' ); ?></span>
			</td>
		</tr>
		<tr>
			<th>
				<label for="youtube_url"><?php esc_html_e( 'Youtube url','dallas-lite' ); ?></label>
			</th>
			<td>
				<input type="text" name="youtube_url" id="youtube_url" value="<?php echo esc_attr( get_the_author_meta( 'youtube_url', $profileuser->ID ) ); ?>" class="regular-text" />
				<br /><span class="description"><?php esc_html_e( 'Youtube url.','dallas-lite' ); ?></span>
			</td>
		</tr>
		<tr>
			<th>
				<label for="snapchat_url"><?php esc_html_e( 'Snapchat url','dallas-lite' ); ?></label>
			</th>
			<td>
				<input type="text" name="snapchat_url" id="snapchat_url" value="<?php echo esc_attr( get_the_author_meta( 'snapchat_url', $profileuser->ID ) ); ?>" class="regular-text" />
				<br /><span class="description"><?php esc_html_e( 'Snapchat url.','dallas-lite' ); ?></span>
			</td>
		</tr>
		<tr>
			<th>
				<label for="skype_url"><?php esc_html_e( 'Skype url','dallas-lite' ); ?></label>
			</th>
			<td>
				<input type="text" name="skype_url" id="skype_url" value="<?php echo esc_attr( get_the_author_meta( 'skype_url', $profileuser->ID ) ); ?>" class="regular-text" />
				<br /><span class="description"><?php esc_html_e( 'Skype url.','dallas-lite' ); ?></span>
			</td>
		</tr>
		<tr>
			<th>
				<label for="pinterest_url"><?php esc_html_e( 'Pinterest url','dallas-lite' ); ?></label>
			</th>
			<td>
				<input type="text" name="pinterest_url" id="pinterest_url" value="<?php echo esc_attr( get_the_author_meta( 'pinterest_url', $profileuser->ID ) ); ?>" class="regular-text" />
				<br /><span class="description"><?php esc_html_e( 'Pinterest url.','dallas-lite' ); ?></span>
			</td>
		</tr>
	</table>
<?php
}
add_action( 'show_user_profile', 'dallaslite_user_profile_fields', 10, 1 );
add_action( 'edit_user_profile', 'dallaslite_user_profile_fields', 10, 1 );

/**
 * Registers an editor stylesheet for the theme.
 */
function dallaslite_add_editor_styles() {
	add_editor_style( 'dallaslite-editor-style.css' );
}
add_action( 'admin_init', 'dallaslite_add_editor_styles' );
/**
 * Social Sharing Plugins
 */
require_once( get_template_directory() . '/lib/socialshare.php' );
/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
require_once( get_template_directory() . '/lib/class-theme-register-function.php' );

require_once( get_template_directory() . '/lib/googlefonts.php' );

require_once( get_template_directory() . '/lib/theme-core-style.php' );

require_once( get_template_directory() . '/lib/social.php' );
