<?php
/* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package WP_Dallas_Lite
*/
defined('ABSPATH') or die('No script kiddies please!');
include_once (ABSPATH . 'wp-admin/includes/plugin.php');

add_action('admin_notices', 'my_theme_dependencies');

function my_theme_dependencies()
	{
	if (!function_exists('wps_get_mailing_services'))
		{
		echo '<div class="error"><p>' . __('This theme recommends the following plugin:', 'wp_dallas_lite') . ' <a href="' . admin_url() . 'plugin-install.php?tab=plugin-information&plugin=wp-subscribe&TB_iframe=true&width=640&height=500" class="thickbox">WP Subscribe</a></p><p><a class="is-dismissible" href="' . wp_dallas_lite_activation_link('wp-subscribe/wp-subscribe.php', 'activate') . '">
		Dismiss this notice </a></p></div>';
		}
	  else
		{
		}

	if (!class_exists('wpt_widget'))
		{
		echo '<div class="error"><p>' . __('This theme recommends the following plugin:', 'wp_dallas_lite') . ' <a href="' . admin_url() . 'plugin-install.php?tab=plugin-information&plugin=wp-tab-widget&TB_iframe=true&width=640&height=500" class="thickbox">WP Tab Widget</a></p><p><a class="is-dismissible" href="' . wp_dallas_lite_activation_link('wp-tab-widget/wp-tab-widget.php', 'activate') . '">
		Dismiss this notice </a></p></div>';
		}
	  else
		{
		}
	}

function wp_dallas_lite_activation_link($plugin, $action = 'activate')
	{
	if (strpos($plugin, '/'))
		{
		$plugin = str_replace('\/', '%2F', $plugin);
		}

	$url = sprintf(admin_url('plugins.php?action=' . $action . '&plugin=%s&plugin_status=all&paged=1&s') , $plugin);
	$_REQUEST['plugin'] = $plugin;
	if ($_REQUEST['plugin'])
		{
		$url = wp_nonce_url($url, $action . '-plugin_' . $plugin);
		}

	return $url;
	}