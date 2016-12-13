<?php 
/**
 * pogaam Customizer functionality
 *
 * @package pogaam
 */

/**
 * Adds postMessage support for site title and description for the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function pogaam_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Remove the core header textcolor control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );


	/**
	 * Custom Customize
	 */	
	// Logo desktop
	$wp_customize->add_setting( 'pogaam_logo_desktop', array(
		'default'   => get_template_directory_uri() . '/img/logo.png',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pogaam_logo_desktop', array(
		'label'    => __( 'Website Logo', 'pogaam' ),
		'section'  => 'title_tagline',
		'settings' => 'pogaam_logo_desktop',
	) ) );

	// Logo mobile
	$wp_customize->add_setting( 'pogaam_logo_mobile', array(
		'default'   => '',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pogaam_logo_mobile', array(
		'label'       => __( 'Website Logo on mobile(Optional)', 'pogaam' ),
		'description' => __( 'This image will show on tablets and mobile. If you not choose image website will use image from "Website Logo"', 'pogaam' ),
		'section'     => 'title_tagline',
		'settings'    => 'pogaam_logo_mobile',
	) ) );
	

}
add_action( 'customize_register', 'pogaam_customize_register', 11 );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 */
function pogaam_customize_preview_js() {
	wp_enqueue_script( 'pogaam-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'pogaam-jquery', 'customize-preview' ), '201604122', true );
}
add_action( 'customize_preview_init', 'pogaam_customize_preview_js' );
?>