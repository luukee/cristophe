<?php
if ( is_store_notice_showing() ) {
		remove_action( 'woocommerce_proceed_to_checkout','woocommerce_button_proceed_to_checkout', 20);
		echo '<style>
				ul#menu-new-shop-menu li.menu-item-type-post_type:nth-child(2) {
					display: none;
				}
				.woocommerce button.button, .woocommerce-page button.button, .woocommerce-page input[type=submit],
				a.checkout-button.button.alt.wc-forward {
					pointer-events: none;
					opacity: 0.5;
					text-decoration: line-through;
				}
				.woocommerce div.product .cart {
					position: relative;
				}
				.woocommerce div.product .cart:hover::after {
					content: "Down for maintenance";
					position: absolute;
					width: auto;
					height: auto;
					font-size: 14px;
					left: 0;
					top: -60px;
					color: white;
					padding: 1em;
					background: #b6364b;
				}
			</style>
		';
	} else {
		echo '
		<p class="woocommerce-store-notice demo_store" data-notice-id="1a7c467c78ca698a1e489a1cdaeefee4" style="">
		Dear Customer,<br><br>
		Our website will be closed for upgrades at our warehouse from Monday, November 14th through Friday, November 18th.
		Cristophe Professional Products will be available again on our website starting Saturday, November 19th at 12:00am.<br><br>
		We apologize for any inconvenience.
		<br><br>
		Cristophe Professional<br>
		Management<br>
		<a href="#" class="woocommerce-store-notice__dismiss-link">Dismiss</a></p>
		';
	}
// custom
	global $qode_options_proya;
	$page_id = qode_get_page_id();
$content_bottom_area = "yes";
if(get_post_meta($page_id, "qode_enable_content_bottom_area", true) != ""){
	$content_bottom_area = get_post_meta($page_id, "qode_enable_content_bottom_area", true);
} else{
	if (isset($qode_options_proya['enable_content_bottom_area'])) {
		$content_bottom_area = $qode_options_proya['enable_content_bottom_area'];
	}
}
$content_bottom_area_sidebar = "";
if(get_post_meta($page_id, 'qode_choose_content_bottom_sidebar', true) != ""){
	$content_bottom_area_sidebar = get_post_meta($page_id, 'qode_choose_content_bottom_sidebar', true);
} else {
	if(isset($qode_options_proya['content_bottom_sidebar_custom_display'])) {
		$content_bottom_area_sidebar = $qode_options_proya['content_bottom_sidebar_custom_display'];
	}
}
$content_bottom_area_in_grid = true;
if(get_post_meta($page_id, 'qode_content_bottom_sidebar_in_grid', true) != ""){
	if(get_post_meta($page_id, 'qode_content_bottom_sidebar_in_grid', true) == "yes") {
		$content_bottom_area_in_grid = true;
	} else {
		$content_bottom_area_in_grid = false;
	} 
}
else {
	if(isset($qode_options_proya['content_bottom_in_grid'])){if ($qode_options_proya['content_bottom_in_grid'] == "no") $content_bottom_area_in_grid = false;}
}
$content_bottom_background_color = '';
if(get_post_meta($page_id, "qode_content_bottom_background_color", true) != ""){
	$content_bottom_background_color = get_post_meta($page_id, "qode_content_bottom_background_color", true);
}
?>
	<?php if($content_bottom_area == "yes") { ?>
	<?php if($content_bottom_area_in_grid){ ?>
		<div class="container">
			<div class="container_inner clearfix">
	<?php } ?>
		<div class="content_bottom" <?php if($content_bottom_background_color != ''){ echo 'style="background-color:'.$content_bottom_background_color.';"'; } ?>>
			<?php dynamic_sidebar($content_bottom_area_sidebar); ?>
		</div>
		<?php if($content_bottom_area_in_grid){ ?>
					</div>
				</div>
			<?php } ?>
	<?php } ?>
	
	</div>
</div>

<?php
if(isset($qode_options_proya['paspartu']) && $qode_options_proya['paspartu'] == 'yes'){?>
        <?php if(isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] == "yes" && isset($qode_options_proya['vertical_menu_inside_paspartu']) && $qode_options_proya['vertical_menu_inside_paspartu'] == 'no') { ?>
        </div> <!-- paspartu_middle_inner close div -->
        <?php } ?>
    </div> <!-- paspartu_inner close div -->
    <?php if((isset($qode_options_proya['paspartu_on_bottom']) && $qode_options_proya['paspartu_on_bottom'] == 'yes') ||
        (isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] == "yes" && isset($qode_options_proya['vertical_menu_inside_paspartu']) && $qode_options_proya['vertical_menu_inside_paspartu'] == 'yes')){ ?>
        <div class="paspartu_bottom"></div>
    <?php }?>
    </div> <!-- paspartu_outer close div -->
