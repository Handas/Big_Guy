<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
$post_type = "tabs_builder";
$AllTabs = array('p' => $WPSM_Tabs_ID, 'post_type' => $post_type, 'orderby' => 'ASC');
$loop = new WP_Query( $AllTabs );

while ($loop->have_posts()) : $loop->the_post();
	//get the post id
	$post_id = get_the_ID();
	$Tabs_Settings = unserialize(get_post_meta( $post_id, 'Tabs_B_Settings', true));
	if(count($Tabs_Settings)) 
	{
		$option_names = array(
			"title_bg_clr"   => "#7a81f4",
			"title_icon_clr" => "#000000",
			"select_title_icon_clr" => "#444444",
			"desc_font_clr"  => "#333333",
			"border_top_color" => "#00b0ad",
			"select_expand_animation" => "yes",	
			"title_size"         => "14",
			"des_size"     		 => "16",
			"font_family"     	 => "Open Sans",
			"tabs_styles"      => "1",
			"custom_css"      =>"",
			"tabs_animation"      =>"fadeIn",
			"tabs_position"      =>"left",
			"tabs_border_show" => "yes",
			"selected_tab_top_border_show" => "yes",
			"bottom_border_line" => "yes",
			"tabs_display_mode_mob" =>"2",
		);
			
		foreach($option_names as $option_name => $default_value) 
		{
			if(isset($Tabs_Settings[$option_name])) 
				${"" . $option_name}  = $Tabs_Settings[$option_name];
			else
				${"" . $option_name}  = $default_value;
		}
	}
	
	$tabs_data = unserialize(get_post_meta( $post_id, 'wpsm_tabs_b_data', true));
	$TotalCount =  get_post_meta( $post_id, 'wpsm_tabs_b_count', true );
	$i=1;
	$j=1;
	if($TotalCount >0) 
	{	
		?>
		<style>
			<?php 
			require('style.php');
			echo $custom_css; ?>
		</style>
		<div id="tab_container_<?php echo $post_id; ?>" class="tab" role="tabpanel">
			<!-- Nav tabs -->
			<ul class="wpsm_nav wpsm_nav-tabs" role="tablist" id="myTab_<?php echo $post_id; ?>">
			<?php
				foreach($tabs_data as $tabs_single_data)
				{
					$tabs_title         = $tabs_single_data['tabs_title'];
					$tabs_desc          = $tabs_single_data['tabs_desc'];
					?>	
					<li role="presentation" <?php if($i==1){ ?> class="active" <?php } ?>>
						<a href="#tabs_desc_<?php echo $post_id; ?>_<?php echo $i; ?>" aria-controls="tabs_desc_<?php echo $post_id; ?>_<?php echo $i; ?>" role="tab" data-toggle="tab">
							<?php echo $tabs_title; ?>
						</a>
					</li>
				
					<?php $i++; 
				} ?>
			</ul>	
			<div class="tab-content" id="tab-content_<?php echo $post_id; ?>">
				<?php 
				foreach($tabs_data as $tabs_single_data)
				{
					$tabs_title  = $tabs_single_data['tabs_title'];
					$tabs_desc   = $tabs_single_data['tabs_desc'];
					?>
					<div role="tabpanel" class="tab-pane <?php if($j==1){ ?> in active <?php } ?>" id="tabs_desc_<?php echo $post_id; ?>_<?php echo $j; ?>">
						<?php
							$tabs_desc = str_replace('&nbsp;', ' <br />', $tabs_desc);
						  echo do_shortcode($tabs_desc); ?>
					</div>
					<?php 
					$j++; 
				} ?>
			
			</div>
		</div>
		<script>
			jQuery(function () 
			{
				jQuery('#myTab_<?php echo $post_id; ?> a:first').tab('show')
			});
					
			<?php if($tabs_animation!="None")
			{ ?>
				jQuery(function(){
					var b="<?php echo $tabs_animation ?>";
					var c;
					var a;
					d(jQuery("#myTab_<?php echo $post_id; ?> a"),jQuery("#tab-content_<?php echo $post_id; ?>"));function d(e,f,g){
						e.click(function(i){
							i.preventDefault();
							jQuery(this).tab("show");
							var h=jQuery(this).data("easein");
							if(c){c.removeClass(a);}
							if(h){f.find("div.active").addClass("animated "+h);a=h;}
							else{if(g){f.find("div.active").addClass("animated "+g);a=g;}else{f.find("div.active").addClass("animated "+b);a=b;}}c=f.find("div.active");
						});
					}
				});
				<?php 
			} ?>
		</script>
		<?php
	}
	else
	{
		echo "<h3> No tabs Found </h3>";
	}
endwhile;
?>