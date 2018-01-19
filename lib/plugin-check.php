<?php
/* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package wp_dallas_lite
*/
defined('ABSPATH') or die('No script kiddies please!');

function wp_dallas_lite_plugin_notice() {
    $user_id = get_current_user_id();
    if ( !get_user_meta( $user_id, 'wp_dallas_lite_notice_dismissed' ) ) {
		if( !function_exists('wps_get_mailing_services') || !class_exists('wpt_widget')){
		echo '<div id="message" class="notice notice-success is-dismissible"><p>' . __( 'This theme recommends the following plugins:', 'wp_dallas_lite' ) .' <a href="'.admin_url().'plugin-install.php?tab=plugin-information&plugin=wp-subscribe&TB_iframe=true&width=640&height=500" class="thickbox">WP Subscribe</a>   <a href="'.admin_url().'plugin-install.php?tab=plugin-information&plugin=wp-tab-widget&TB_iframe=true&width=640&height=500" class="thickbox">WP Tab Widget</a></p>
		<a href="' . esc_url( wp_nonce_url( add_query_arg( 'tgmpa-dismiss', 'dismiss_admin_notices' ), 'tgmpa-dismiss-' . get_current_user_id() ) ) . '" class="dismiss-notice" target="_parent">Dismiss this notice</a></p></div>';		
		}	

	}
}
add_action( 'admin_notices', 'wp_dallas_lite_plugin_notice' );

function wp_dallas_lite_notice_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['tgmpa-dismiss'] ) )
        add_user_meta( $user_id, 'wp_dallas_lite_notice_dismissed', 'true', true );
}
add_action( 'admin_init', 'wp_dallas_lite_notice_dismissed' );