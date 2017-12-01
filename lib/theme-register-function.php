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
		 'default'           => __( 'Select Layout', 'wp_dallas_lite' )		 
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
		        'settings' => 'blog_layout_selection',
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
		        'settings' => 'blog_layout_selection',
				'type'=> 'select',
				'selected' => 'selected',
		        'choices' =>
				array(
				'paginumber' => 'Number',
				'pagiloadmore' => 'Load More',				
		  ),
	   )));
	
	function dallas_text($text){
		
	}
	
	
 
}



	
?>