<?php
/*-------------------------------------------*
    Dallas Option Registration
 *------------------------------------------*/
 
add_action('customize_register','wp_dallas_option'); 
function wp_dallas_option($wp_customize){
	
	$wp_customize->add_panel( 'blog_layout', array(
		'priority'       => 500,
		'blog_layout' => '',
		'title'          => __( 'Wp Dallas Lite Option', 'wp_dallas_lite' ),
		'description'    => __( 'Set editable text for certain content.', 'wp_dallas_lite' ),
	) );
	$wp_customize->add_section( 'Blog_layout_option' , array(
		'title'    => __('Home Layout','wp_dallas_lite'),
		'panel'    => 'blog_layout',
		'priority' => 10
	) );
	
	$wp_customize->add_setting( 'blog_layout_selection', array(
		 'default'           => __( 'Select Blog Layout', 'wp_dallas_lite' )		 
	) );
	$wp_customize->add_setting( 'select_blog_single_page_layout', array(
		 'default'           => __( 'Select Single Page Layout', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_setting( 'select_pagination_layout', array(
		 'default'           => __( 'Select Pagination Layout', 'wp_dallas_lite' )		 
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'select_blog_layout',
		    array(
		        'label'    => __( 'Select Blog Layout', 'wp_dallas_lite' ),
		        'section'  => 'Blog_layout_option',
		        'settings' => 'blog_layout_selection',
				'type'=> 'select',
		        'choices' =>
				array(
				'blogleft' => 'Blog Left',
				'blogright' => 'Blog Right',
				'blogfullwidth' => 'Blog Full Width',
		  ),
	   )));
	   // Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'select_blog_single_page_layout',
		    array(
		        'label'    => __( 'Select Blog Single Plage Layout', 'wp_dallas_lite' ),
		        'section'  => 'Blog_layout_option',
		        'settings' => 'select_blog_single_page_layout',
				'type'=> 'select',
		        'choices' =>
				array(
				'leftside' => 'Single With Left Sidebar',
				'rightside' => 'Single With Right Sidebar',
				'fullwidth' => 'Single With Full Width',
		  ),
	   )));
	   // Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'select_pagination_layout',
		    array(
		        'label'    => __( 'Select Pagination Layout', 'wp_dallas_lite' ),
		        'section'  => 'Blog_layout_option',
		        'settings' => 'select_pagination_layout',
				'type'=> 'select',
				'selected' => 'selected',
		        'choices' =>
				array(
				'paginumber' => 'Number',
				'pagiloadmore' => 'Load More',				
		  ),
	   )));
	
	/*---------Footer Option---------------------  */
	$wp_customize->add_section( 'footer_section' , array(
		'title'    => __('Footer Setting','wp_dallas_lite'),
		'panel'    => 'blog_layout',
		'priority' => 10
	) );	
	
	$wp_customize->add_setting( 'enableCopyrightText', array(
		 'default'           => __( 'Enable Copyright Text', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'enable_copyright_text',
		    array(
		        'label'    => __( 'Enable Copyright Text', 'wp_dallas_lite' ),
		        'section'  => 'footer_section',
		        'settings' => 'enableCopyrightText',
				'type'=> 'radio',
		        'choices' =>
				array(
				'1' => 'Yes',
				'0' => 'No',				
		),
	)));
	
	$wp_customize->add_setting( 'copyrightText', array(
		 'default'           => __( 'Copyright Text', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'copyright_text',
		    array(
		        'label'    => __( 'Copyright Text', 'wp_dallas_lite' ),
		        'section'  => 'footer_section',
		        'settings' => 'copyrightText',
				'type'=> 'textarea',
		        'choices' =>
				array(
				'textarea_rows' => 5,				
		  ),
	   )));
	   
	/*---------All Logo & favicon---------------------  */
	
	$wp_customize->add_section( 'logo_favicon_section' , array(
		'title'    => __('All Logo & favicon','wp_dallas_lite'),
		'panel'    => 'blog_layout',
		'priority' => 10
	) );
	
	$wp_customize->add_setting( 'allLogoFavicon', array(
		 'default'           => __( 'Select Header Style', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'select_header_style',
		    array(
		        'label'    => __( 'Select Header Style', 'wp_dallas_lite' ),
		        'section'  => 'logo_favicon_section',
		        'settings' => 'allLogoFavicon',
				'type'=> 'select',
		        'choices' =>
				array(
				'logo-image' => 'Logo image',
				'logo-text' => 'Logo text',			
		  ),
	   )));
	
	$wp_customize->add_setting( 'uploadLogo', array(
		 'default'           => __( 'Upload Logo', 'wp_dallas_lite' )		 
	) );

		$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'upload_logo',array(
		 'label'      => __('Upload Logo', 'wp_dallas_lite'),
		 'section'    => 'logo_favicon_section',
		 'settings'   => 'uploadLogo',
		 )));
	
	$wp_customize->add_setting( 'customLogoText', array(
		 'default'           => __( 'Use your Custom logo text', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'custom_logo_text',
		    array(
		        'label'    => __( 'Use your Custom logo text', 'wp_dallas_lite' ),
		        'section'  => 'logo_favicon_section',
		        'settings' => 'customLogoText',
				'type'=> 'text',
		        'choices' =>
				array(
				'logo_text' => 'Use your Custom logo text',
				'logo-text' => 'Logo text',			
		  ),
	)));
	
	/*---------blog Setting---------------------  */
	
	$wp_customize->add_section( 'blog_setting' , array(
		'title'    => __('Blog Setting','wp_dallas_lite'),
		'panel'    => 'blog_layout',
		'priority' => 10
	) );
	
	$wp_customize->add_setting( 'enableExcerpt', array(
		 'default'           => __( 'Enable Excerpt', 'wp_dallas_lite' )		 
	) );
	
		$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'enable_Excerpt',
		    array(
		        'label'    => __( 'Enable Excerpt', 'wp_dallas_lite' ),
		        'section'  => 'blog_setting',
		        'settings' => 'enableExcerpt',
				'type'=> 'radio',
		        'choices' =>
				array(
				'1' => 'Yes',
				'0' => 'No',				
		),
	)));
	
	$wp_customize->add_setting( 'excerptCharacterLimit', array(
		 'default'           => __( 'Excerpt character Limit', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'excerpt_character_limit',
		    array(
		        'label'    => __( 'Excerpt character Limit', 'wp_dallas_lite' ),
		        'section'  => 'blog_setting',
		        'settings' => 'excerptCharacterLimit',
				'type'=> 'text',
		        'choices' =>
				array(
				'logo_text' => 'Use your Custom logo text',		
		  ),
	)));
	
	$wp_customize->add_setting( 'enableBlogReadmore', array(
		 'default'           => __( 'Enable Blog Readmore', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize,
	'enable_blog_readmore',
		    array(
		        'label'    => __( 'Enable Blog Readmore', 'wp_dallas_lite' ),
		        'section'  => 'blog_setting',
		        'settings' => 'enableBlogReadmore',
				'type'=> 'radio',
		        'choices' =>
				array(
				'1' => 'Yes',
				'0' => 'No',				
		),
	)));
	
	$wp_customize->add_setting( 'continueReading', array(
		 'default'           => __( 'Continue Reading', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'continue_reading',
		    array(
		        'label'    => __( 'Continue Reading', 'wp_dallas_lite' ),
		        'section'  => 'blog_setting',
		        'settings' => 'continueReading',
				'type'=> 'text',
		        'choices' =>
				array(
				'continue_reading' => 'Read more',		
		  ),
	)));
	
	/*---------404 Error---------------------  */
	$wp_customize->add_section( 'error' , array(
		'title'    => __('404 Error','wp_dallas_lite'),
		'panel'    => 'blog_layout',
		'priority' => 10
	) );
	
	$wp_customize->add_setting( 'pageBackgroundImage', array(
		 'default'           => __( 'Upload 404 Page Background Image', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'page_background_image',array(
		 'label'      => __('No image selected', 'wp_dallas_lite'),
		 'section'    => 'error',
		 'settings'   => 'pageBackgroundImage',
	)));
	
	$wp_customize->add_setting( 'pageLogoImage', array(
		 'default'           => __( 'No image selected', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'page_Logo_image',array(
		 'label'      => __('Upload 404 Page logo Image', 'wp_dallas_lite'),
		 'section'    => 'error',
		 'settings'   => 'pageLogoImage',
		 )));
	
	$wp_customize->add_setting( '404pageTitle', array(
		 'default'           => __( 'Page Not Found - Lost Maybe?.', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'page_title',
		    array(
		        'label'    => __( '404 Page Title', 'wp_dallas_lite' ),
		        'section'  => 'error',
		        'settings' => '404pageTitle',
				'type'=> 'text',
		        'choices' =>
				array(
				'error_page_title' => '404 Page Title',		
		  ),
	)));
	
	$wp_customize->add_setting( '404pageDescription', array(
		 'default'           => __( 'The page you are looking for was moved, removed, renamed or might never existed..', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'page_description',
		    array(
		        'label'    => __( '404 Page Description', 'wp_dallas_lite' ),
		        'section'  => 'error',
		        'settings' => '404pageDescription',
				'type'=> 'textarea',
		        'choices' =>
				array(	
				'textarea_rows' => 5,				
		  ),
	   )));
	   
	$wp_customize->add_setting( '404buttonText', array(
		 'default'           => __( 'Go Back Home', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'button_text',
		    array(
		        'label'    => __( '404 Page Title', 'wp_dallas_lite' ),
		        'section'  => 'error',
		        'settings' => '404buttonText',
				'type'=> 'text',
		        'choices' =>
				array(
				'error_button_text' => '404 Button Text',		
		  ),
	)));
	
	/*---------Layout & Styling---------------------  */
	
	$wp_customize->add_section( 'layout_styling' , array(
		'title'    => __('Layout & Styling','wp_dallas_lite'),
		'panel'    => 'blog_layout',
		'priority' => 10
	) );
	
	$wp_customize->add_setting( 'bodyHeaderColor', array(
		 'default'           => __( 'Body Background Color', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'link_header_color', array(
		'label'      => __( 'Header Color', 'wp_dallas_lite' ),
		'section'    => 'layout_styling',
		'settings'   => 'bodyHeaderColor',
	) ) );
	
	$wp_customize->add_setting( 'bodyBackgroundColor', array(
		 'default'           => __( 'Body Background Color', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'link_body_background_color', array(
		'label'      => __( 'Body Background Color', 'wp_dallas_lite' ),
		'section'    => 'layout_styling',
		'settings'   => 'bodyBackgroundColor',
	) ) );
	
	$wp_customize->add_setting( 'majorColor', array(
		 'default'           => __( 'Major Color', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'link_major_color', array(
		'label'      => __( 'Major Color', 'wp_dallas_lite' ),
		'section'    => 'layout_styling',
		'settings'   => 'majorColor',
	) ) );
	
	$wp_customize->add_setting( 'hoverColor', array(
		 'default'           => __( 'Hover Color', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'link_hover_color', array(
		'label'      => __( 'Hover Color', 'wp_dallas_lite' ),
		'section'    => 'layout_styling',
		'settings'   => 'hoverColor',
	) ) );
	
	
	
	$wp_customize->add_setting( 'backgroundColor', array(
		 'default'           => __( 'Background Color', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'link_background_color', array(
		'label'      => __( 'Background Color', 'wp_dallas_lite' ),
		'section'    => 'layout_styling',
		'settings'   => 'backgroundColor',
	) ) );
	
	
	$wp_customize->add_setting( 'hoverBackgroundColor', array(
		 'default'           => __( 'Hover Background Color', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'link_hover_background_color', array(
		'label'      => __( 'Hover Background Color', 'wp_dallas_lite' ),
		'section'    => 'layout_styling',
		'settings'   => 'hoverBackgroundColor',
	) ) );
	
	$wp_customize->add_setting( 'textColor', array(
		 'default'           => __( 'Text Color', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'link_text_color', array(
		'label'      => __( 'Text Color', 'wp_dallas_lite' ),
		'section'    => 'layout_styling',
		'settings'   => 'textColor',
	) ) );
	
	$wp_customize->add_setting( 'hoverTextColor', array(
		 'default'           => __( 'Hover Text Color', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'link_hover_text_color', array(
		'label'      => __( 'Hover Text Color', 'wp_dallas_lite' ),
		'section'    => 'layout_styling',
		'settings'   => 'hoverTextColor',
	) ) );
	
	
}



	
?>