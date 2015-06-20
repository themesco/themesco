<?php
/**
 * themesco Theme Customizer
 *
 * @package themesco
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function themesco_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    
    $wp_customize->add_panel( 'panel_1', array(
		'priority' => 30,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Header section', 'themesco' )
	) );
        
    $wp_customize->add_section( 'themesco_general_section' , array(
		'title'       => __( 'General options', 'themesco' ),
      	'priority'    => 1,
      	'description' => __('General options','themesco'),
        'panel' => 'panel_1'
	));
	
    
	/* Logo	*/
	$wp_customize->add_setting( 'themesco_logo', array(
		'default' => get_stylesheet_directory_uri().'/img/logo.jpg',
		'sanitize_callback' => 'esc_url'
	));
    
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themesco_logo', array(
	      	'label'    => __( 'Logo', 'themesco' ),
	      	'section'  => 'themesco_general_section',
	      	'settings' => 'themesco_logo',
			'priority'    => 1,
	)));
    
    $wp_customize->add_section ('themesco_jumbotron', array(
        'title'         =>__('Jumbotron', 'themesco'),
        'priority'      =>2,
        'description'   =>__('Jumbotron','themesco'),
        'panel' => 'panel_1'
    ));
    
    $wp_customize->add_setting(
    'jumbotron_main_header',
    array(
        'default' => __('Simple, Clean & Beautiful WordPress Themes','themesco'),
        'sanitize_callback' => 'themesco_sanitize_text' 
    ));
    
    
    $wp_customize->add_control(
    'jumbotron_main_header',
    array(
        'label' => __('Main heading','themesco'),
        'section' => 'themesco_jumbotron',
        'type' => 'text',
        'settings' => 'jumbotron_main_header',
        'priority' => 1
    ));
    
    
    
    $wp_customize->add_setting(
    'jumbotron_sub_header',
    array(
        'default' => __("It's not Just another WordPress Theme Shop but much more...",'themesco'),
        'sanitize_callback' => 'themesco_sanitize_text' 
    ));
    
    
    $wp_customize->add_control(
    'jumbotron_sub_header',
    array(
        'label' => __('Sub heading','themesco'),
        'section' => 'themesco_jumbotron',
        'type' => 'text',
        'settings' => 'jumbotron_sub_header',
        'priority' => 2
    ));
    
    $wp_customize->add_setting(
    'button_text',
    array(
        'default' => __("browse our themes", 'themesco'),
        'sanitize_callback' => 'themesco_sanitize_text'
    ));
    
    $wp_customize->add_control(
    'button_text',
    array(
       'label' =>__('Button text', 'themesco'),
        'section' => 'themesco_jumbotron',
        'type' => 'text',
        'settings' => 'button_text',
        'priority' => 3
    ));
    
     $wp_customize->add_setting(
    'button_link',
    array(
        'default' =>'#',
        'sanitize_callback' => 'esc_url'
    ));
    
    $wp_customize->add_control(
    'button_link',
    array(
       'label' =>__('Button link', 'themesco'),
        'section' => 'themesco_jumbotron',
        'type' => 'text',
        'settings' => 'button_link',
        'priority' => 4
    ));
    
    $wp_customize->add_panel( 'panel_2', array(
		'priority' => 31,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Latest Themes Section', 'themesco' )
	));
    
       $wp_customize->add_section( 'themesco_latest_section' , array(
		'title'       => __( 'Controls', 'themesco' ),
      	'priority'    => 1,
      	'description' => __('Controls','themesco'),
        'panel' => 'panel_2'
	));
	
    
	/* Heading	*/
	$wp_customize->add_setting(
    'latest_themes_header',
    array(
        'default' => __("Our Latest Themes",'themesco'),
        'sanitize_callback' => 'themesco_sanitize_text' 
    ));
    
    
    $wp_customize->add_control(
    'latest_themes_header',
    array(
        'label' => __('Heading','themesco'),
        'section' => 'themesco_latest_section',
        'type' => 'text',
        'settings' => 'latest_themes_header',
        'priority' => 1
    ));
    
    /* Buttons-overlay-text	*/
	$wp_customize->add_setting(
    'lt_green_button',
    array(
        'default' => __("demo",'themesco'),
        'sanitize_callback' => 'themesco_sanitize_text' 
    ));
    
    
   $wp_customize->add_control(
    'lt_green_button',
    array(
        'label' => __('Green Button Text','themesco'),
        'section' => 'themesco_latest_section',
        'type' => 'text',
        'settings' => 'lt_green_button',
        'priority' => 2
    ));
    
    $wp_customize->add_setting(
    'lt_red_button',
    array(
        'default' => __('details','themesco'),
        'sanitize_callback' => 'themesco_sanitize_text' 
    ));
    
    
    $wp_customize->add_control(
    'lt_red_button',
    array(
        'label' => __('Red Button Text','themesco'),
        'section' => 'themesco_latest_section',
        'type' => 'text',
        'settings' => 'lt_red_button',
        'priority' => 3
    ));

    
    
    
}
add_action( 'customize_register', 'themesco_customize_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function themesco_customize_preview_js() {
	wp_enqueue_script( 'themesco_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'themesco_customize_preview_js' );



function themesco_sanitize_text ( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}