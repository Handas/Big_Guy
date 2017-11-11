<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$labels = array(
				'name'                => _x( 'Tabs Builder', 'Tabs Builder', wpsm_tabs_b_text_domain ),
				'singular_name'       => _x( 'Tabs Builder', 'Tabs Builder', wpsm_tabs_b_text_domain ),
				'menu_name'           => __( 'Tabs Builder', wpsm_tabs_b_text_domain ),
				'parent_item_colon'   => __( 'Parent Item:', wpsm_tabs_b_text_domain ),
				'all_items'           => __( 'All Tabs', wpsm_tabs_b_text_domain ),
				'view_item'           => __( 'View Tabs', wpsm_tabs_b_text_domain ),
				'add_new_item'        => __( 'Add New Tabs', wpsm_tabs_b_text_domain ),
				'add_new'             => __( 'Add New Tabs', wpsm_tabs_b_text_domain ),
				'edit_item'           => __( 'Edit Tabs', wpsm_tabs_b_text_domain ),
				'update_item'         => __( 'Update Tabs', wpsm_tabs_b_text_domain ),
				'search_items'        => __( 'Search Tabs', wpsm_tabs_b_text_domain ),
				'not_found'           => __( 'No Tabs Found', wpsm_tabs_b_text_domain ),
				'not_found_in_trash'  => __( 'No Tabs found in Trash', wpsm_tabs_b_text_domain ),
			);
			$args = array(
				'label'               => __( 'Tabs Builder', wpsm_tabs_b_text_domain ),
				'description'         => __( 'Tabs Builder', wpsm_tabs_b_text_domain ),
				'labels'              => $labels,
				'supports'            => array( 'title', '', '', '', '', '', '', '', '', '', '', ),
				//'taxonomies'          => array( 'category', 'post_tag' ),
				 'hierarchical'        => false,
				'public'              => false,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => false,
				'show_in_admin_bar'   => false,
				'menu_position'       => 5,
				'menu_icon'           => 'dashicons-index-card',
				'can_export'          => true,
				'has_archive'         => true,
				'exclude_from_search' => false,
				'publicly_queryable'  => false,
				'capability_type'     => 'page',
			);
			register_post_type( 'tabs_builder', $args );
			
 ?>