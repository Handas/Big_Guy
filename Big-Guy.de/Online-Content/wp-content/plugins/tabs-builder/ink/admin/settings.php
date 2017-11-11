<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
	$De_Settings = unserialize(get_option('Tabs_B_default_Settings'));
	$PostId = $post->ID;
	$Settings = unserialize(get_post_meta( $PostId, 'Tabs_B_Settings', true));
	$option_names = array(
			"title_bg_clr"   => $De_Settings['title_bg_clr'],
			"title_icon_clr" => $De_Settings['title_icon_clr'],
			"select_title_icon_clr" => $De_Settings['select_title_icon_clr'],
			"desc_font_clr"  => $De_Settings['desc_font_clr'],
			"border_top_color" => $De_Settings['border_top_color'],
			"select_expand_animation" => $De_Settings['select_expand_animation'],	
			"title_size"         => $De_Settings['title_size'],
			"des_size"     		 => $De_Settings['des_size'],
			"font_family"     	 => $De_Settings['font_family'],
			"tabs_styles"      => $De_Settings['tabs_styles'],
			"custom_css"      =>$De_Settings['custom_css'],
			"tabs_animation"      =>$De_Settings['tabs_animation'],
			"tabs_position"      =>$De_Settings['tabs_position'],
			"tabs_border_show" => $De_Settings['tabs_border_show'],
			"selected_tab_top_border_show" => $De_Settings['selected_tab_top_border_show'],
			"bottom_border_line" => $De_Settings['bottom_border_line'],
			"tabs_display_mode_mob" =>$De_Settings['tabs_display_mode_mob'],
		);
		
		foreach($option_names as $option_name => $default_value) 
		{
			if(isset($Settings[$option_name])) 
				${"" . $option_name}  = $Settings[$option_name];
			else
				${"" . $option_name}  = $default_value;
		}

?>
<Script>

 //minimum flake size script
  jQuery(function() {
    jQuery( "#title_size_id" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 22,
		min:8,
		slide: function( event, ui ) {
		jQuery( "#title_size" ).val( ui.value );
      }
		});
		
		jQuery( "#title_size_id" ).slider("value",<?php echo $title_size; ?> );
		jQuery( "#title_size" ).val( jQuery( "#title_size_id" ).slider( "value") );
    
  });
</script>

<Script>

 //minimum flake size script
  jQuery(function() {
    jQuery( "#title_size_id" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 22,
		min:8,
		slide: function( event, ui ) {
		jQuery( "#title_size" ).val( ui.value );
      }
		});
		
		jQuery( "#title_size_id" ).slider("value",<?php if(isset($title_size)){ echo $title_size; } else{ echo 14; } ?> );
		jQuery( "#title_size" ).val( jQuery( "#title_size_id" ).slider( "value") );
    
  });
</script>

<Script>

 //minimum flake size script
  jQuery(function() 
  {
    jQuery( "#des_size_id" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 30,
		min:5,
		slide: function( event, ui ) {
		jQuery( "#des_size" ).val( ui.value );
      }
		});
		jQuery( "#des_size_id" ).slider("value",<?php if(isset($des_size)){ echo $des_size; } else{ echo 16; } ?>);
		jQuery( "#des_size" ).val( jQuery( "#des_size_id" ).slider( "value") );
    
  });
</script>  
<Script>
function wpsm_update_default()
{
	 jQuery.ajax({
		url: location.href,
		type: "POST",
		data : {
			    'action123':'default_settins_action',
			     },
                success : function(data){
									alert("Default Settings Updated");
									location.reload(true);
                                   }	
	});
	
}
</script>

