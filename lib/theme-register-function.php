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
	
	$wp_customize->add_setting( 'footer-copyright-text', array(
		 'default'           => __( 'Enable Copyright Text', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'enable_copyright_text',
		    array(
		        'label'    => __( 'Enable Copyright Text', 'wp_dallas_lite' ),
		        'section'  => 'footer_section',
		        'settings' => 'footer-copyright-text',
				'type'=> 'radio',
		        'choices' =>
				array(
				'1' => 'Yes',
				'0' => 'No',				
		  ),
	   )));
	
	$wp_customize->add_setting( 'copyright-text', array(
		 'default'           => __( 'Copyright Text', 'wp_dallas_lite' )		 
	) );
	
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'copyright_text',
		    array(
		        'label'    => __( 'Copyright Text', 'wp_dallas_lite' ),
		        'section'  => 'footer_section',
		        'settings' => 'copyright-text',
				'type'=> 'textarea',
		        'choices' =>
				array(
				'textarea_rows' => 5,				
		  ),
	   )));
	
	function dallas_text($text){
		
	}
	
	
 
}



	
?>