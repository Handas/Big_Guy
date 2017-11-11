<?php
/*
 * Plugin Name: Tabs Builder
 * Version: 1.1.6
 * Description: Tab Builder is provide you a prefect tab builder ui to add unlimited tabs with unlimited color scheme 
 * Author: wpshopmart
 * Author URI: http://www.wpshopmart.com
 * Plugin URI: http://www.wpshopmart.com
 *
 */
if ( ! defined( 'ABSPATH' ) ) exit;
/* Define folder path*/ 
define("wpsm_tabs_b_directory_url", plugin_dir_url(__FILE__));
define("wpsm_tabs_b_text_domain", "wpsm_tabs_b");

/* PLUGIN Install */
require_once("ink/install/installation.php");

function wpsm_tabs_b_default_data()
{			
	$Settings_Array = serialize( array(
		"title_bg_clr"   => "#e0e0e0",
		"title_icon_clr" => "#7c7c7c",
		"select_title_icon_clr" => "#939393",
		"desc_font_clr"  => "#5b5b5b",
		"border_top_color" => "#1e73be",
		"select_expand_animation" => "yes",	
		"title_size"         => "16",
		"des_size"     		 => "15",
		"font_family"     	 => "Open Sans",
		"tabs_styles"      => "1",
		"custom_css"      =>"",
		"tabs_animation"      =>"fadeIn",
		"tabs_position"      =>"left",
		"tabs_border_show" => "yes",
		"selected_tab_top_border_show" => "yes",
		"bottom_border_line" => "yes",
		"tabs_display_mode_mob" =>"2",
		) );

	add_option('Tabs_B_default_Settings', $Settings_Array);
}
register_activation_hook( __FILE__, 'wpsm_tabs_b_default_data' );

require_once("ink/admin/menu.php");

/**
 * SHORTCODE
 */
 require_once("template/shortcode.php");

 // Add settings link on plugin page
function wpsm_tabs_b_settings_link($links) { 
  $settings_link = '<a href="edit.php?post_type=tabs_builder">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'wpsm_tabs_b_settings_link' );
 
?>