<?php               namespace clb_bootstrap_navtabs;
/*
Plugin Name: Simple Bootstrap Nav Tabs
Plugin URI: http://www.tomatillodesign.com
Description: Using Bootstrap 4.0+ Nav Tabs in WordPress
Author: Chris Liu-Beers
Version: 1.0
Author URI: http://www.tomatillodesign.com
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain: simple-bootstrap-navtabs
Domain Path: /languages/
*/

if ( ! defined( 'ABSPATH' ) ) {
				die;
}


/**
* Register our text domain.
*
* @since 1.0
*/
function load_textdomain() {
	load_plugin_textdomain( 'bootstrap-navtabs', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\\load_textdomain' );


/**
* Register and Enqueue Scripts and Styles.
*
* @since 1.0
*/
//Script-tac-ulous -> All the Scripts and Styles Registered and Enqueued, scripts first - then styles
function scripts_styles() {

	wp_register_script( 'navtabsjs' , plugins_url( '/js/navtabs.js',  __FILE__), array( 'jquery' ), '3.3.5', true );
	wp_register_style( 'navtabscss' , plugins_url( '/css/navtabs.css',  __FILE__), '' , '3.3.5', 'all' );


	wp_enqueue_script( 'navtabsjs' );
	wp_enqueue_style( 'navtabscss' );
}
add_action( 'wp_enqueue_scripts',  __NAMESPACE__ . '\\scripts_styles' );


/**
 * Add scripts in back-end.
 *
 * @since 1.0
 */
function admin_navtabs($hook) {
    if ( 'settings_page_bootstrap-navtabs' != $hook ) {
        return;
    }
    wp_enqueue_script( 'navtabsjs' , plugins_url( '/js/navtabs.js',  __FILE__), array( 'jquery' ), '3.3.5', true );
    wp_enqueue_style( 'navtabscss' , plugins_url( '/css/navtabs.css',  __FILE__), '' , '3.3.5', 'all' );
}
add_action( 'admin_enqueue_scripts',  __NAMESPACE__ . '\\admin_navtabs' );





/**
 * Register our section call back
 * (not much happening here)
 * @since 1.0
 */

function clb_bootstrap_navtabs_section_callback() {

}






/**
 * Create the plugin option page.
 *
 * @since 1.3.0
 */

function plugin_page() {

    /*
     * Use the add options_page function
     * add_options_page( $page_title, $menu_title, $capability, $menu-slug, $function )
     */

     add_options_page(
        __( 'Simple Bootstrap Nav Tabs','simple-bootstrap-navtabs' ), //$page_title
        __( 'Bootstrap Nav Tabs ', 'simple-bootstrap-navtabs' ), //$menu_title
        'manage_options', //$capability
        'simple-bootstrap-navtabs', //$menu-slug
        __NAMESPACE__ . '\\plugin_options_page' //$callbackfunction
      );
}
add_action( 'admin_menu', __NAMESPACE__ . '\\plugin_page' );


/**
 * Include the plugin option page.
 *
 * @since 1.3.0
 */

function plugin_options_page() {

    if( !current_user_can( 'manage_options' ) ) {

      wp_die( "Hall and Oates 'Say No Go'" );
    }

   require( 'inc/options-page-wrapper.php' );
}



function clb_tabgroup_shortcode( $atts, $content = null ) {

	// Extract and parse attributes
	extract( shortcode_atts( array(), $atts ) );

	preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );

	$tab_titles = array();

	if ( isset($matches[1]) ){ $tab_titles = $matches[1]; }

	$output = '';

	if ( count($tab_titles) ){

		$output .= '<div class="clb-nav-tabs-top">';
		$output .= '<ul class="nav nav-tabs" role="tablist">';

			$i = 0;

		foreach( $tab_titles as $tab ){

			$i++;
			if( $i == 1 ) { $active = 'active'; }

			$output .= '<li class="nav-item"><a class="nav-link ' . $active . '" data-toggle="tab" role="tab" href="#' . sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';

			$active = NULL;

		}

		$output .= '</ul></div><div class="tab-content">';

		// foreach( $tab_titles as $tab ){
		//
		// 	$output .= '<div class="tab-pane fade" id="' . $tab[0] . '" role="tabpanel">'. do_shortcode( '[tab]' . $content . '[/tab]' ) . '</div>';
		//
		// }

		//$output .= do_shortcode( $content );

		$output .= do_shortcode( $content );

		$output .= '</div>';

	} else {
		$output .= do_shortcode( $content );
	}
	// Return output
	return $output;

}
add_shortcode( 'tabs', 'clb_bootstrap_navtabs\clb_tabgroup_shortcode' );




function clb_tab_shortcode( $atts, $content = null ) {

	$atts = shortcode_atts(
		array(
			'title' => 'First_Tab',
		),
		$atts
	);

	$title = $atts[title];
	$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));


	// Return output
	$output = '<div class="tab-pane fade" id="' . $slug . '" role="tabpanel">' . do_shortcode( $content ) . '</div>';

	return $output;

}
add_shortcode( 'tab', 'clb_bootstrap_navtabs\clb_tab_shortcode' );
