<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if(isset($PostID) && isset($_POST['tabs_b_save_data_action']) ) {
			$TotalCount = count($_POST['tabs_title']);
			$All_data = array();
			if($TotalCount) {
				for($i=0; $i < $TotalCount; $i++) {
					$tabs_title = stripslashes(sanitize_text_field($_POST['tabs_title'][$i]));
					$tabs_desc = stripslashes($_POST['tabs_desc'][$i]);

					$All_data[] = array(
						'tabs_title' => $tabs_title,
						'tabs_desc' => $tabs_desc,
					);
				}
				update_post_meta($PostID, 'wpsm_tabs_b_data', serialize($All_data));
				update_post_meta($PostID, 'wpsm_tabs_b_count', $TotalCount);
			} 
			
			else 
			{
				$TotalCount = -1;
				update_post_meta($PostID, 'wpsm_tabs_b_count', $TotalCount);
				$All_data = array();
				update_post_meta($PostID, 'wpsm_tabs_b_data', serialize($All_data));
			}
		}
 ?>