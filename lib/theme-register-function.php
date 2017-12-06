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
		 'default'           => 'blogleft'
	) );
	$wp_customize->add_setting( 'select_blog_single_page_layout', array(
		 'default'           => 'leftside' 
	) );
	
	$wp_customize->add_setting( 'select_pagination_layout', array(
		 'default'           => 'pagiloadmore'	 
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
				'leftside' => 'Single Width Left Sidebar',
				'rightside' => 'Single Width Right Sidebar',
				'fullwidth' => 'Single Width Full Width',
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
		'title'    => __('Footer Settings','wp_dallas_lite'),
		'panel'    => 'blog_layout',
		'priority' => 10
	) );	
	
	$wp_customize->add_setting( 'enableCopyrightText', array(
		 'default'           => '1'
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
		 'default'           => 'logo-image'	 
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
		 'default'           => 'assets/images/logo.png'		 
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
	
	/*---------blog Settings---------------------  */
	
	$wp_customize->add_section( 'blog_setting' , array(
		'title'    => __('Blog Settings','wp_dallas_lite'),
		'panel'    => 'blog_layout',
		'priority' => 10
	) );
	
	$wp_customize->add_setting( 'enableExcerpt', array(
		 'default'           => '1'	 
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
		 'default'           => '330' 
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
		 'default'           => '1' 
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
		 'default'           => 'continue_reading' 
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
		 'default'           => ''		 
	) );
	
	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'page_background_image',array(
		 'label'      => __('No image selected', 'wp_dallas_lite'),
		 'section'    => 'error',
		 'settings'   => 'pageBackgroundImage',
	)));
	
	$wp_customize->add_setting( 'pageLogoImage', array(
		 'default'           => '' 
	) );
	
	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'page_Logo_image',array(
		 'label'      => __('Upload 404 Page logo Image', 'wp_dallas_lite'),
		 'section'    => 'error',
		 'settings'   => 'pageLogoImage',
		 )));
	
	$wp_customize->add_setting( '404pageTitle', array(
		 'default'           => 'Page Not Found - Lost Maybe?.' 
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
		 'default'           => 'The page you are looking for was moved, removed, renamed or might never existed..'	 
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
		 'default'           => 'Go Back Home'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'button_text',
		    array(
		        'label'    => __( '404 Button Text', 'wp_dallas_lite' ),
		        'section'  => 'error',
		        'settings' => '404buttonText',
				'type'=> 'text'
		        
		  )
	));
	
	/*---------Layout & Styling---------------------  */
	
	$wp_customize->add_section( 'layout_styling' , array(
		'title'    => __('Layout & Styling','wp_dallas_lite'),
		'panel'    => 'blog_layout',
		'priority' => 10
	) );
	
	$wp_customize->add_setting( 'sub_header_overlayer_color', array(
		 'default'           => '#fff'
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'link_header_color', array(
		'label'      => __( 'Header Color', 'wp_dallas_lite' ),
		'section'    => 'layout_styling',
		'settings'   => 'sub_header_overlayer_color',
	) ) );
	
	$wp_customize->add_setting( 'body_bg_color', array(
		 'default'           => '#fff'
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'link_body_background_color', array(
		'label'      => __( 'Body Background Color', 'wp_dallas_lite' ),
		'section'    => 'layout_styling',
		'settings'   => 'body_bg_color',
	) ) );
	
	$wp_customize->add_setting( 'major_color', array(
		 'default'           => '#00aeef'
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'link_major_color', array(
		'label'      => __( 'Major Color', 'wp_dallas_lite' ),
		'section'    => 'layout_styling',
		'settings'   => 'major_color',
	) ) );
	
	$wp_customize->add_setting( 'hover_color', array(
		 'default'           => '#00a2e8' 
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'link_hover_color', array(
		'label'      => __( 'Hover Color', 'wp_dallas_lite' ),
		'section'    => 'layout_styling',
		'settings'   => 'hover_color',
	) ) );
	
	
	
	
	$wp_customize->add_setting( 'buttonColorSettings ', array(
		 'default'           => 'Button Color Settings' 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'font_size',
		array(
					'section' =>'layout_styling',
					'settings' => 'buttonColorSettings',
					'label'    => esc_html__( 'Body Font Size', 'personalblog' ),
					'type'     => 'title',
					'default'  => 'Button Color Settings',
				)
	));
	
	
	
	$wp_customize->add_setting( 'button_bg_color', array(
		 'default'           => '#32aad6'
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'link_background_color', array(
		'label'      => __( 'Background Color', 'wp_dallas_lite' ),
		'section'    => 'layout_styling',
		'settings'   => 'button_bg_color',
	) ) );
	
	
	$wp_customize->add_setting( 'button_hover_bg_color', array(
		 'default'           => '#00aeef'	 
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'link_hover_background_color', array(
		'label'      => __( 'Hover Background Color', 'wp_dallas_lite' ),
		'section'    => 'layout_styling',
		'settings'   => 'button_hover_bg_color',
	) ) );
	
	$wp_customize->add_setting( 'button_text_color', array(
		 'default'           => '#fff'	 
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'link_text_color', array(
		'label'      => __( 'Text Color', 'wp_dallas_lite' ),
		'section'    => 'layout_styling',
		'settings'   => 'button_text_color',
	) ) );
	
	$wp_customize->add_setting( 'button_hover_text_color', array(
		 'default'           => '#fff'
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'link_hover_text_color', array(
		'label'      => __( 'Hover Text Color', 'wp_dallas_lite' ),
		'section'    => 'layout_styling',
		'settings'   => 'button_hover_text_color',
	) ) );
	
	/*---------Typography Setting---------------------  */
	
	$wp_customize->add_section( 'typographySetting' , array(
		'title'    => __('Typography Settings','wp_dallas_lite'),
		'panel'    => 'blog_layout',
		'priority' => 10
	) );
	
	$wp_customize->add_setting( 'body_google_font', array(
		 'default'           => 'Source Sans Pro' 
	) );
	
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'google_font',
		    array(
		'section' =>'typographySetting',
		'settings' => 'body_google_font',
		'label'    => esc_html__( 'Select Google Font', 'personalblog' ),
		'type'     => 'select',
		'default'  => 'Source Sans Pro',
		'choices'  => get_google_fonts(),
		'google_font' => true,
		'google_font_weight' => 'body_font_weight',
		'google_font_weight_default' => '400'
	)
	));
	
	$wp_customize->add_setting( 'body_font_size', array(
		 'default'           => '18'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'font_size',
		array(
					'section' =>'typographySetting',
					'settings' => 'body_font_size',
					'label'    => esc_html__( 'Body Font Size', 'personalblog' ),
					'type'     => 'number',
					'default'  => '18',
				)
	));
	
	$wp_customize->add_setting( 'body_google_font', array(
		 'default'           => 'Roboto Slab'	 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'select_google_font',
		array(
			
			'section' =>'typographySetting',
			'settings' => 'body_google_font',
			'label'    => esc_html__( 'Select Google Font', 'personalblog' ),
			'type'     => 'select',
			'default'  => 'Roboto Slab',
			'choices'  => get_google_fonts(),
			'google_font' => true,
			'google_font_weight' => 'menu_font_weight',
			'google_font_weight_default' => '400'
		)
	));
	
	$wp_customize->add_setting( 'menu_font_size', array(
		 'default'           => '14'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'menu_font_size',
		array(
			'section' =>'typographySetting',
			'settings' => 'menu_font_size',
			'label'    => esc_html__( 'Menu Font Size', 'personalblog' ),
			'type'     => 'number',
			'default'  => '14',
		)
	));
	
	$wp_customize->add_setting( 'menu_google_font', array(
		 'default'           => 'Roboto Slab'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'h1_google_font',
		//Heading 1
		array(
			'section' =>'typographySetting',
			'settings' => 'menu_google_font',
			'label'    => esc_html__( 'Heading1 Google Font', 'personalblog' ),
			'type'     => 'select',
			'default'  => 'Roboto Slab',
			'choices'  => get_google_fonts(),
			'google_font' => true,
			'google_font_weight' => 'menu_font_weight',
			'google_font_weight_default' => '700'
		)
	));
	
	$wp_customize->add_setting( 'h1_font_size', array(
		 'default'           => '42'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'h1_font_size',
		//Heading 1
		array(
			'section' =>'typographySetting',
			'settings' => 'h1_font_size',
			'label'    => esc_html__( 'Heading1 Font Size', 'personalblog' ),
			'type'     => 'number',
			'default'  => '42',
		)
	));
	
	$wp_customize->add_setting( 'h2_google_font', array(
		 'default'           => 'Roboto Slab'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'h2_google_font',
		//Heading 2
		array(
			'section' =>'typographySetting',
			'settings' => 'h2_google_font',
			'label'    => esc_html__( 'Heading2 Google Font', 'personalblog' ),
			'type'     => 'select',
			'default'  => 'Roboto Slab',
			'choices'  => get_google_fonts(),
			'google_font' => true,
			'google_font_weight' => 'menu_font_weight',
			'google_font_weight_default' => '700'
		)
	));
	
	$wp_customize->add_setting( 'h2_font_size', array(
		 'default'           => '32'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'h2_font_size',
		//Heading 1
		array(
			'section' =>'typographySetting',
			'settings' => 'h2_font_size',
			'label'    => esc_html__( 'Heading2 Font Size', 'personalblog' ),
			'type'     => 'number',
			'default'  => '32',
		)
	));
	
	$wp_customize->add_setting( 'h3_google_font', array(
		 'default'           => 'Roboto Slab'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'h3_google_font',
		//Heading 2
		array(
			'section' =>'typographySetting',
			'settings' => 'h3_google_font',
			'label'    => esc_html__( 'Heading3 Google Font', 'personalblog' ),
			'type'     => 'select',
			'default'  => 'Roboto Slab',
			'choices'  => get_google_fonts(),
			'google_font' => true,
			'google_font_weight' => 'menu_font_weight',
			'google_font_weight_default' => '700'
		)
	));
	
	$wp_customize->add_setting( 'h3_font_size', array(
		 'default'           => '28'	 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'h3_font_size',
		//Heading 3
		array(
			'section' =>'typographySetting',
			'settings' => 'h3_font_size',
			'label'    => esc_html__( 'Heading3 Font Size', 'personalblog' ),
			'type'     => 'number',
			'default'  => '28',
		)
	));
	
	$wp_customize->add_setting( 'h4_google_font', array(
		 'default'           => 'Roboto Slab'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'h4_google_font',
		//Heading 4
		array(
			'section' =>'typographySetting',
			'settings' => 'h4_google_font',
			'label'    => esc_html__( 'Heading4 Google Font', 'personalblog' ),
			'type'     => 'select',
			'default'  => 'Roboto Slab',
			'choices'  => get_google_fonts(),
			'google_font' => true,
			'google_font_weight' => 'menu_font_weight',
			'google_font_weight_default' => '700'
		)
	));
	
	$wp_customize->add_setting( 'h4_font_size', array(
		 'default'           => '22'	 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'h4_font_size',
		//Heading 4
		array(
			'section' =>'typographySetting',
			'settings' => 'h4_font_size',
			'label'    => esc_html__( 'Heading4 Font Size', 'personalblog' ),
			'type'     => 'number',
			'default'  => '22',
		)
	));
	
	$wp_customize->add_setting( 'h5_google_font', array(
		 'default'           => 'Roboto Slab'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'h5_google_font',
		//Heading 5
		array(
			'section' =>'typographySetting',
			'settings' => 'h5_google_font',
			'label'    => esc_html__( 'Heading5 Google Font', 'personalblog' ),
			'type'     => 'select',
			'default'  => 'Roboto Slab',
			'choices'  => get_google_fonts(),
			'google_font' => true,
			'google_font_weight' => 'menu_font_weight',
			'google_font_weight_default' => '700'
		)
	));
	
	$wp_customize->add_setting( 'h5_font_size', array(
		 'default'           => '18'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'h5_font_size',
		//Heading 5
		array(
			'section' =>'typographySetting',
			'settings' => 'h5_font_size',
			'label'    => esc_html__( 'Heading5 Font Size', 'personalblog' ),
			'type'     => 'number',
			'default'  => '18',
		)
	));
	
	/*---------Social Icon---------------------  */	
	
	$wp_customize->add_section( 'socialMedial' , array(
		'title'    => __('Social Icons','wp_dallas_lite'),
		'panel'    => 'blog_layout',
		'priority' => 10
	) );
	
	$wp_customize->add_setting( 'facebooklogo', array(
		 'default'           => 'facebook.com' 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'facebook_logo',
		    array(
		        'label'    => __( 'Facebook Link', 'wp_dallas_lite' ),
		        'section'  => 'socialMedial',
		        'settings' => 'facebooklogo',
				'type'=> 'text',
		        'choices' =>
				array(
				'logo_text' => 'Use custom Link',		
		  ),
	)));
	
	$wp_customize->add_setting( 'twitterlogo', array(
		 'default'           => 'twitter.com' 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'twitter_logo',
		    array(
		        'label'    => __( 'Twitter Link', 'wp_dallas_lite' ),
		        'section'  => 'socialMedial',
		        'settings' => 'twitterlogo',
				'type'=> 'text',
		        'choices' =>
				array(
				'logo_text' => 'Use custom Link',		
		  ),
	)));
	
	$wp_customize->add_setting( 'googlepluslogo', array(
		 'default'           => 'googleplus.com' 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'googleplus_logo',
		    array(
		        'label'    => __( 'Google Plus Link', 'wp_dallas_lite' ),
		        'section'  => 'socialMedial',
		        'settings' => 'googlepluslogo',
				'type'=> 'text',
		        'choices' =>
				array(
				'logo_text' => 'Use custom Link',		
		  ),
	)));
	
	$wp_customize->add_setting( 'linkedinlogo', array(
		 'default'           => 'linkedin.com' 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'linkedin_logo',
		    array(
		        'label'    => __( 'LinkedIn Link', 'wp_dallas_lite' ),
		        'section'  => 'socialMedial',
		        'settings' => 'linkedinlogo',
				'type'=> 'text',
		        'choices' =>
				array(
				'logo_text' => 'Use custom Link',		
		  ),
	)));
}



	
?>