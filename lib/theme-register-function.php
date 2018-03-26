<?php
/*-------------------------------------------*
Dallas Lite Option Registration
*------------------------------------------*/
class wp_call_back
{
	function sanitize_call_back($callback)
	{
	}
}
function admin_style()
	{
	wp_enqueue_style('admin-styles', get_template_directory_uri() . '/assets/css/admin-style.css');
	}
add_action('admin_enqueue_scripts', 'admin_style');
add_action('customize_register', 'wp_dallas_option');
function wp_dallas_option($wp_customize)
	{
$callback = new wp_call_back;
	$wp_customize->add_setting('separatorline', array(
		'default' => '',
		'sanitize_callback' => $callback->sanitize_call_back('call_back_separatorline'),
	));
	$wp_customize->add_panel('blog_layout', array(
		'priority' => 20,
		'blog_layout' => '',
		'title' => __('WP Dallas Lite Options', 'dallas-lite') ,
		'description' => __('Set editable text for certain content.', 'dallas-lite') ,
	));
	$wp_customize->add_section('Blog_layout_option', array(
		'title' => __('Site Layout', 'dallas-lite') ,
		'panel' => 'blog_layout',
		'priority' => 10
	));
	$wp_customize->add_setting('body_layout', array(
		'default' => 'fullwidth_body_layout',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	) );
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'fullwidth_layout', array(
		'label' => __('Body Layout', 'dallas-lite') ,
		'section' => 'Blog_layout_option',
		'settings' => 'body_layout',
		'type' => 'select',
		'choices' => array(
			'box_layout' => 'Box Layout',
			'fullwidth_body_layout' => 'Fullwidth Layout',
		) ,
	)));
	$wp_customize->add_setting('blog_layout_selection', array(
		'default' => 'blogright',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	// Add control
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'select_blog_layout', array(
		'label' => __('Select Blog Layout', 'dallas-lite') ,
		'section' => 'Blog_layout_option',
		'settings' => 'blog_layout_selection',
		'type' => 'select',
		'choices' => array(
			'blogleft' => 'Blog Left',
			'blogright' => 'Blog Right',
			'blogfullwidth' => 'Blog Full Width',
		) ,
	)));
	$wp_customize->add_setting('select_blog_single_page_layout', array(
		'default' => 'rightside',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	// Add control
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'select_blog_single_page_layout', array(
		'label' => __('Select Blog Single Plage Layout', 'dallas-lite') ,
		'section' => 'Blog_layout_option',
		'settings' => 'select_blog_single_page_layout',
		'type' => 'select',
		'choices' => array(
			'leftside' => 'Single Width Left Sidebar',
			'rightside' => 'Single Width Right Sidebar',
			'fullwidth' => 'Single Width Full Width',
		) ,
	)));
	$wp_customize->add_setting('select_pagination_layout', array(
		'default' => 'paginumber',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	// Add control
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'select_pagination_layout', array(
		'label' => __('Select Pagination Layout', 'dallas-lite') ,
		'section' => 'Blog_layout_option',
		'settings' => 'select_pagination_layout',
		'type' => 'select',
		'selected' => 'selected',
		'choices' => array(
			'pagiloadmore' => 'Load More',
			'paginumber' => 'Number',
		) ,
	)));

	/*---------All Logo & favicon---------------------  */

	$wp_customize->add_section('logo_favicon_section', array(
		'title' => __('All Logo & Favicon', 'dallas-lite') ,
		'panel' => 'blog_layout',
		'priority' => 10
	));
	$wp_customize->add_setting('allLogoFavicon', array(
		'default' => 'logo-text',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'select_header_style', array(
		'label' => __('Select Header Style', 'dallas-lite') ,
		'section' => 'logo_favicon_section',
		'settings' => 'allLogoFavicon',
		'type' => 'select',
		'choices' => array(
			'logo-image' => 'Logo image',
			'logo-text' => 'Logo text',
		) ,
	)));
	$wp_customize->add_setting('uploadLogo', array(
		'default' => '',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'upload_logo', array(
		'label' => __('Upload Logo', 'dallas-lite') ,
		'section' => 'logo_favicon_section',
		'settings' => 'uploadLogo',
	)));
	$wp_customize->add_setting('siteTitle', array(
		'default' => 'Dallas Lite',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'site_title', array(
		'label' => __('Site Title', 'dallas-lite') ,
		'section' => 'logo_favicon_section',
		'settings' => 'siteTitle',
		'type' => 'text',
		'choices' => array(
			'title_text' => 'JD Dallas Lite',
		) ,
	)));
	$wp_customize->add_setting('tagLine', array(
		'default' => 'Just Another WordPress Site',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tag_line', array(
		'label' => __('Tag Line', 'dallas-lite') ,
		'section' => 'logo_favicon_section',
		'settings' => 'tagLine',
		'type' => 'text',
		'choices' => array(
			'tagline_text' => 'Just Another WordPress Site',
		) ,
	)));
	/*---------Blog Settings---------------------  */
	$wp_customize->add_section('blog_setting', array(
		'title' => __('Blog Settings', 'dallas-lite') ,
		'panel' => 'blog_layout',
		'priority' => 10
	));
	$wp_customize->add_setting('enableExcerpt', array(
		'default' => '1',
		'sanitize_callback' => $callback->sanitize_call_back('enable_blog_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'enable_Excerpt', array(
		'label' => __('Enable Excerpt', 'dallas-lite') ,
		'section' => 'blog_setting',
		'settings' => 'enableExcerpt',
		'type' => 'radio',
		'choices' => array(
			'1' => 'Yes',
			'0' => 'No',
		) ,
	)));
	$wp_customize->add_setting('excerptwordLimit', array(
		'default' => '330',
		'sanitize_callback' => $callback->sanitize_call_back('enable_blog_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'excerpt_word_limit', array(
		'label' => __('Excerpt Word Limit', 'dallas-lite') ,
		'section' => 'blog_setting',
		'settings' => 'excerptwordLimit',
		'type' => 'text',
		'choices' => array(
			'logo_text' => 'Use your Custom logo text',
		) ,
	)));
	$wp_customize->add_setting('enableBlogReadmore', array(
		'default' => '1',
		'sanitize_callback' => $callback->sanitize_call_back('enable_blog_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'enable_blog_readmore', array(
		'label' => __('Enable Blog Readmore', 'dallas-lite') ,
		'section' => 'blog_setting',
		'settings' => 'enableBlogReadmore',
		'type' => 'radio',
		'choices' => array(
			'1' => 'Yes',
			'0' => 'No',
		) ,
	)));
	$wp_customize->add_setting('continueReading', array(
		'default' => 'Read more',
		'sanitize_callback' => $callback->sanitize_call_back('enable_blog_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'continue_reading', array(
		'label' => __('Continue Reading', 'dallas-lite') ,
		'section' => 'blog_setting',
		'settings' => 'continueReading',
		'type' => 'text',
		'choices' => array(
			'continue_reading' => 'Read more',
		) ,
	)));
	/*---------All Logo & favicon---------------------  */
	$wp_customize->add_section('logo_favicon_section', array(
		'title' => __('All Logo & Favicon', 'dallas-lite') ,
		'panel' => 'blog_layout',
		'priority' => 10
	));
	$wp_customize->add_setting('allLogoFavicon', array(
		'default' => 'logo-image',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'select_header_style', array(
		'label' => __('Select Header Style', 'dallas-lite') ,
		'section' => 'logo_favicon_section',
		'settings' => 'allLogoFavicon',
		'type' => 'select',
		'choices' => array(
			'logo-image' => 'Logo image',
			'logo-text' => 'Logo text',
		) ,
	)));
	$wp_customize->add_setting('uploadLogo', array(
		'default' => '',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'upload_logo', array(
		'label' => __('Upload Logo', 'dallas-lite') ,
		'section' => 'logo_favicon_section',
		'settings' => 'uploadLogo',
	)));
	$wp_customize->add_setting('siteTitle', array(
		'default' => 'JD Dallas Lite',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'site_title', array(
		'label' => __('Site Title', 'dallas-lite') ,
		'section' => 'logo_favicon_section',
		'settings' => 'siteTitle',
		'type' => 'text',
		'choices' => array(
			'logo_text' => 'JD Dallas Lite',
		) ,
	)));
	$wp_customize->add_setting('tagLine', array(
		'default' => 'Just Another WordPress Site',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tag_line', array(
		'label' => __('Tag Line', 'dallas-lite') ,
		'section' => 'logo_favicon_section',
		'settings' => 'tagLine',
		'type' => 'text',
		'choices' => array(
			'logo_tagline' => 'Just Another WordPress Site',
		) ,
	)));
	/*---------Blog Settings---------------------  */
	$wp_customize->add_section('blog_setting', array(
		'title' => __('Blog Settings', 'dallas-lite') ,
		'panel' => 'blog_layout',
		'priority' => 10
	));
	$wp_customize->add_setting('enableExcerpt', array(
		'default' => '1',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'enable_Excerpt', array(
		'label' => __('Enable Excerpt', 'dallas-lite') ,
		'section' => 'blog_setting',
		'settings' => 'enableExcerpt',
		'type' => 'radio',
		'choices' => array(
			'1' => 'Yes',
			'0' => 'No',
		) ,
	)));
	$wp_customize->add_setting('excerptwordLimit', array(
		'default' => '330',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'excerpt_word_limit', array(
		'label' => __('Excerpt Word Limit', 'dallas-lite') ,
		'section' => 'blog_setting',
		'settings' => 'excerptwordLimit',
		'type' => 'text',
		'choices' => array(
			'logo_text' => 'Use your Custom logo text',
		) ,
	)));
	$wp_customize->add_setting('enableBlogReadmore', array(
		'default' => '1',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'enable_blog_readmore', array(
		'label' => __('Enable Blog Readmore', 'dallas-lite') ,
		'section' => 'blog_setting',
		'settings' => 'enableBlogReadmore',
		'type' => 'radio',
		'choices' => array(
			'1' => 'Yes',
			'0' => 'No',
		) ,
	)));
	$wp_customize->add_setting('continueReading', array(
		'default' => 'Read more',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'continue_reading', array(
		'label' => __('Continue Reading', 'dallas-lite') ,
		'section' => 'blog_setting',
		'settings' => 'continueReading',
		'type' => 'text',
		'choices' => array(
			'continue_reading' => 'Read more',
		) ,
	)));

	/*---------Layout & Styling---------------------  */

	$wp_customize->add_section('layout_styling', array(
		'title' => __('Layout & Styling', 'dallas-lite') ,
		'panel' => 'blog_layout',
		'priority' => 10
	));
	$wp_customize->add_setting('right-to-left', array(
		'default' => 'false',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'style_rtl', array(
		'label' => __('RTL on template', 'dallas-lite') ,
		'section' => 'layout_styling',
		'settings' => 'right-to-left',
		'type' => 'checkbox'
			)));
	/*  Layout Separator code  */
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'body-separatorline', array(
		'section' => 'layout_styling',
		'settings' => 'separatorline',
		'label' => esc_html__('Body Color Settings', 'dallas-lite') ,
		'type' => 'hidden',
		'class' => 'body_separator',
	)));
	/*  Layout Separator code  */
	$wp_customize->add_setting('body_bg_color', array(
		'default' => '#fff',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_body_background_color', array(
		'label' => __('Body Background Color', 'dallas-lite') ,
		'section' => 'layout_styling',
		'settings' => 'body_bg_color',
	)));
	$wp_customize->add_setting('major_color', array(
		'default' => '#ffc414',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_major_color', array(
		'label' => __('Major Color', 'dallas-lite') ,
		'section' => 'layout_styling',
		'settings' => 'major_color',
	)));
	$wp_customize->add_setting('hover_color', array(
		'default' => '#e6ac00',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_hover_color', array(
		'label' => __('Hover Color', 'dallas-lite') ,
		'section' => 'layout_styling',
		'settings' => 'hover_color',
	)));
	$wp_customize->add_setting('top_header_color', array(
		'default' => '#1a1c28',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_top_header_color', array(
		'label' => __('Top Header Color', 'dallas-lite') ,
		'section' => 'layout_styling',
		'settings' => 'top_header_color',
	)));
	$wp_customize->add_setting('header_color', array(
		'default' => '#222534',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),

	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_header_color', array(
		'label' => __('Header Color', 'dallas-lite') ,
		'section' => 'layout_styling',
		'settings' => 'header_color',
	)));
	/*  Layout Separator code  */
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_separatorline', array(
		'section' => 'layout_styling',
		'settings' => 'separatorline',
		'label' => esc_html__('Footer Background Settings', 'dallas-lite') ,
		'type' => 'hidden',
		'class' => 'layout_separator',
	)));
	/*  Layout Separator code  */
	$wp_customize->add_setting('footer_color', array(
		'default' => '#1A1C28',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bg_color', array(
		'label' => __('Footer Color', 'dallas-lite') ,
		'section' => 'layout_styling',
		'settings' => 'footer_color',
	)));
	$wp_customize->add_setting('copyright_color', array(
		'default' => '#000000',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'copyright_bg_color', array(
		'label' => __('Copyright Color', 'dallas-lite') ,
		'section' => 'layout_styling',
		'settings' => 'copyright_color',
	)));
	/*  Layout Separator code  */
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'separatorline', array(
		'section' => 'layout_styling',
		'settings' => 'separatorline',
		'label' => esc_html__('Button Color Settings', 'dallas-lite') ,
		'type' => 'hidden',
		'class' => 'layout_separator',
	)));
	/*  Layout Separator code  */
	$wp_customize->add_setting('buttonColorSettings ', array(
		'default' => 'Button Color Settings',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'font_size', array(
		'section' => 'layout_styling',
		'settings' => 'buttonColorSettings',
		'label' => esc_html__('Body Font Size', 'dallas-lite') ,
		'type' => 'title',
		'default' => 'Button Color Settings',
	)));
	$wp_customize->add_setting('button_bg_color', array(
		'default' => '#222533',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_background_color', array(
		'label' => __('Background Color', 'dallas-lite') ,
		'section' => 'layout_styling',
		'settings' => 'button_bg_color',
	)));
	$wp_customize->add_setting('button_hover_bg_color', array(
		'default' => '#363b52',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_hover_background_color', array(
		'label' => __('Hover Background Color', 'dallas-lite') ,
		'section' => 'layout_styling',
		'settings' => 'button_hover_bg_color',
	)));
	$wp_customize->add_setting('button_text_color', array(
		'default' => '#fff',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_text_color', array(
		'label' => __('Text Color', 'dallas-lite') ,
		'section' => 'layout_styling',
		'settings' => 'button_text_color',
	)));
	$wp_customize->add_setting('button_hover_text_color', array(
		'default' => '#fff',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_hover_text_color', array(
		'label' => __('Hover Text Color', 'dallas-lite') ,
		'section' => 'layout_styling',
		'settings' => 'button_hover_text_color',
	)));

	/*---------Typography Setting---------------------  */

	$wp_customize->add_section('typographySetting', array(
		'title' => __('Typography Settings', 'dallas-lite') ,
		'panel' => 'blog_layout',
		'priority' => 10
	));
	/*  Layout Separator code  */
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'body-font', array(
		'section' => 'typographySetting',
		'settings' => 'separatorline',
		'label' => esc_html__('Body Font', 'dallas-lite') ,
		'type' => 'hidden',
		'class' => 'layout_separator',
	)));
	/*  Layout Separator code  */
	$wp_customize->add_setting('body_google_font', array(
		'default' => 'Lato',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'google_font', array(
		'section' => 'typographySetting',
		'settings' => 'body_google_font',
		'label' => esc_html__('Body Google Font', 'dallas-lite') ,
		'type' => 'select',
		'default' => 'Lato',
		'choices' => get_google_fonts() ,
		'google_font' => true,
		'google_font_weight' => 'body_font_weight',
		'google_font_weight_default' => '400'
	)));
	$wp_customize->add_setting('body_font_size', array(
		'default' => '16',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'font_size', array(
		'section' => 'typographySetting',
		'settings' => 'body_font_size',
		'label' => esc_html__('Body Font Size', 'dallas-lite') ,
		'type' => 'number',
		'default' => '16',
	)));

	/*  Layout Separator code  */
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'menu-font', array(
		'section' => 'typographySetting',
		'settings' => 'separatorline',
		'label' => esc_html__('Menu Font', 'dallas-lite') ,
		'type' => 'hidden',
		'class' => 'layout_separator',
	)));
	/*  Layout Separator code  */
	$wp_customize->add_setting('menu_google_font', array(
		'default' => 'Lato',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'select_google_font', array(
		'section' => 'typographySetting',
		'settings' => 'menu_google_font',
		'label' => esc_html__('Menu Google Font', 'dallas-lite') ,
		'type' => 'select',
		'default' => 'Lato',
		'choices' => get_google_fonts() ,
		'google_font' => true,
		'google_font_weight' => 'menu_font_weight',
		'google_font_weight_default' => '400'
	)));
	$wp_customize->add_setting('menu_font_size', array(
		'default' => '15',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'menu_font_size', array(
		'section' => 'typographySetting',
		'settings' => 'menu_font_size',
		'label' => esc_html__('Menu Font Size', 'dallas-lite') ,
		'type' => 'number',
		'default' => '15',
	)));

	//--------------- H1 ---------------//

	/*  Layout Separator code  */
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h1-separatorline', array(
		'section' => 'typographySetting',
		'settings' => 'separatorline',
		'label' => esc_html__('Heading1 Font', 'dallas-lite') ,
		'type' => 'hidden',
		'class' => 'layout_separator',
	)));
	/*  Layout Separator code  */
	// H1 Font
	$wp_customize->add_setting('h1_google_font', array(
		'default' => 'Lato',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h1_google_font',
	array(
		'section' => 'typographySetting',
		'settings' => 'h1_google_font',
		'label' => esc_html__('H1 Google Font', 'dallas-lite') ,
		'type' => 'select',
		'default' => 'Lato',
		'choices' => get_google_fonts() ,
		'google_font' => true,
		'google_font_weight' => 'menu_font_weight',
		'google_font_weight_default' => '700'
	)));

	// h1 Font weight
	$wp_customize->add_setting('h1_font_weight', array(
		'default' => '500',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h1_font_weight',
	array(
		'section' => 'typographySetting',
		'settings' => 'h1_font_weight',
		'label' => esc_html__('H1 Font weight', 'dallas-lite') ,
		'type' => 'select',
		'choices' => array(
			'normal' => 'Normal',
			'100' => '100',
			'300' => '300',
			'500' => '500',
			'700' => '700',
			'900' => '900',
	))));

	// H1 Font Size
	$wp_customize->add_setting('h1_font_size', array(
		'default' => '36',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h1_font_size',
	array(
		'section' => 'typographySetting',
		'settings' => 'h1_font_size',
		'label' => esc_html__('H1 Font Size', 'dallas-lite') ,
		'type' => 'number',
		'default' => '36',
	)));

	// h1 line height
	$wp_customize->add_setting('h1_line_height', array(
		'default' => '50',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h1_line_height',
	array(
		'section' => 'typographySetting',
		'settings' => 'h1_line_height',
		'label' => esc_html__('H1 Line Height (in px)', 'dallas-lite') ,
		'type' => 'number',
		'default' => '50',
	)));

	//--------------- H2 ---------------//

	/*  Layout Separator code  */
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h2-separator', array(
		'section' => 'typographySetting',
		'settings' => 'separatorline',
		'label' => esc_html__('Heading2 Font', 'dallas-lite') ,
		'type' => 'hidden',
		'class' => 'layout_separator',
	)));
	/*  Layout Separator code  */
	// h2 Font
	$wp_customize->add_setting('h2_google_font', array(
		'default' => 'Lato',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h2_google_font',
	array(
		'section' => 'typographySetting',
		'settings' => 'h2_google_font',
		'label' => esc_html__('H2 Google Font', 'dallas-lite') ,
		'type' => 'select',
		'default' => 'Lato',
		'choices' => get_google_fonts() ,
		'google_font' => true,
		'google_font_weight' => 'menu_font_weight',
		'google_font_weight_default' => '700'
	)));

	// h2 Font weight
	$wp_customize->add_setting('h2_font_weight', array(
		'default' => '500',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h2_font_weight',
	array(
		'section' => 'typographySetting',
		'settings' => 'h2_font_weight',
		'label' => esc_html__('H2 Font weight', 'dallas-lite') ,
		'type' => 'select',
		'choices' => array(
			'normal' => 'Normal',
			'100' => '100',
			'300' => '300',
			'500' => '500',
			'700' => '700',
			'900' => '900',
	))));

	// h2 Font Size
	$wp_customize->add_setting('h2_font_size', array(
		'default' => '30',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h2_font_size',
	array(
		'section' => 'typographySetting',
		'settings' => 'h2_font_size',
		'label' => esc_html__('H2 Font Size', 'dallas-lite') ,
		'type' => 'number',
		'default' => '30',
	)));

	// H2 line height
	$wp_customize->add_setting('h2_line_height', array(
		'default' => '45',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h2_line_height',
	array(
		'section' => 'typographySetting',
		'settings' => 'h2_line_height',
		'label' => esc_html__('H2 Line Height (in px)', 'dallas-lite') ,
		'type' => 'number',
		'default' => '45',
	)));

	//--------------- H3 ---------------//

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h3-separatorline', array(
		'section' => 'typographySetting',
		'settings' => 'separatorline',
		'label' => esc_html__('Heading3 Font', 'dallas-lite') ,
		'type' => 'hidden',
		'class' => 'layout_separator',
	)));
	/*  Layout Separator code  */
	// h3 Font
	$wp_customize->add_setting('h3_google_font', array(
		'default' => 'Lato',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h3_google_font',
	array(
		'section' => 'typographySetting',
		'settings' => 'h3_google_font',
		'label' => esc_html__('H3 Google Font', 'dallas-lite') ,
		'type' => 'select',
		'default' => 'Lato',
		'choices' => get_google_fonts() ,
		'google_font' => true,
		'google_font_weight' => 'menu_font_weight',
		'google_font_weight_default' => '700'
	)));

	// h3 Font weight
	$wp_customize->add_setting('h3_font_weight', array(
		'default' => '500',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h3_font_weight',
	array(
		'section' => 'typographySetting',
		'settings' => 'h3_font_weight',
		'label' => esc_html__('H3 Font weight', 'dallas-lite') ,
		'type' => 'select',
		'choices' => array(
			'normal' => 'Normal',
			'100' => '100',
			'300' => '300',
			'500' => '500',
			'700' => '700',
			'900' => '900',
	))));

	// h3 Font Size
	$wp_customize->add_setting('h3_font_size', array(
		'default' => '26',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h3_font_size',
	array(
		'section' => 'typographySetting',
		'settings' => 'h3_font_size',
		'label' => esc_html__('H3 Font Size', 'dallas-lite') ,
		'type' => 'number',
		'default' => '26',
	)));

	// H3 line height
	$wp_customize->add_setting('h3_line_height', array(
		'default' => '40',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h3_line_height',
	array(
		'section' => 'typographySetting',
		'settings' => 'h3_line_height',
		'label' => esc_html__('H3 Line Height (in px)', 'dallas-lite') ,
		'type' => 'number',
		'default' => '40',
	)));

	//--------------- H4 ---------------//

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h4-separatorline', array(
		'section' => 'typographySetting',
		'settings' => 'separatorline',
		'label' => esc_html__('Heading4 Font', 'dallas-lite') ,
		'type' => 'hidden',
		'class' => 'layout_separator',
	)));
	/*  Layout Separator code  */
	// h4 Font
	$wp_customize->add_setting('h4_google_font', array(
		'default' => 'Lato',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h4_google_font',
	array(
		'section' => 'typographySetting',
		'settings' => 'h4_google_font',
		'label' => esc_html__('H4 Google Font', 'dallas-lite') ,
		'type' => 'select',
		'default' => 'Lato',
		'choices' => get_google_fonts() ,
		'google_font' => true,
		'google_font_weight' => 'menu_font_weight',
		'google_font_weight_default' => '700'
	)));

	// h4 Font weight
	$wp_customize->add_setting('h4_font_weight', array(
		'default' => '500',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h4_font_weight',
	array(
		'section' => 'typographySetting',
		'settings' => 'h4_font_weight',
		'label' => esc_html__('H4 Font weight', 'dallas-lite') ,
		'type' => 'select',
		'choices' => array(
			'normal' => 'Normal',
			'100' => '100',
			'300' => '300',
			'500' => '500',
			'700' => '700',
			'900' => '900',
	))));

	// h4 Font Size
	$wp_customize->add_setting('h4_font_size', array(
		'default' => '24',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h4_font_size',
	array(
		'section' => 'typographySetting',
		'settings' => 'h4_font_size',
		'label' => esc_html__('H4 Font Size', 'dallas-lite') ,
		'type' => 'number',
		'default' => '24',
	)));

	// H4 line height
	$wp_customize->add_setting('h4_line_height', array(
		'default' => '35',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h4_line_height',
	array(
		'section' => 'typographySetting',
		'settings' => 'h4_line_height',
		'label' => esc_html__('H4 Line Height (in px)', 'dallas-lite') ,
		'type' => 'number',
		'default' => '35',
	)));

	//--------------- H5 ---------------//

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h5-separatorline', array(
		'section' => 'typographySetting',
		'settings' => 'separatorline',
		'label' => esc_html__('Heading5 Font', 'dallas-lite') ,
		'type' => 'hidden',
		'class' => 'layout_separator',
	)));
	/*  Layout Separator code  */
	// h5 Font
	$wp_customize->add_setting('h5_google_font', array(
		'default' => 'Lato',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h5_google_font',
	array(
		'section' => 'typographySetting',
		'settings' => 'h5_google_font',
		'label' => esc_html__('H5 Google Font', 'dallas-lite') ,
		'type' => 'select',
		'default' => 'Lato',
		'choices' => get_google_fonts() ,
		'google_font' => true,
		'google_font_weight' => 'menu_font_weight',
		'google_font_weight_default' => '700'
	)));

	// h5 Font weight
	$wp_customize->add_setting('h5_font_weight', array(
		'default' => '500',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h5_font_weight',
	array(
		'section' => 'typographySetting',
		'settings' => 'h5_font_weight',
		'label' => esc_html__('H5 Font weight', 'dallas-lite') ,
		'type' => 'select',
		'choices' => array(
			'normal' => 'Normal',
			'100' => '100',
			'300' => '300',
			'500' => '500',
			'700' => '700',
			'900' => '900',
	))));

	// h5 Font SIze
	$wp_customize->add_setting('h5_font_size', array(
		'default' => '22',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h5_font_size',
	array(
		'section' => 'typographySetting',
		'settings' => 'h5_font_size',
		'label' => esc_html__('H5 Font Size', 'dallas-lite') ,
		'type' => 'number',
		'default' => '22',
	)));

	// H5 line height
	$wp_customize->add_setting('h5_line_height', array(
		'default' => '30',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h5_line_height',
	array(
		'section' => 'typographySetting',
		'settings' => 'h5_line_height',
		'label' => esc_html__('H5 Line Height (in px)', 'dallas-lite') ,
		'type' => 'number',
		'default' => '30',
	)));

	//--------------- H6 ---------------//

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h2-separatorline', array(
		'section' => 'typographySetting',
		'settings' => 'separatorline',
		'label' => esc_html__('Heading6 Font', 'dallas-lite') ,
		'type' => 'hidden',
		'class' => 'layout_separator',
	)));
	/*  Layout Separator code  */
	// h6 Font
	$wp_customize->add_setting('h6_google_font', array(
		'default' => 'Lato',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h6_google_font',
	array(
		'section' => 'typographySetting',
		'settings' => 'h6_google_font',
		'label' => esc_html__('H6 Google Font', 'dallas-lite') ,
		'type' => 'select',
		'default' => 'Lato',
		'choices' => get_google_fonts() ,
		'google_font' => true,
		'google_font_weight' => 'menu_font_weight',
		'google_font_weight_default' => '700'
	)));

	// h6 Font weight
	$wp_customize->add_setting('h6_font_weight', array(
		'default' => '500',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h6_font_weight',
	array(
		'section' => 'typographySetting',
		'settings' => 'h6_font_weight',
		'label' => esc_html__('H6 Font weight', 'dallas-lite') ,
		'type' => 'select',
		'choices' => array(
			'normal' => 'Normal',
			'100' => '100',
			'300' => '300',
			'500' => '500',
			'700' => '700',
			'900' => '900',
	))));

	// h6 Font Size
	$wp_customize->add_setting('h6_font_size', array(
		'default' => '20',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h6_font_size',
	array(
		'section' => 'typographySetting',
		'settings' => 'h6_font_size',
		'label' => esc_html__('H6 Font Size', 'dallas-lite') ,
		'type' => 'number',
		'default' => '20',
	)));

	// H6 line height
	$wp_customize->add_setting('h6_line_height', array(
		'default' => '25',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'h6_line_height',
	array(
		'section' => 'typographySetting',
		'settings' => 'h6_line_height',
		'label' => esc_html__('H6 Line Height (in px)', 'dallas-lite') ,
		'type' => 'number',
		'default' => '25',
	)));

	/*---------Social Follow Us---------------------  */

	$wp_customize->add_section('socialMedial', array(
		'title' => __('Social Follow Us', 'dallas-lite') ,
		'panel' => 'blog_layout',
		'priority' => 10
	));
	$wp_customize->add_setting('facebooklogo', array(
		'default' => 'https://facebook.com',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'facebook_logo', array(
		'label' => __('Facebook Link', 'dallas-lite') ,
		'section' => 'socialMedial',
		'settings' => 'facebooklogo',
		'type' => 'text',
		'choices' => array(
			'logo_text' => 'Use custom Link',
		) ,
	)));
	$wp_customize->add_setting('twitterlogo', array(
		'default' => 'https://twitter.com/',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'twitter_logo', array(
		'label' => __('Twitter Link', 'dallas-lite') ,
		'section' => 'socialMedial',
		'settings' => 'twitterlogo',
		'type' => 'text',
		'choices' => array(
			'logo_text' => 'Use custom Link',
		) ,
	)));
	$wp_customize->add_setting('googlepluslogo', array(
		'default' => 'https://plus.google.com',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'googleplus_logo', array(
		'label' => __('Google Plus Link', 'dallas-lite') ,
		'section' => 'socialMedial',
		'settings' => 'googlepluslogo',
		'type' => 'text',
		'choices' => array(
			'logo_text' => 'Use custom Link',
		) ,
	)));
	$wp_customize->add_setting('linkedinlogo', array(
		'default' => 'https://in.linkedin.com/',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'linkedin_logo', array(
		'label' => __('LinkedIn Link', 'dallas-lite') ,
		'section' => 'socialMedial',
		'settings' => 'linkedinlogo',
		'type' => 'text',
		'choices' => array(
			'logo_text' => 'Use custom Link',
		) ,
	)));
	$wp_customize->add_setting('behancelogo', array(
		'default' => 'https://www.behance.net/',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'behance_logo', array(
		'label' => __('Behance Link', 'dallas-lite') ,
		'section' => 'socialMedial',
		'settings' => 'behancelogo',
		'type' => 'text',
		'choices' => array(
			'logo_text' => 'Use custom Link',
		) ,
	)));
	$wp_customize->add_setting('youtubelogo', array(
		'default' => 'https://www.youtube.com/',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'youtube_logo', array(
		'label' => __('Youtube Link', 'dallas-lite') ,
		'section' => 'socialMedial',
		'settings' => 'youtubelogo',
		'type' => 'text',
		'choices' => array(
			'logo_text' => 'Use custom Link',
		) ,
	)));
	$wp_customize->add_setting('snapchatlogo', array(
		'default' => 'https://www.snapchat.com/',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'snapchat_logo', array(
		'label' => __('Snapchat Link', 'dallas-lite') ,
		'section' => 'socialMedial',
		'settings' => 'snapchatlogo',
		'type' => 'text',
		'choices' => array(
			'logo_text' => 'Use custom Link',
		) ,
	)));
	$wp_customize->add_setting('skypelogo', array(
		'default' => 'https://login.skype.com/login',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'skype_logo', array(
		'label' => __('Skype Link', 'dallas-lite') ,
		'section' => 'socialMedial',
		'settings' => 'skypelogo',
		'type' => 'text',
		'choices' => array(
			'logo_text' => 'Use custom Link',
		) ,
	)));
	$wp_customize->add_setting('whatsapplogo', array(
		'default' => 'whatsapp://send?text=' .  '&text=Hi',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'whatsapp_logo', array(
		'label' => __('whatsapp Link', 'dallas-lite') ,
		'section' => 'socialMedial',
		'settings' => 'whatsapplogo',
		'type' => 'text',
		'choices' => array(
			'logo_text' => 'Use custom Link',
		) ,
	)));
	$wp_customize->add_setting('pinterestlogo', array(
		'default' => 'https://www.pinterest.com/',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pinterest_logo', array(
		'label' => __('Pinterest Link', 'dallas-lite') ,
		'section' => 'socialMedial',
		'settings' => 'pinterestlogo',
		'type' => 'text',
		'choices' => array(
			'logo_text' => 'Use custom Link',
		) ,
	)));
	$wp_customize->add_setting('customlogo', array(
		'default' => '',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'custom_logo', array(
		'label' => __('Custom Link', 'dallas-lite') ,
		'section' => 'socialMedial',
		'settings' => 'customlogo',
		'type' => 'text',
		'choices' => array(
			'logo_text' => 'Use custom Link',
		) ,
	)));

	/*---------Social Share---------------------  */

	$wp_customize->add_section('socialShare', array(
		'title' => __('Social Share', 'dallas-lite') ,
		'panel' => 'blog_layout',
		'priority' => 10
	));

	// Facebook Share
	$wp_customize->add_setting('facebookshare', array(
		'default' => '1',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'facebook_share', array(
		'label' => __('Enable Facebook Share', 'dallas-lite') ,
		'section' => 'socialShare',
		'settings' => 'facebookshare',
		'type' => 'radio',
		'choices' => array(
			'1' => 'Yes',
			'0' => 'No',
		) ,
	)));

	// Twitter Share
	$wp_customize->add_setting('twittershare', array(
		'default' => '1',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'twitter_share', array(
		'label' => __('Enable Twitter Share', 'dallas-lite') ,
		'section' => 'socialShare',
		'settings' => 'twittershare',
		'type' => 'radio',
		'choices' => array(
			'1' => 'Yes',
			'0' => 'No',
		) ,
	)));

	//LinkedIn Share
	$wp_customize->add_setting('linkedinshare', array(
		'default' => '1',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'linkedin_share', array(
		'label' => __('Enable LinkedIn Share', 'dallas-lite') ,
		'section' => 'socialShare',
		'settings' => 'linkedinshare',
		'type' => 'radio',
		'choices' => array(
			'1' => 'Yes',
			'0' => 'No',
		) ,
	)));

	//Reddit share
	$wp_customize->add_setting('redditshare', array(
		'default' => '1',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'reddit_share', array(
		'label' => __('Enable Reddit share', 'dallas-lite') ,
		'section' => 'socialShare',
		'settings' => 'redditshare',
		'type' => 'radio',
		'choices' => array(
			'1' => 'Yes',
			'0' => 'No',
		) ,
	)));

	//Email share
	$wp_customize->add_setting('emailshare', array(
		'default' => '1',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'email_share', array(
		'label' => __('Enable Email share', 'dallas-lite') ,
		'section' => 'socialShare',
		'settings' => 'emailshare',
		'type' => 'radio',
		'choices' => array(
			'1' => 'Yes',
			'0' => 'No',
		) ,
	)));

	//Google Plus share
	$wp_customize->add_setting('googleplusshare', array(
		'default' => '1',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'google_plus_share', array(
		'label' => __('Enable Google Plus share', 'dallas-lite') ,
		'section' => 'socialShare',
		'settings' => 'googleplusshare',
		'type' => 'radio',
		'choices' => array(
			'1' => 'Yes',
			'0' => 'No',
		) ,
	)));

	//Pinterest share
	$wp_customize->add_setting('pinterestshare', array(
		'default' => '1',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pinterest_share', array(
		'label' => __('Enable Pinterest share', 'dallas-lite') ,
		'section' => 'socialShare',
		'settings' => 'pinterestshare',
		'type' => 'radio',
		'choices' => array(
			'1' => 'Yes',
			'0' => 'No',
		) ,
	)));

	//Delicious share
	$wp_customize->add_setting('deliciousshare', array(
		'default' => '1',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'delicious_share', array(
		'label' => __('Enable Delicious share', 'dallas-lite') ,
		'section' => 'socialShare',
		'settings' => 'deliciousshare',
		'type' => 'radio',
		'choices' => array(
			'1' => 'Yes',
			'0' => 'No',
		) ,
	)));

	//StumbleUpon share
	$wp_customize->add_setting('stumbleuponshare', array(
		'default' => '1',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'stumbleupon_share', array(
		'label' => __('Enable StumbleUpon share', 'dallas-lite') ,
		'section' => 'socialShare',
		'settings' => 'stumbleuponshare',
		'type' => 'radio',
		'choices' => array(
			'1' => 'Yes',
			'0' => 'No',
		) ,
	)));

	/*---------404 Error---------------------  */

	$wp_customize->add_section('error', array(
		'title' => __('404 Error', 'dallas-lite') ,
		'panel' => 'blog_layout',
		'priority' => 10
	));
	$wp_customize->add_setting('404pageTitle', array(
		'default' => 'Page Not Found - Lost Maybe?.',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'page_title', array(
		'label' => __('404 Page Title', 'dallas-lite') ,
		'section' => 'error',
		'settings' => '404pageTitle',
		'type' => 'text',
		'choices' => array(
			'error_page_title' => '404 Page Title',
		) ,
	)));
	$wp_customize->add_setting('404pageDescription', array(
		'default' => 'The page you are looking for was moved, removed, renamed or might never existed..',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'page_description', array(
		'label' => __('404 Page Description', 'dallas-lite') ,
		'section' => 'error',
		'settings' => '404pageDescription',
		'type' => 'textarea',
		'choices' => array(
			'textarea_rows' => 5,
		) ,
	)));
	$wp_customize->add_setting('404buttonText', array(
		'default' => 'Go Back Home',
		'sanitize_callback' => $callback->sanitize_call_back('enable_dallas_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'button_text', array(
		'label' => __('404 Button Text', 'dallas-lite') ,
		'section' => 'error',
		'settings' => '404buttonText',
		'type' => 'text'
	)));

	/*---------Footer Option---------------------  */

	$wp_customize->add_section('footer_section', array(
		'title' => __('Footer Settings', 'dallas-lite') ,
		'panel' => 'blog_layout',
		'priority' => 10
	));
	$wp_customize->add_setting('enable_copyright_text', array(
		'default' => '1',
		'sanitize_callback' => $callback->sanitize_call_back('enable_footer_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'enable_copyright_text', array(
		'label' => __('Enable Copyright Text', 'dallas-lite'),
		'section' => 'footer_section',
		'settings' => 'enable_copyright_text',
		'type' => 'radio',
		'choices' => array(
			'1' => 'Yes',
			'0' => 'No',
		) ,
	)));
	$wp_customize->add_setting('copyright_text', array(
		'default' => 'Copyright 2018 dallas-lite. All Right Reserved. Created by JoomDev',
		'sanitize_callback' => $callback->sanitize_call_back('enable_copyright_text_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'copyright_text', array(
		'label' => __('Copyright Text', 'dallas-lite'),
		'section' => 'footer_section',
		'settings' => 'copyright_text',
		'type' => 'textarea',
		array(
			'textarea_rows' => 5,
		) ,
	)));
	$wp_customize->add_setting('backToTop', array(
		'default' => '1',
		'sanitize_callback' => $callback->sanitize_call_back('enable_backtotop_call'),
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'back_to_top', array(
		'label' => __('Back To Top', 'dallas-lite') ,
		'section' => 'footer_section',
		'settings' => 'backToTop',
		'type' => 'radio',
		'choices' => array(
			'1' => 'Yes',
			'0' => 'No',
		) ,
	)));

	}

?>
