<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if(isset($PostID) && isset($_POST['tabs_setting_save_action'])) 
{
			$tabs_position         	  = sanitize_option('tabs_position',$_POST['tabs_position']);
			$tabs_styles          	  = sanitize_option('tabs_styles',$_POST['tabs_styles']);
			$select_expand_animation  = sanitize_option('select_expand_animation',$_POST['select_expand_animation']);
			$title_bg_clr             = sanitize_text_field($_POST['title_bg_clr']);
			$title_icon_clr           = sanitize_text_field($_POST['title_icon_clr']);
			$select_title_icon_clr    = sanitize_text_field($_POST['select_title_icon_clr']);
			$desc_font_clr            = sanitize_text_field($_POST['desc_font_clr']);
			$border_top_color         = sanitize_text_field($_POST['border_top_color']);
			$title_size               = sanitize_text_field($_POST['title_size']);
			$des_size                 = sanitize_text_field($_POST['des_size']);
			$font_family              = sanitize_text_field($_POST['font_family']);
			$tabs_animation           = sanitize_text_field($_POST['tabs_animation']);
			$custom_css               = stripslashes($_POST['custom_css']);
			$tabs_border_show       = sanitize_option('tabs_border_show',$_POST['tabs_border_show']);
			$selected_tab_top_border_show  = sanitize_option('selected_tab_top_border_show',$_POST['selected_tab_top_border_show']);
			$bottom_border_line       = sanitize_option('bottom_border_line',$_POST['bottom_border_line']);
			$tabs_display_mode_mob 	  = sanitize_option('tabs_display_mode_mob', $_POST['tabs_display_mode_mob']);
			
			$Settings_Array = serialize( array(
				'tabs_position' 		   => $tabs_position,
				'tabs_styles' 		       => $tabs_styles,
				'title_bg_clr' 		   	   => $title_bg_clr,
				'title_icon_clr' 		   => $title_icon_clr,
				'select_title_bg_clr' 	   => $select_title_bg_clr,
				'select_title_icon_clr'    => $select_title_icon_clr,
				'desc_font_clr' 	       => $desc_font_clr,
				'border_top_color' 		   => $border_top_color,
				'select_expand_animation'  => $select_expand_animation,	
				'title_size' 			   => $title_size,
				'des_size' 				   => $des_size,
				'font_family' 			   => $font_family,
				'tabs_animation' 		   => $tabs_animation,
				'custom_css' 			   => $custom_css,
				'bottom_border_line' 	   => $bottom_border_line,
				'tabs_border_show'		   => $tabs_border_show,
				'selected_tab_top_border_show' => $selected_tab_top_border_show,
				'tabs_display_mode_mob'    => $tabs_display_mode_mob,
				) );

			update_post_meta($PostID, 'Tabs_B_Settings', $Settings_Array);
}
?>