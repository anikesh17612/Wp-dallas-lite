<?php 
/**
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Dallas_Lite
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
if(!function_exists('wp_dallas_lite_css_generator')){
    function wp_dallas_lite_css_generator(){
	
        $output = '';
		//$output.= '@import url(//fonts.googleapis.com/css?family=Tangerine)';



        /* ******************************************************
        **********  Theme Options for Color settings   **********
        *********************************************************/
            $major_color = get_theme_mod( 'major_color', '#00aeef' );
            if($major_color){
                $output .= 'a,.bottom-widget .contact-info i,.bottom-widget .widget ul li a:hover, .latest-blog-content .latest-post-button:hover,.meta-category a:hover,.common-menu-wrap .nav>li>a:hover,.common-menu-wrap .nav>li.active>a,
                .common-menu-wrap .nav>li.menu-item-has-children.active > a:after,.common-menu-wrap .nav>li.menu-item-has-children > a:hover:after,
                .entry-header .entry-title a:hover,.blog-post-meta li a:hover,.entry-content .wrap-btn-style a.btn-style:hover,
                .widget-blog-posts-section .entry-title  a:hover,.widget ul li a:hover,.footer-copyright ul li a:hover, .themeum-pagination ul li:first-child a:hover, .themeum-pagination ul li:last-child a:hover, .single-related-posts .common-post-item-intro a:hover{ color: '. esc_attr($major_color) .'; }';
            }

            if($major_color){
                $output .= '.bg-contact input[type=text]:focus,input:focus, textarea:focus, keygen:focus, select:focus{ border-color: '. esc_attr($major_color) .'; }';
            }
            if($major_color){
                $output .= '.style-title,.comments-title,.comment-reply-title{ border-left :  4px solid '. esc_attr($major_color) .'; }';
            }

            if($major_color){
                $output .= '.themeum-latest-post-content .entry-title a:hover,.common-menu-wrap .nav>li.current>a,
                .header-solid .common-menu-wrap .nav>li.current>a,.portfolio-filter .btn-link.active,.portfolio-filter li a:hover,.latest-review-single-layout2 .latest-post-title a:hover, .blog-arrows a:hover{ color: '. esc_attr($major_color) .'; }';
            }

            if($major_color){
                $output .= '.team-content4,.portfolio-filter li a:before, .classic-slider .owl-dots .active>span, .widget .tagcloud a:hover, .themeum-pagination li span.page-numbers:hover, .themeum-pagination li a.page-numbers:hover,.themeum-pagination li span.page-numbers.current{ background: '. esc_attr($major_color) .'; }';
            }


            if($major_color){
                $output .= '.themeum-pagination li span.page-numbers.current{border-color: '. esc_attr($major_color) .'; }';
            }

            // .select2-container .select2-dropdown .select2-results ul li


            $hover_color = get_theme_mod( 'hover_color', '#0088e2' );
            if( $hover_color ){
                $output .= 'a:hover, .post-content-wrapper-controller:hover, .post-content-wrapper-controller .fa.pull-left:hover, .post-content-wrapper-controller .fa.pull-right:hover , .widget.widget_rss ul li a,.social-share a:hover{ color: '.esc_attr( $hover_color ) .'; }';
                $output .= '.error-page-inner a.btn.btn-primary.btn-lg:hover,.btn.btn-primary:hover,input[type=button]:hover{ background-color: '.esc_attr( $hover_color ) .'; }';
                $output .= '.woocommerce a.button:hover{ border-color: '.esc_attr( $hover_color ) .'; }';
            }


        /* ************************************************************
        **********  Quick Style for headings and Google font **********
        ****************************************************************/

        $bstyle = $mstyle = $h1style = $h2style = $h3style = $h4style = $h5style = '';
        //Body
        if ( get_theme_mod( 'body_font_size', '18' ) ) {
            $bstyle .= 'font-size:'.get_theme_mod( 'body_font_size', '18' ).'px;';
        }
        if ( get_theme_mod( 'body_google_font') ) {
            $bstyle .= 'font-family:"'.get_theme_mod( 'body_google_font').'"';
        }

        //Menu
        $mstyle = '';
        if ( get_theme_mod( 'menu_font_size', '14' ) ) {
            $mstyle .= 'font-size:'.get_theme_mod( 'menu_font_size', '14' ).'px;';
        }
        if ( get_theme_mod( 'menu_google_font', 'Roboto Slab' ) ) {
            $mstyle .= 'font-family:'.get_theme_mod( 'menu_google_font', 'Roboto Slab' ).';';
        }

        //Heading 1
        $h1style = '';
        if ( get_theme_mod( 'h1_font_size', '42' ) ) {
            $h1style .= 'font-size:'.get_theme_mod( 'h1_font_size', '42' ).'px;';
        }
        if ( get_theme_mod( 'h1_google_font', 'Roboto Slab' ) ) {
            $h1style .= 'font-family:'.get_theme_mod( 'h1_google_font', 'Roboto Slab' ).';';
        }

        //Heading 2
        $h2style = '';
        if ( get_theme_mod( 'h2_font_size', '32' ) ) {
            $h2style .= 'font-size:'.get_theme_mod( 'h2_font_size', '32' ).'px';
        }
        if ( get_theme_mod( 'h2_google_font', 'Roboto Slab' ) ) {
            $h2style .= 'font-family:'.get_theme_mod( 'h2_google_font', 'Roboto Slab' ).';';
        }
        //Heading 3
        $h3style = '';
        if ( get_theme_mod( 'h3_font_size', '28' ) ) {
            $h3style .= 'font-size:'.get_theme_mod( 'h3_font_size', '28' ).'px;';
        }
        if ( get_theme_mod( 'h3_google_font', 'Roboto Slab' ) ) {
            $h3style .= 'font-family:'.get_theme_mod( 'h3_google_font', 'Roboto Slab' ).';';
        }

        //Heading 4
        $h4style = '';
        if ( get_theme_mod( 'h4_font_size', '22' ) ) {
            $h4style .= 'font-size:'.get_theme_mod( 'h4_font_size', '22' ).'px;';
        }
        if ( get_theme_mod( 'h4_google_font', 'Roboto Slab' ) ) {
            $h4style .= 'font-family:'.get_theme_mod( 'h4_google_font', 'Roboto Slab' ).';';
        }

        //Heading 5
        $h5style = '';
        if ( get_theme_mod( 'h5_font_size', '18' ) ) {
            $h5style .= 'font-size:'.get_theme_mod( 'h5_font_size', '18' ).'px;';
        }
        if ( get_theme_mod( 'h5_google_font', 'Roboto Slab' ) ) {
            $h5style .= 'font-family:'.get_theme_mod( 'h5_google_font', 'Roboto Slab' ).';';
        }
		
		//Heading 6
        $h5style = '';
        if ( get_theme_mod( 'h6_font_size', '16' ) ) {
            $h5style .= 'font-size:'.get_theme_mod( 'h6_font_size', '16' ).'px;';
        }
        if ( get_theme_mod( 'h6_google_font', 'Roboto Slab' ) ) {
            $h5style .= 'font-family:'.get_theme_mod( 'h6_google_font', 'Roboto Slab' ).';';
        }


        $output .= 'body{'.$bstyle.'}';
        $output .= '.common-menu-wrap .nav>li>a{'.$mstyle.'}';
        $output .= 'h1{'.$h1style.'}';
        $output .= 'h2{'.$h2style.'}';
        $output .= 'h3{'.$h3style.'}';
        $output .= 'h4{'.$h4style.'}';
        $output .= 'h5{'.$h5style.'}';
		$output .= 'h6{'.$h6style.'}';

        $output .= '.site-header{ background-color: '.esc_attr( get_theme_mod( 'header_color', '#fff' ) ) .'; }';
        $output .= 'body{ background-color: '.esc_attr( get_theme_mod( 'body_bg_color', '#fff' ) ) .'; }';
		$output .= '.site_top_header{ background-color: '.esc_attr( get_theme_mod( 'top_header_color', '#666' ) ) .'; }';
		$output .= '.site_footer{ background-color: '.esc_attr( get_theme_mod( 'footer_color', '#666' ) ) .'; }';

        // Button color setting...

        $output .= '.mc4wp-form-fields input[type=submit], .demo-four .mc4wp-form-fields input[type=submit], .common-menu-wrap .nav>li.online-booking-button a, .error-page-inner a.btn.btn-primary.btn-lg,.btn.btn-primary, .package-list-button, 
        .contact-submit input[type=submit],.form-submit input[type=submit]{ background-color: '.esc_attr( get_theme_mod( 'button_bg_color', '#32aad6' ) ) .'; border-color: '.esc_attr( get_theme_mod( 'button_bg_color', '#32aad6' ) ) .'; color: '.esc_attr( get_theme_mod( 'button_text_color', '#fff' ) ) .' !important; border-radius: 4px; }';
        

        if ( get_theme_mod( 'button_hover_bg_color', '#00aeef' ) ) {
            $output .= '.mc4wp-form-fields input[type=submit]:hover, .demo-four .mc4wp-form-fields input[type=submit]:hover, .common-menu-wrap .nav>li.online-booking-button a:hover, .error-page-inner a.btn.btn-primary.btn-lg:hover,.btn.btn-primary:hover, .package-list-button:hover, .contact-submit input[type=submit]:hover,.form-submit input[type=submit]:hover{ background-color: '.esc_attr( get_theme_mod( 'button_hover_bg_color', '#00aeef' ) ) .'; border-color: '.esc_attr( get_theme_mod( 'button_hover_bg_color', '#00aeef' ) ) .'; color: '.esc_attr( get_theme_mod( 'button_hover_text_color', '#fff' ) ) .' !important; }';
        }


        $output .= '.subtitle-cover:before{background:'.get_theme_mod( 'sub_header_overlayer_color', 'rgba(0, 0, 0, 0.5)' ).';}';

        $output .= '.subtitle-cover{padding:100px 0; margin-bottom: 100px;}';

        $output .= "body.error404,body.page-template-404{
            width: 100%;
            height: 100%;
            min-height: 100%;
        }";

        return $output;
    }
}