<?php
if(isset($_POST['action123']) == "default_settins_action")
	{
		$Settings_Array2 = serialize( array(
				"title_bg_clr"   => $title_bg_clr,
				"title_icon_clr" => $title_icon_clr,
				"select_title_icon_clr" => $select_title_icon_clr,
				"desc_bg_clr"    => $desc_bg_clr,
				"desc_font_clr"  => $desc_font_clr,
				"border_top_color" => $border_top_color,
				"select_expand_animation" =>$select_expand_animation,
				"title_size"         => $title_size,
				"des_size"     		 => $des_size,
				"font_family"     	 => $font_family,
				"tabs_styles"      =>$tabs_styles,
				"custom_css"      =>$custom_css,
				"tabs_animation"      =>$tabs_animation,
				"tabs_position"      =>$tabs_position,
				"bottom_border_line" => $bottom_border_line,
				"tabs_border_show" =>  $tabs_border_show,
				"selected_tab_top_border_show" =>  $selected_tab_top_border_show,
				"tabs_display_mode_mob" =>$tabs_display_mode_mob,
		
				) );

			update_option('Tabs_B_default_Settings', $Settings_Array2);
}

 ?>
 
<input type="hidden" id="tabs_setting_save_action" name="tabs_setting_save_action" value="tabs_setting_save_action">
	
