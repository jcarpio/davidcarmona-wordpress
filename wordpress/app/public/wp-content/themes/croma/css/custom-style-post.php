<?php

$post_id = $post->ID;
$backup_id = $post_id;
$iron_styles = new Iron_Croma_Dynamic_Styles('croma');

if($post_id) {

	$parents = get_post_ancestors($post_id);

	$background_id = Iron_Croma::getField('background', $post_id);
	$background_color = Iron_Croma::getField('background_color', $post_id);

	while(empty($background_id) && empty($background_color) && !empty($parents)) {

		$post_id = array_pop($parents);
		$background_id = Iron_Croma::getField('background', $post_id);
		$background_color = Iron_Croma::getField('background_color', $post_id);
	}

	if(!empty($background_id) || !empty($background_color)) {

		if(!empty($background_id)) {
			$background_url = wp_get_attachment_image_src( $background_id, 'full' );
			$background_url = $background_url[0];
		}else{
			$background_url = 'none';
		}

		$background_repeat = Iron_Croma::getField('background_repeat', $post_id);
		$background_size = Iron_Croma::getField('background_size', $post_id);
		$background_position = Iron_Croma::getField('background_position', $post_id);
		$background_attachment = 'initial';

		$iron_styles->useOptions(false);


		$background = array(
			'background-image' => $background_url,
			'background-repeat' => $background_repeat,
			'background-size' => $background_size,
			'background-position' => $background_position,
			'background-attachment' => $background_attachment,
			'background-color' => $background_color
		);

		$iron_styles->setBackground('body', $background, true);

		$iron_styles->useOptions(true);

	}else{
		$iron_styles->setBackground('body', 'body_background', true);
	}



	$content_background_color = Iron_Croma::getField('content_background_color', $post_id);
	$content_background_transparency = Iron_Croma::getField('content_background_transparency', $post_id);

	$iron_styles->useOptions(false);

	if(!empty($content_background_color) && isset($content_background_transparency)) {
		$rgb = $iron_styles->hex2rgb($content_background_color);
		$rgba = "rgba(".($rgb[0].",".$rgb[1].",".$rgb[2].",".$content_background_transparency).")";
		$iron_styles->set('#pusher', 'background-color', $rgba);

	}else{

		if(!empty($content_background_color))
			$iron_styles->set('#pusher', 'background-color', $content_background_color);

		if(isset($content_background_transparency))
			$iron_styles->set('#pusher', 'opacity', $content_background_transparency);
	}

	$iron_styles->useOptions(true);


}else{
	$iron_styles->setBackground('body', 'body_background', true);
}

if(empty($content_background_color)) {

	$content_selector = '#pusher';
	$iron_styles->setBackground($content_selector, 'content_background');

}
// FEATURED COLOR


$post_id = $backup_id;

if($post_id) {

	$menu_background = Iron_Croma::getField('classic_menu_background', $post_id);

	if(!empty($menu_background)) {

		$menu_background_alpha = Iron_Croma::getField('classic_menu_background_alpha', $post_id);

		if(isset($menu_background_alpha)) {

			$rgb = $iron_styles->hex2rgb($menu_background);
			$menu_background = "rgba(".($rgb[0].",".$rgb[1].",".$rgb[2].",".$menu_background_alpha).")";
		}

		$iron_styles->useOptions(false);
		$iron_styles->setBackgroundColor('.classic-menu', $menu_background);
		$iron_styles->useOptions(true);


	}else{
		$iron_styles->setBackgroundColor('.classic-menu', 'classic_menu_background');
		$iron_styles->setBackgroundColor('.classic-menu > ul', 'classic_menu_inner_background');
	}

	$iron_styles->useOptions(false);
	$menu_is_over = Iron_Croma::getField('classic_menu_over_content', $post_id);
	$menu_main_item_color = Iron_Croma::getField('classic_menu_main_item_color', $post_id);

	if(!empty($menu_is_over) && !empty($menu_main_item_color)) {

		$iron_styles->set('.classic-menu.fixed:not(.fixed_before):not(.mini):not(.responsive) > ul > li > a, .classic-menu.fixed:not(.fixed_before):not(.mini):not(.responsive) .languages-selector a', 'color', $menu_main_item_color);
		$iron_styles->set('.classic-menu.fixed:not(.absolute_before):not(.mini):not(.responsive) > ul > li > a, .classic-menu.fixed:not(.absolute_before):not(.mini):not(.responsive) .languages-selector a', 'color', $menu_main_item_color);
	}
	$iron_styles->useOptions(true);

}else{
	$iron_styles->setBackgroundColor('.classic-menu', 'classic_menu_background');
	$iron_styles->setBackgroundColor('.classic-menu > ul', 'classic_menu_inner_background');
}
// News title font color on hover
$global_custom_css = $iron_styles->get_option('custom_css');
$iron_styles->setCustomCss($global_custom_css);



if(Iron_Croma::getField('hamburger_icon_color', $post_id)){
$iron_hamburger_color = Iron_Croma::getField('hamburger_icon_color', $post_id);
}else{
$iron_hamburger_color = Iron_Croma::getOption('menu_open_icon_color', null, '#000000');
}
$iron_styles->render();

echo '.menu-toggle rect{
	fill:' . $iron_hamburger_color . ';

}';

echo 'ul.header-top-menu li a{color:' . $iron_hamburger_color . ';}';
echo '.menu-toggle-off polygon{
	fill:' . Iron_Croma::getOption('menu_close_icon_color', null, '#ffffff') . ';
}';
