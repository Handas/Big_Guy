<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
#tab_container_<?php echo $post_id; ?> 
{
	width:100%;
	margin-bottom:30px;
}

#tab_container_<?php echo $post_id; ?> .tab-content
{
	padding:10px;
	margin-top: 0px;
	background-color: transparent !important;
	color: <?php echo $desc_font_clr; ?> !important;
	font-size:<?php echo $des_size; ?>px !important;
	font-family: <?php echo $font_family; ?> !important;
	overflow:hidden !important;
	border: 0px !important;
	
}
#tab_container_<?php echo $post_id; ?> .tab-content .tab-pane
{
	color: <?php echo $desc_font_clr; ?> !important;
	font-size:<?php echo $des_size; ?>px !important;
	font-family: <?php echo $font_family; ?> !important;
	line-height:1.4 !important;
}

#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs 
{
 <?php 
if($bottom_border_line == "yes")
	{?>
		border-bottom: 1px solid #ddd !important; 
	<?php
	}
	else 
	{?>
		border-bottom: 0px solid #ddd !important;
	 <?php
	}?>
}
#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs > li > a
{
	outline:none !important;
}
#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs > li.active > a, #tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs > li.active > a:hover, #tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs > li.active > a:focus {
	color: <?php echo $select_title_icon_clr; ?> !important;
	cursor: default;
	background-color: transparent !important;
	border-bottom: 0px !important;
	<?php 
	if($selected_tab_top_border_show == "yes")
	{?>
		border-top: 3px solid <?php echo $border_top_color?> !important;
		<?php
	}
	else 
	{?>
		border-top: 0px solid <?php echo $border_top_color?> !important;
	<?php
	}?>
}

#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs > li > a {
    margin: 0px !important; 
    line-height: 1.42857143 !important;
	<?php
	if($tabs_border_show =="no")
	{?>
		border: 0px solid #ccc !important;
		<?php 
	}
	else
	{?>
		border: 1px solid #ccc !important;
		<?php 
	}?>
    border-radius: 0px 0px 0 0 !important; 
	background-color: <?php echo $title_bg_clr; ?> !important;
	color: <?php echo $title_icon_clr; ?> !important;
	padding: 12px 22px 12px 22px !important;
	font-weight: normal;
	transition: all 0.3s ease-in 0s;
	text-decoration: none !important;
	font-size: <?php echo $title_size; ?>px !important;
	text-align:center !important;
	
	font-family: <?php echo $font_family; ?> !important;
}


#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs > li > a:before {
	display:none !important;
}
#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs > li > a:after {
	display:none !important ;
}
#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs > li{
padding:0px !important ;
margin:0px;
}


#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs > li > a .fa{

margin-right:5px !important;

margin-left:5px !important;


}


#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs > li {
    float: <?php echo $tabs_position; ?>;
    margin-bottom: -1px !important;
	margin-right:0px !important; 
}



@media (min-width: 769px) {

	#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs > li{
	float:<?php echo $tabs_position; ?> !important ;
	<?php if($tabs_position=="left"){ ?>
	margin-right:-1px !important;
	<?php } ?>
	<?php if($tabs_position=="right"){ ?>
	margin-left:-1px !important;
	<?php } ?>
	}
	#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs{
	float:none !important;
	margin:0px !important;
	}

	
	

}



.wpsm_nav-tabs li:before{
display:none !important;
}

@media (max-width: 768px) {
	
	.wpsm_nav-tabs{
		margin-left:0px !important;
		margin-right:0px !important; 
		
	}
	<?php if($tabs_display_mode_mob == "2") { ?>
	#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs > li{
		float:none !important;
	}
	<?php } ?>
}

	<?php if($select_expand_animation=="no")
	{ ?>
		#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs li.active a,
		#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs li.active a:focus,
		#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs li.active a:hover
		{
		border-top: 3px solid #00b0ad;
		border-right: 1px solid #d3d3d3;
		margin-top: 0px;
		color: #444;
		padding: 18px 12px;
		border-bottom:0px !important;
		box-shadow:none;
		}
		<?php 
	} 
	else 
	{ ?>
		#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs li.active a,
		#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs li.active a:focus,
		#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs li.active a:hover{
		border-top: 3px solid #00b0ad;
		border-right: 1px solid #d3d3d3;
		-webkit-transform: scaleY(1.2) translateY(-5px);
		-ms-transform: scaleY(1.2) translateY(-5px);
		transform: scaleY(1.2) translateY(-5px);
		color: #444;
		padding: 18px 12px;
		border-bottom:0px !important;
		box-shadow:none;
		}
		<?php  
	} ?>
	
	
	<?php 
 switch($tabs_styles){
		case "1":
		?>
		#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs a{
			background-image: url('');
			background-position: 0 0;
			background-repeat: repeat-x;
		}
		<?php
		break;
		case "2":
		 ?>
		#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs a{
			background-image: url(<?php echo wpsm_tabs_b_directory_url.'assets/images/style-soft.png'; ?>);
			background-position: 0 0;
			background-repeat: repeat-x;
		}
		<?php
		break;
		case "3":
		?>
		#tab_container_<?php echo $post_id; ?> .wpsm_nav-tabs a{
			background-image: url(<?php echo wpsm_tabs_b_directory_url.'assets/images/style-noise.png'; ?>);
			background-position: 0 0;
			background-repeat: repeat-x;
			}
		<?php
		break;
	}
	?>	