<?php
}
?>

<?php

$footer_classes_array = array();
$footer_classes = '';

$paspartu = false;
if(isset($qode_options_proya['paspartu']) && $qode_options_proya['paspartu'] == 'yes'){
    $paspartu = true;
}

if(isset($qode_options_proya['paspartu']) && $qode_options_proya['paspartu'] == 'yes' && isset($qode_options_proya['paspartu_footer_alignment']) && $qode_options_proya['paspartu_footer_alignment'] == 'yes'){
    $footer_classes_array[]= 'paspartu_footer_alignment';
}

if(isset($qode_options_proya['uncovering_footer']) && $qode_options_proya['uncovering_footer'] == "yes" && $paspartu == false){
    $footer_classes_array[] = 'uncover';
}

$display_footer_top = true;

/*$footer_top_per_page_option = get_post_meta($page_id, "footer_top_per_page", true);
if(!empty($footer_top_per_page_option)){
	$footer_top_per_page = $footer_top_per_page_option;
}


if (isset($qode_options_proya['show_footer_top'])) {
	if ($qode_options_proya['show_footer_top'] == "no" && $footer_top_per_page_option == 'no') $display_footer_top = false;
}*/

$display_footer_text = true;

/*if (isset($qode_options_proya['footer_text'])) {
	if ($qode_options_proya['footer_text'] == "yes") $display_footer_text = true;
}*/

//is some class added to footer classes array?
if(is_array($footer_classes_array) && count($footer_classes_array)) {
    //concat all classes and prefix it with class attribute
    $footer_classes = esc_attr(implode(' ', $footer_classes_array));
}

?>

