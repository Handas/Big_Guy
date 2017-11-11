<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class wpsm_tabs_b
{
	private static $instance;
    public static function forge() {
        if (!isset(self::$instance)) {
            $className = __CLASS__;
            self::$instance = new $className;
        }
        return self::$instance;
    }
	private function __construct() 
	{
		add_action('admin_enqueue_scripts', array(&$this, 'wpsm_tabs_b_admin_scripts'));
        if (is_admin()) 
		{
			add_action('init', array(&$this, 'tabs_b_register_cpt'), 1);
			add_action('add_meta_boxes', array(&$this, 'wpsm_tabs_b_meta_boxes_group'));
			add_action('admin_init', array(&$this, 'wpsm_tabs_b_meta_boxes_group'), 1);
			add_action('save_post', array(&$this, 'add_tabs_b_meta_box_save'), 9, 1);
			add_action('save_post', array(&$this, 'tabs_b_settings_meta_box_save'), 9, 1);
		}
    }
	
	//admin scripts
	public function wpsm_tabs_b_admin_scripts()
	{
		if(get_post_type()== 'tabs_builder')
		{
			wp_enqueue_media();
			wp_enqueue_script('jquery-ui-datepicker');
			//color-picker css n js
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wpsm_tabs_b-color-pic', wpsm_tabs_b_directory_url.'assets/js/color-picker.js', array( 'wp-color-picker' ), false, true );
			wp_enqueue_style('wpsm_tabs_b-panel-style', wpsm_tabs_b_directory_url.'assets/css/panel-style.css');
			  
			//font awesome css
			wp_enqueue_style('wpsm_tabs_b-font-awesome', wpsm_tabs_b_directory_url.'assets/css/font-awesome/css/font-awesome.min.css');
			wp_enqueue_style('wpsm_tabs_b_bootstrap', wpsm_tabs_b_directory_url.'assets/css/bootstrap.css');
			wp_enqueue_style('wpsm_tabs_b_jquery-css', wpsm_tabs_b_directory_url .'assets/css/ac_jquery-ui.css');
			
			//line editor
			wp_enqueue_style('wpsm_tabs_b_line-edtor', wpsm_tabs_b_directory_url.'assets/css/jquery-linedtextarea.css');
			wp_enqueue_script( 'wpsm_tabs_b-line-edit-js', wpsm_tabs_b_directory_url.'assets/js/jquery-linedtextarea.js');
			wp_enqueue_script( 'wpsm_tabs_bootstrap-js', wpsm_tabs_b_directory_url.'assets/js/bootstrap.js');
			
			//tooltip
			wp_enqueue_style('wpsm_tabs_b_tooltip', wpsm_tabs_b_directory_url.'assets/tooltip/darktooltip.css');
			wp_enqueue_script( 'wpsm_tabs_b-tooltip-js', wpsm_tabs_b_directory_url.'assets/tooltip/jquery.darktooltip.js');
			
			// settings
			wp_enqueue_style('wpsm_tabs_b_settings-css', wpsm_tabs_b_directory_url.'assets/css/settings.css');
			
				
			
		}
	}
	
	public function tabs_b_register_cpt()
	{
		require_once('cpt-reg.php');
		add_filter( 'manage_edit-tabs_builder_columns', array(&$this, 'tabs_builder_columns' )) ;
		add_action( 'manage_tabs_builder_posts_custom_column', array(&$this, 'tabs_builder_manage_columns' ), 10, 2 );
	}
	
	public function add_tabs_b_meta_box_save($PostID)
	{
		require('data-post/tabs-save-data.php');
	}
	public function tabs_b_settings_meta_box_save($PostID)
	{
		require('data-post/tabs-settings-save-data.php');
	}
	
	public function tabs_builder_columns($columns)
	{
		$columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __( 'Tabs' ),
            'shortcode' => __( 'Tabs Shortcode' ),
            'date' => __( 'Date' )
        );
        return $columns;
	}	
	
	public function wpsm_tabs_b_meta_boxes_group()
	{
		add_meta_box('tabs_b_add', __('Add Tabs Panel', wpsm_tabs_b_text_domain), array(&$this, 'wpsm_add_tabs_b_meta_box_function'), 'tabs_builder', 'normal', 'low' );
		add_meta_box ('tabs_b_shortcode', __('Tabs Shortcode', wpsm_tabs_b_text_domain), array(&$this, 'wpsm_pic_tabs_b_shortcode'), 'tabs_builder', 'normal', 'low');
		add_meta_box('tabs_b_donate', __('Donate Us', wpsm_tabs_b_text_domain), array(&$this, 'wpsm_tabs_b_donate_meta_box_function'), 'tabs_builder', 'side', 'low');
		add_meta_box('tabs_b_rateus', __('Rate Us If You Like This Plugin', wpsm_tabs_b_text_domain), array(&$this, 'wpsm_tabs_b_rateus_meta_box_function'), 'tabs_builder', 'side', 'low');
		add_meta_box('tabs_b_setting', __('Tabs Settings', wpsm_tabs_b_text_domain), array(&$this, 'wpsm_add_tabs_b_setting_meta_box_function'), 'tabs_builder', 'side', 'low');
	}
	
	
	public function tabs_builder_manage_columns( $column, $post_id)
	{
		global $post;
        switch( $column ) {
          case 'shortcode' :
            echo '<input style="width:225px" type="text" value="[TABS_B id='.$post_id.']" readonly="readonly" />';
            break;
          default :
            break;
        }
	}
	
	function wpsm_add_tabs_b_meta_box_function($post)
	{
		require_once('add-tabs.php');
	}
	
	public function wpsm_pic_tabs_b_shortcode()
	{
		?>
		<style>
			#tabs_b_shortcode{
			background:#fff!important;
			box-shadow: 0 0 20px rgba(0,0,0,.2);
			}
			#tabs_b_shortcode .hndle , #tabs_b_shortcode .handlediv{
			display:none;
			}
			#tabs_b_shortcode p{
			color:#000;
			font-size:15px;
			}
			#tabs_b_shortcode input {
			font-size: 16px;
			padding: 8px 10px;
			width:100%;
			}
			
		</style>
		<h3>Tabs Shortcode</h3>
		<p><?php _e("Use below shortcode in any Page/Post to publish your Tabs", wpsm_tabs_b_text_domain);?></p>
		<input readonly="readonly" type="text" value="<?php echo "[TABS_B id=".get_the_ID()."]"; ?>">
		<?php
		 $PostId = get_the_ID();
		$Settings = unserialize(get_post_meta( $PostId, 'Tabs_B_Settings', true));
		if(isset($Settings['custom_css'])){  
		     $custom_css   = $Settings['custom_css'];
		}
		else{
		$custom_css="";
		}		
		?>
		
		<br><br>
		
		<h3>Custom Css</h3>
		<textarea name="custom_css" id="custom_css" style="width:100% !important ;height:300px;background:#ECECEC;"><?php echo $custom_css ; ?></textarea>
		<p>Enter Css without <strong>&lt;style&gt; &lt;/style&gt; </strong> tag</p>
		<br>
		
		<?php if(isset($Settings['custom_css'])){ ?> 
		<h3>Add This Tab settings as default setting for new tabs</h3>
		<div class="">
			<a  class="button button-primary button-hero" name="updte_wpsm_tabs_r_default_settings" id="updte_wpsm_tabs_r_default_settings" onclick="wpsm_update_default()">Update Default Settings</a>
		</div>	
		<?php } ?>
		<script>
		jQuery(function() {
		// Target a single one
		  jQuery("#custom_css").linedtextarea();

		});
		</script>
		<?php 
	}
	
	public function wpsm_tabs_b_donate_meta_box_function(){
		?>
			<style>
				#tabs_b_donate{
				background:transparent;
				text-align:center;
				box-shadow:none;
				}
				#tabs_b_donate .hndle , #tabs_b_donate .handlediv{
				display:none;
				}
				
				a, a:focus{
					box-shadow:none;
					text-decoration:none;
				}
				#tabs_b_donate h3 {
				margin-bottom:5PX;
				margin-top:3px;
				padding:0px;
				}
			</style>
			<a href="http://wpshopmart.com/members/signup/tabs-responsive-donation" target="_blank" >
			<img src="<?php echo wpsm_tabs_b_directory_url.'assets/images/donate-1.jpg'; ?>" style="width:100%;height:auto"/>
			<h3> We Need Your Support</h3>
			<img src="<?php echo wpsm_tabs_b_directory_url.'assets/images/donate-b.png'; ?>" style="width:100%;height:auto"/>
			</a>
			<?php 
	}
	public function wpsm_tabs_b_rateus_meta_box_function()
	{
		?>
				<style>
		#tabs_b_rateus{
			background:#31a3dd;
			text-align:center;
			}
			#tabs_b_rateus .hndle , #tabs_b_rateus .handlediv{
			display:none;
			}
			#tabs_b_rateus h1{
			color:#fff;
			
			}
			 #tabs_b_rateus h3 {
			color:#fff;
			font-size:15px;
			}
			#tabs_b_rateus .button-hero{
			display:block;
			text-align:center;
			margin-bottom:15px;
			}
			.wpsm-rate-us{
			text-align:center;
			}
			.wpsm-rate-us span.dashicons {
				width: 40px;
				height: 40px;
				font-size:20px;
				color: #FFF !important;
			}
			.wpsm-rate-us span.dashicons-star-filled:before {
				content: "\f155";
				font-size: 40px;
			}
		</style>
		   <h1>Rate This Plugin </h1>
			<a href="https://wordpress.org/plugins/tabs-builder/" target="_blank" class="button button-primary button-hero ">RATE HERE</a>
			<a class="wpsm-rate-us" style=" text-decoration: none; height: 40px; width: 40px;" href="https://wordpress.org/plugins/tabs-builder/" target="_blank">
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
			</a>
		<?php 
	}
	
	public function wpsm_add_tabs_b_setting_meta_box_function($post)
	{
		require_once('settings.php');
	}
	
}
global $wpsm_tabs_b;
$wpsm_tabs_b = wpsm_tabs_b::forge();
?>