<table class="form-table acc_table">
	<tbody>
		
		
		<tr >
			<th scope="row"><label><?php _e('Tabs Title Button Background Color',wpsm_tabs_b_text_domain); ?></label></th>
			<td>
				<input id="title_bg_clr" name="title_bg_clr" type="text" value="<?php echo $title_bg_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#tabs_r_title_bg_clr_tp">help</a>
				<div id="tabs_r_title_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Change Tabs Title Button Background Color Here',wpsm_tabs_b_text_domain); ?></h2>
						<img src="<?php echo wpsm_tabs_b_directory_url.'assets/tooltip/img/title-bg-color.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr >
			<th scope="row"><label><?php _e('Tabs Title Button Font Color',wpsm_tabs_b_text_domain); ?></label></th>
			<td>
				<input id="title_icon_clr" name="title_icon_clr" type="text" value="<?php echo $title_icon_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#tabs_r_title_icon_clr_tp">help</a>
				<div id="tabs_r_title_icon_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Change Tabs Title Button Font Color Here',wpsm_tabs_b_text_domain); ?></h2>
						<img src="<?php echo wpsm_tabs_b_directory_url.'assets/tooltip/img/title-color.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr >
			<th scope="row"><label><?php _e('Selected Tabs Title Button Font Colour',wpsm_tabs_b_text_domain); ?></label></th>
			<td>
				<input id="select_tabs_title_icon_clr" name="select_title_icon_clr" type="text" value="<?php echo $select_title_icon_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#tabs_r_sel_icon_clr_tp">help</a>
				<div id="tabs_r_sel_icon_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Selected/Open Tabs Title Button Font Colour',wpsm_tabs_b_text_domain); ?></h2>
						<img src="<?php echo wpsm_tabs_b_directory_url.'assets/tooltip/img/sel-title-color.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr >
			<th scope="row"><label><?php _e('Tabs Description Font Colour',wpsm_tabs_b_text_domain); ?></label></th>
			<td>
				<input id="tabs_desc_font_clr" name="desc_font_clr" type="text" value="<?php echo $desc_font_clr; ?>" class="my-color-field" data-default-color="#000000" />
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#tabs_r_desc_font_clr_tp">help</a>
				<div id="tabs_r_desc_font_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Tabs Description Font Colour',wpsm_tabs_b_text_domain); ?></h2>
						<img src="<?php echo wpsm_tabs_b_directory_url.'assets/tooltip/img/desc-color.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr >
			<th scope="row"><label><?php _e('Selected Tabs Button Top Border Color',wpsm_tabs_b_text_domain); ?></label></th>
			<td>
				<input id="border_top_color" name="border_top_color" type="text" value="<?php echo $border_top_color; ?>" class="my-color-field" />
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#border_top_color_tp">help</a>
				<div id="border_top_color_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Chnage Selected Tabs Button Top Border Color Here',wpsm_tabs_b_text_domain); ?></h2>
						<img src="<?php echo wpsm_tabs_b_directory_url.'assets/tooltip/img/top-border-color.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
					
		<tr class="setting_color">
			<th><?php _e('Tabs Title Button Font Size',wpsm_tabs_b_text_domain); ?> </th>
			<td>
				<div id="title_size_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="title_size" name="title_size"  readonly="readonly">
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#title_size_tp">help</a>
				<div id="title_size_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;">You can update Tabs Title Font Size from here. Just Scroll it to change size.</h2>
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr class="setting_color">
			<th><?php _e('Tabs Description Button Font Size',wpsm_tabs_b_text_domain); ?> </th>
			<td>
				<div id="des_size_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="des_size" name="des_size"  readonly="readonly">
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#des_size_tp">help</a>
				<div id="des_size_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;">You can update Tabs Description/content Font Size from here. Just Scroll it to change size.</h2>
						
					</div>
		    	</div>
			</td>
		</tr>
		<tr >
			<th><?php _e('Font Style/Family',wpsm_tabs_b_text_domain); ?> </th>
			<td>
				<select name="font_family" id="font_family" class="standard-dropdown" style="width:100%" >
					<optgroup label="Default Fonts">
						<option value="Arial"           <?php if($font_family == 'Arial' ) { echo "selected"; } ?>>Arial</option>
						<option value="Arial Black"    <?php if($font_family == 'Arial Black' ) { echo "selected"; } ?>>Arial Black</option>
						<option value="Courier New"     <?php if($font_family == 'Courier New' ) { echo "selected"; } ?>>Courier New</option>
						<option value="Georgia"         <?php if($font_family == 'Georgia' ) { echo "selected"; } ?>>Georgia</option>
						<option value="Grande"          <?php if($font_family == 'Grande' ) { echo "selected"; } ?>>Grande</option>
						<option value="Helvetica" 	<?php if($font_family == 'Helvetica' ) { echo "selected"; } ?>>Helvetica Neue</option>
						<option value="Impact"         <?php if($font_family == 'Impact' ) { echo "selected"; } ?>>Impact</option>
						<option value="Lucida"         <?php if($font_family == 'Lucida' ) { echo "selected"; } ?>>Lucida</option>
						<option value="Lucida Grande"         <?php if($font_family == 'Lucida Grande' ) { echo "selected"; } ?>>Lucida Grande</option>
						<option value="Open Sans"   <?php if($font_family == 'Open Sans' ) { echo "selected"; } ?>>Open Sans</option>
						<option value="OpenSansBold"   <?php if($font_family == 'OpenSansBold' ) { echo "selected"; } ?>>OpenSansBold</option>
						<option value="Palatino Linotype"       <?php if($font_family == 'Palatino Linotype' ) { echo "selected"; } ?>>Palatino</option>
						<option value="Sans"           <?php if($font_family == 'Sans' ) { echo "selected"; } ?>>Sans</option>
						<option value="sans-serif"           <?php if($font_family == 'sans-serif' ) { echo "selected"; } ?>>Sans-Serif</option>
						<option value="Tahoma"         <?php if($font_family == 'Tahoma' ) { echo "selected"; } ?>>Tahoma</option>
						<option value="Times New Roman"          <?php if($font_family == 'Times New Roman' ) { echo "selected"; } ?>>Times New Roman</option>
						<option value="Trebuchet"      <?php if($font_family == 'Trebuchet' ) { echo "selected"; } ?>>Trebuchet</option>
						<option value="Verdana"        <?php if($font_family == 'Verdana' ) { echo "selected"; } ?>>Verdana</option>
					</optgroup>
				</select>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#font_family_tp">help</a>
				<div id="font_family_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;">You can update Tabs Title and Description Font Family/Style from here. Select any one form these options.</h2>
					
					</div>
		    	</div>
			</td>
		</tr>
		
		
		<tr>
			<th scope="row"><label><?php _e('Tabs Button Styles',wpsm_tabs_b_text_domain); ?></label></th>
			<td>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="tabs_styles" id="tabs_styles" value="1" <?php if($tabs_styles == '1' ) { echo "checked"; } ?> /> Default </span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="tabs_styles" id="tabs_styles" value="2" <?php if($tabs_styles == '2' ) { echo "checked"; } ?>  /> Soft </span>
				<span style="display:block"><input type="radio" name="tabs_styles" id="tabs_styles" value="3"  <?php if($tabs_styles == '3' ) { echo "checked"; } ?> /> Noise </span>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#tabs_r_styles_tp">help</a>
				<div id="tabs_r_styles_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Update your Tab button overlay Styles from here',wpsm_tabs_b_text_domain); ?></h2>
						</div>
		    	</div>
			</td>
		</tr>
		
		
		
		<tr >
			<th><?php _e('Tabs Description Animation',wpsm_tabs_b_text_domain); ?> </th>
			<td>
				<select name="tabs_animation" id="tabs_animation" class="standard-dropdown" style="width:100%" >
						<option value="fadeIn"           <?php if($tabs_animation == 'fadeIn' ) { echo "selected"; } ?>>Fade Animation</option>
						<option value="fadeInUp"     <?php if($tabs_animation == 'fadeInUp' ) { echo "selected"; } ?>>Fade In Up Animation</option>
						<option value="fadeInDown"         <?php if($tabs_animation == 'fadeInDown' ) { echo "selected"; } ?>>Fade In Down Animation</option>
						<option value="None"         <?php if($tabs_animation == 'None' ) { echo "selected"; } ?>>No Animation</option>
					
				</select>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#tabs_r_animation">help</a>
				<div id="tabs_r_animation" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;">Animation your tabs content on click , select your animation form here</h2>
					</div>
		    	</div>
			</td>
		</tr>
		
		
		
		<tr>
			<th scope="row"><label><?php _e('Tabs Button Position ',wpsm_tabs_b_text_domain); ?></label></th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="tabs_position" value="left" id="enable_tabs_position" <?php if($tabs_position == 'left' ) { echo "checked"; } ?>  >
					<label for="enable_tabs_position" class="switch-label switch-label-off"><?php _e('left',wpsm_tabs_b_text_domain); ?></label>
					<input type="radio" class="switch-input" name="tabs_position" value="right" id="disable_tabs_position" <?php if($tabs_position == 'right' ) { echo "checked"; } ?> >
					<label for="disable_tabs_position" class="switch-label switch-label-on"><?php _e('right',wpsm_tabs_b_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#tabs_r_pos">help</a>
				<div id="tabs_r_pos" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Align Your Tabs button position in tab group here',wpsm_tabs_b_text_domain); ?></h2>
						
					</div>
		    	</div>
			</td>
		</tr>
		
		
		
		<tr>
			<th scope="row"><label><?php _e('Display tabs Button Group Bottom Border Line ',wpsm_tabs_b_text_domain); ?></label></th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="bottom_border_line" value="yes" id="enable_bottom_border_line" <?php if($bottom_border_line == 'yes' ) { echo "checked"; } ?>   >
					<label for="enable_bottom_border_line" class="switch-label switch-label-off"><?php _e('Yes',wpsm_tabs_b_text_domain); ?></label>
					<input type="radio" class="switch-input" name="bottom_border_line" value="no" id="disable_bottom_border_line"  <?php if($bottom_border_line == 'no' ) { echo "checked"; } ?> >
					<label for="disable_bottom_border_line" class="switch-label switch-label-on"><?php _e('No',wpsm_tabs_b_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#bottom_border_line_tp">help</a>
				<div id="bottom_border_line_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Display tabs Button Group Bottom Border Line ',wpsm_tabs_b_text_domain); ?></h2>
						<img src="<?php echo wpsm_tabs_b_directory_url.'assets/tooltip/img/bottom-border.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Tabs Button Border Show',wpsm_tabs_b_text_domain); ?></label></th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="tabs_border_show" value="yes" id="enable_tabs_border_show" <?php if($tabs_border_show == 'yes' ) { echo "checked"; } ?>   >
					<label for="enable_tabs_border_show" class="switch-label switch-label-off"><?php _e('Yes',wpsm_tabs_b_text_domain); ?></label>
					<input type="radio" class="switch-input" name="tabs_border_show" value="no" id="disable_tabs_border_show"  <?php if($tabs_border_show == 'no' ) { echo "checked"; } ?> >
					<label for="disable_tabs_border_show" class="switch-label switch-label-on"><?php _e('No',wpsm_tabs_b_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#tabs_border_show_tp">help</a>
				<div id="tabs_border_show_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Tabs Button Border Show ',wpsm_tabs_b_text_domain); ?></h2>
						<img src="<?php echo wpsm_tabs_b_directory_url.'assets/tooltip/img/tab-border.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Selected Tab Button Top Border Show',wpsm_tabs_b_text_domain); ?></label></th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="selected_tab_top_border_show" value="yes" id="enable_selected_tab_top_border_show" <?php if($selected_tab_top_border_show == 'yes' ) { echo "checked"; } ?>   >
					<label for="enable_selected_tab_top_border_show" class="switch-label switch-label-off"><?php _e('Yes',wpsm_tabs_b_text_domain); ?></label>
					<input type="radio" class="switch-input" name="selected_tab_top_border_show" value="no" id="disable_selected_tab_top_border_show"  <?php if($selected_tab_top_border_show == 'no' ) { echo "checked"; } ?> >
					<label for="disable_selected_tab_top_border_show" class="switch-label switch-label-on"><?php _e('No',wpsm_tabs_b_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#selected_tab_top_border_showtp">help</a>
				<div id="selected_tab_top_border_showtp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Selected Tab Button Top Border Show ',wpsm_tabs_b_text_domain); ?></h2>
						<img src="<?php echo wpsm_tabs_b_directory_url.'assets/tooltip/img/top-border-color.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Selected Tabs Button Expand Animation',wpsm_tabs_b_text_domain); ?></label></th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="select_expand_animation" value="yes" id="enable_select_expand_animation" <?php if($select_expand_animation == 'yes' ) { echo "checked"; } ?>  >
					<label for="enable_select_expand_animation" class="switch-label switch-label-off"><?php _e('Yes',wpsm_tabs_b_text_domain); ?></label>
					<input type="radio" class="switch-input" name="select_expand_animation" value="no" id="disable_select_expand_animation" <?php if($select_expand_animation == 'no' ) { echo "checked"; } ?> >
					<label for="disable_select_expand_animation" class="switch-label switch-label-on"><?php _e('No',wpsm_tabs_b_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#select_expand_animation_tp">help</a>
				<div id="select_expand_animation_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('You can enable disable expand animation of tab button here ',wpsm_tabs_b_text_domain); ?></h2>
						
					</div>
		    	</div>
			</td>
		</tr>
		
		
		
		<tr>
			<th scope="row"><label><?php _e('Title Display Mode In Mobile',wpsm_tabs_b_text_domain); ?></label></th>
			<td>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="tabs_display_mode_mob" id="tabs_display_mode_mob" value="1" <?php if($tabs_display_mode_mob == '1' ) { echo "checked"; } ?> /> Display As a tabs  </span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="tabs_display_mode_mob" id="tabs_display_mode_mob" value="2" <?php if($tabs_display_mode_mob == '2' ) { echo "checked"; } ?>  /> Display  As A vertical Button </span>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#tabs_display_mode_mob_tp">help</a>
				<div id="tabs_display_mode_mob_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Display Your Title as Vertical Button or as tabs in Mobile',wpsm_tabs_b_text_domain); ?></h2>
						<img src="<?php echo wpsm_tabs_b_directory_url.'assets/tooltip/img/mobile-2.png'; ?>">
						
						<img src="<?php echo wpsm_tabs_b_directory_url.'assets/tooltip/img/mobile-1.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		<script>
		
		jQuery('.ac_tooltip').darkTooltip({
				opacity:1,
				gravity:'east',
				size:'small'
			});
			

		</script>
	</tbody>
</table>