<?php if($display_footer_top || $display_footer_text) { ?>
	<footer <?php echo qode_get_inline_attr($footer_classes, 'class'); ?>>
		<div class="footer_inner clearfix">
		<?php
		$footer_in_grid = true;
		if(isset($qode_options_proya['footer_in_grid'])){
			if ($qode_options_proya['footer_in_grid'] != "yes") {
				$footer_in_grid = false;
			}
		}

		
		$footer_top_columns = 4;
		if (isset($qode_options_proya['footer_top_columns'])) {
			$footer_top_columns = $qode_options_proya['footer_top_columns'];
		}

        $footer_top_border_color = !empty($qode_options_proya['footer_top_border_color']) ? $qode_options_proya['footer_top_border_color'] : '';
        $footer_top_border_width = isset($qode_options_proya['footer_top_border_width']) && $qode_options_proya['footer_top_border_width'] !== '' ? $qode_options_proya['footer_top_border_width'].'px' : '1px';
        $footer_top_border_in_grid = 'no';
        $footer_top_border_in_grid_class = '';

        if(isset($qode_options_proya['footer_top_border_in_grid'])) {
            $footer_top_border_in_grid = $qode_options_proya['footer_top_border_in_grid'];
            $footer_top_border_in_grid_class = $footer_top_border_in_grid == 'yes' ? 'in_grid' : '';
        }

        $footer_top_border_style = array();
        if($footer_top_border_color !== '') {
            $footer_top_border_style[] = 'background-color: '.$footer_top_border_color;
        }

        if($footer_top_border_width !== '') {
            $footer_top_border_style[] = 'height: '.$footer_top_border_width;
        }

		if($display_footer_top) { ?>
		<div class="footer_top_holder">
            <?php if($footer_top_border_color !== '') { ?>
                <div <?php qode_inline_style($footer_top_border_style); ?> <?php qode_class_attribute('footer_top_border '.$footer_top_border_in_grid_class); ?>></div>
            <?php } ?>
			<div class="footer_top<?php if(!$footer_in_grid) {echo " footer_top_full";} ?>">
				<?php if($footer_in_grid){ ?>
				<div class="container">
					<div class="container_inner">
				<?php } ?>
						<?php switch ($footer_top_columns) { 
							case 6:
						?>
							<div class="two_columns_50_50 clearfix">
								<div class="column1 footer_col1">
										<div class="column_inner">
											<?php dynamic_sidebar( 'footer_column_1' ); ?>
										</div>
								</div>
								<div class="column2">
									<div class="column_inner">
										<div class="two_columns_50_50 clearfix">
											<div class="column1 footer_col2">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_2' ); ?>
												</div>
											</div>
											<div class="column2 footer_col3">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_3' ); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>							
						<?php 
							break;
							case 5:
						?>
							<div class="two_columns_50_50 clearfix">
								<div class="column1">
									<div class="column_inner">
										<div class="two_columns_50_50 clearfix">
											<div class="column1 footer_col1">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_1' ); ?>
												</div>
											</div>
											<div class="column2 footer_col2">
												<div class="column_inner">
													<?php dynamic_sidebar( 'footer_column_2' ); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="column2 footer_col3">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_3' ); ?>
									</div>
								</div>
							</div>							
						<?php 
							break;
							case 4:
						?>
							<div class="four_columns clearfix">
								<div class="column1 footer_col1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="column2 footer_col2">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_2' ); ?>
									</div>
								</div>
								<div class="column3 footer_col3">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_3' ); ?>
									</div>
								</div>
								<div class="column4 footer_col4">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_4' ); ?>
									</div>
								</div>
							</div>
						<?php
							break;
							case 3:
						?>
							<div class="three_columns clearfix">
								<div class="column1 footer_col1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="column2 footer_col2">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_2' ); ?>
									</div>
								</div>
								<div class="column3 footer_col3">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_3' ); ?>
									</div>
								</div>
							</div>
						<?php
							break;
							case 2:
						?>
							<div class="two_columns_50_50 clearfix">
								<div class="column1 footer_col1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="column2 footer_col2">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_2' ); ?>
									</div>
								</div>
							</div>
						<?php
							break;
							case 1:
								dynamic_sidebar( 'footer_column_1' );
							break;
						}
						?>
				<?php if($footer_in_grid){ ?>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php if (isset($qode_options_proya['footer_angled_section'])  && $qode_options_proya['footer_angled_section'] == "yes"){ ?>
				<svg class="angled-section svg-footer-bottom" preserveAspectRatio="none" viewBox="0 0 86 86" width="100%" height="86">
					<?php if(isset($qode_options_proya['footer_angled_section_direction']) && $qode_options_proya['footer_angled_section_direction'] == 'from_left_to_right'){ ?>
						<polygon points="0,0 0,86 86,86" />
					<?php }
					if(isset($qode_options_proya['footer_angled_section_direction']) && $qode_options_proya['footer_angled_section_direction'] == 'from_right_to_left'){ ?>
						<polygon points="0,86 86,0 86,86" />
					<?php } ?>
				</svg>
			<?php } ?>
		</div>
		<?php } ?>
		<?php


		$footer_bottom_columns = 1;
		if (isset($qode_options_proya['footer_bottom_columns'])) {
			$footer_bottom_columns = $qode_options_proya['footer_bottom_columns'];
		}

		$footer_bottom_in_grid = false;
		if(isset($qode_options_proya['footer_bottom_in_grid'])){
			if ($qode_options_proya['footer_bottom_in_grid'] == "yes") {
				$footer_bottom_in_grid = true;
			}
		}

        $footer_bottom_border_color = !empty($qode_options_proya['footer_bottom_border_color']) ? $qode_options_proya['footer_bottom_border_color'] : '';
        $footer_bottom_border_width = isset($qode_options_proya['footer_bottom_border_width']) && $qode_options_proya['footer_bottom_border_width'] !== '' ? $qode_options_proya['footer_bottom_border_width'].'px' : '1px';
        $footer_bottom_border_in_grid = 'no';
        $footer_bottom_border_in_grid_class = '';

        if(isset($qode_options_proya['footer_bottom_border_in_grid'])) {
            $footer_bottom_border_in_grid = $qode_options_proya['footer_bottom_border_in_grid'];
            $footer_bottom_border_in_grid_class = $footer_bottom_border_in_grid == 'yes' ? 'in_grid' : '';
        }

        $footer_bottom_border_style = array();
        if($footer_bottom_border_color !== '') {
            $footer_bottom_border_style[] = 'background-color: '.$footer_bottom_border_color;
        }

        if($footer_bottom_border_width !== '') {
            $footer_bottom_border_style[] = 'height: '.$footer_bottom_border_width;
        }

		if($display_footer_text){ ?>
			<div class="footer_bottom_holder">
                <?php if($footer_bottom_border_color !== '') { ?>
                    <div <?php qode_inline_style($footer_bottom_border_style); ?> <?php qode_class_attribute('footer_bottom_border '.$footer_bottom_border_in_grid_class); ?>></div>
                <?php } ?>
				<?php if($footer_bottom_in_grid){ ?>
				<div class="container">
					<div class="container_inner">
				<?php } ?>
		<?php
			switch ($footer_bottom_columns) {
			case 1:
			?>
			<div class="footer_bottom">
				<?php dynamic_sidebar( 'footer_text' ); ?>
			</div>
		<?php
			break;
			case 2:
		?>
				<div class="two_columns_50_50 footer_bottom_columns clearfix">
					<div class="column1 footer_bottom_column">
						<div class="column_inner">
							<div class="footer_bottom">
								<?php dynamic_sidebar( 'footer_text_left' ); ?>
							</div>
						</div>
					</div>
					<div class="column2 footer_bottom_column">
						<div class="column_inner">
							<div class="footer_bottom">
								<?php dynamic_sidebar( 'footer_text_right' ); ?>
							</div>
						</div>
					</div>
				</div>
				<?php
			break;
			case 3:
		?>
				<div class="three_columns footer_bottom_columns clearfix">
					<div class="column1 footer_bottom_column">
						<div class="column_inner">
							<div class="footer_bottom">
								<?php dynamic_sidebar( 'footer_text_left' ); ?>
							</div>
						</div>
					</div>
					<div class="column2 footer_bottom_column">
						<div class="column_inner">
							<div class="footer_bottom">
								<?php dynamic_sidebar( 'footer_text' ); ?>
							</div>
						</div>
					</div>
					<div class="column3 footer_bottom_column">
						<div class="column_inner">
							<div class="footer_bottom">
								<?php dynamic_sidebar( 'footer_text_right' ); ?>
							</div>
						</div>
					</div>
				</div>
		<?php
			break;
			default:
		?>
				<div class="footer_bottom">
					<?php dynamic_sidebar( 'footer_text' ); ?>
				</div>
		<?php break; ?>
		<?php } ?>
			<?php if($footer_bottom_in_grid){ ?>
				</div>
			</div>
			<?php } ?>
			</div>
		<?php } ?>
		</div>
	</footer>
	<?php } ?>
	
</div>
</div>
<?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 


?>

<span id="url-seqment" style="display:none;"><?php echo $uriSegments[2];?></span>

<?php //print_r($_SERVER['HTTP_REFERER']); 
if($uriSegments[2]=='')
{
	$url = $uriSegments[1];
} else {
	$url = $uriSegments[2];
}

?>

<script>
jQuery(document).ready(function(){
	
jQuery('#appointment-btn').attr('href','<?php echo home_url();?>/request-an-appointment?stylist=<?php echo $url;?>');
jQuery('#back-to-team-page').attr('href','<?php echo $_SERVER['HTTP_REFERER'];?>');
	
});

</script>

<script>

	

jQuery( ".footer_top #menu-item-146" ).hover(
  function() {
	var heightSubMenu = jQuery(this).children('.sub-menu').height()+10;
	if(heightSubMenu != null || heightSubMenu != ''){
		var hght = heightSubMenu+'px';
		jQuery('.footer_top .container').css("padding-top",hght);
	}
	jQuery( this ).children('.sub-menu').show();
  }, function() {
	jQuery('.footer_top .container').css("padding-top","10px");
    jQuery( this ).children('.sub-menu').hide();
  }
);



</script>
<script>

	
jQuery('.footer_top #menu-item-11967').hover(
  function() {
	var heightSubMenu = jQuery('#mc4wp-form-1').height()+10;
	if(heightSubMenu != null || heightSubMenu != ''){
		var hght = heightSubMenu+'px';
		jQuery('.footer_top .container').css("padding-top",hght);
	}
    jQuery('#mc4wp-form-1').show();
  }, function() {
	  jQuery('.footer_top .container').css("padding-top","10px");
    jQuery('#mc4wp-form-1').hide();
  }
);
	
jQuery('#mc4wp-form-1').hover(
  function() {
	var heightSubMenu = jQuery('#mc4wp-form-1').height()+10;
	if(heightSubMenu != null || heightSubMenu != ''){
		var hght = heightSubMenu+'px';
		jQuery('.footer_top .container').css("padding-top",hght);
	}
    jQuery('#mc4wp-form-1').show();
  }, function() {
	  jQuery('.footer_top .container').css("padding-top","10px");
    jQuery('#mc4wp-form-1').hide();
  }
);
</script>
<style>
.sub-menu, #mc4wp-form-1{display:none;}
</style>
<!-- footer -->
<?php wp_footer(); ?>
</body>
</html>