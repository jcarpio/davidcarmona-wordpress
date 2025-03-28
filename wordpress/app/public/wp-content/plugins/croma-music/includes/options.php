<?php

//var_dump(delete_option('_iron_music_music_player_options'));


if ( is_admin()) {
	include 'rational-option-page/class.rational-option-page.php';
	$ironFeatures_pages = new RationalOptionPages();
	$ironFeatures_pages_options = array(
	    array(
	        'page_title'    => esc_html__('Croma Music','iron-music'),
	        'menu_title'    => esc_html__('Croma Music','iron-music'),
	        'capability'    => 'manage_options',
	        'menu_slug'     => 'iron-music',
	        'icon_url'      => IRON_MUSIC_DIR_URL . '/images/ironlogo.svg',
	        'position'      => '9999999999999999999999999999',
			'subpages'		=> array(
				array(
					'page_title'	=> esc_html__('Events','iron-music'),
					'menu_title' 	=> esc_html__('Events','iron-music'),
					'capability'    => 'manage_options',
					'menu_slug'     => 'iron_music_event',
					'sections'      => array(
						array(
							'id'    => 'iron_events',
							'title' => esc_html__('General Settings','iron-music'),
							'fields'=> array(
								// text input
								array(
									'id'    => 'events_slug_name',
									'title' => esc_html__('Events slug name','iron-music'),
									'type'  => 'text',
									'description' => esc_html__('eg: http://www.domain.com/SLUG/event-title','iron-music'),
									'value' => 'event'
								),
								array(
									'id' => 'events_per_page',
									'type' => 'text',
									'title' => esc_html__('How many events per page ?', 'iron-music'),
									'description' => esc_html__('This setting apply on your event page template.', 'iron-music'),
									'value' => '10'
								),
							)
						),
						array(
							'id'    => 'iron_events_items',
							'title' => esc_html__('Look and Feel','iron-music'),
							'fields'=> array(
								array(
									'id' => 'events_item_typography',
									'type' => 'typography',
									'title' => esc_html__('Typography', 'iron-music'),
									'description' => esc_html__('Choose a font, font size and color', 'iron-music'),
									'value' => array(
										'font' => 'Karla',
										'font-readable' => 'Karla',
										'weight' => '400',
										'size' => '18px',
										'color' => 'rgb(43, 43, 43)',
									)
								),
								array(
									'id'    => 'events_items_letterspacing',
									'type'  => 'text',
									'title' => esc_html__('Letter Spacing', 'iron-music'),
									'description' => esc_html__('enter value with px (eg: 2px)','iron-music'),
									'value' => '0px'
								),
								array(
									'id' => 'events_item_bg_color',
									'type' => 'text',
									'class' => 'color',
									'title' => esc_html__('Item Background Color', 'iron-music'),
									'value' => 'rgb(255, 255, 255)'
								),
								array(
									'id' => 'events_item_hover_bg_color',
									'type' => 'text',
									'class' => 'color',
									'title' => esc_html__('Item Hover Background Color', 'iron-music'),
									'value' => 'rgb(43, 43, 43)'
								),
								array(
									'id' => 'events_item_hover_text_color',
									'type' => 'text',
									'class' => 'color',
									'title' => esc_html__('Item Hover Text Color', 'iron-music'),
									'value' => 'rgb(255, 255, 255)'
								),
							),
						),
						array(
							'id'    => 'iron_events_countdown',
							'title' => esc_html__('Countdown','iron-music'),
							'fields'=> array(
								array(
									'id' => 'events_show_countdown_rollover',
									'type' => 'checkbox',
									'title' => esc_html__('Show countdown on rollover', 'iron-music'),
									'description' => esc_html__('When option is checked, an animated countdown will be shown when user rollover your event. This global setting may be overridden in each of your individual events.', 'iron-music'),
								),
								array(
									'id' => 'events_countdown_typography',
									'type' => 'typography',
									'title' => esc_html__('Typography', 'iron-music'),
									'description' => esc_html__('Choose a font, font size and color', 'iron-music'),
									'value' => array(
										'font' => 'Karla',
										'font-readable' => 'Karla',
										'weight' => '600',
										'size' => '21px',
										'color' => 'rgb(255, 255, 255)',
									)
								),
								array(
									'id'    => 'events_countdown_letterspacing',
									'type'  => 'text',
									'title' => esc_html__('Letter Spacing', 'iron-music'),
									'description' => esc_html__('enter value with px','iron-music'),
									'value' => '0px'
								),
								array(
									'id' => 'events_countdown_bg_color',
									'type' => 'text',
									'class' => 'color',
									'title' => esc_html__('Background Color', 'iron-music'),
									'value' => 'rgb(143, 34, 75)'
								),
								array(
									'id' => 'events_outline_colors',
									'type' => 'text',
									'class' => 'color',
									'title' => esc_html__('Outline Color', 'iron-music'),
									'description' => esc_html__('For separators, and dropdown outlines color', 'iron-music'),
									'value' => 'rgb(43, 43, 43)'
								),
								array(
									'id'    => 'events_items_padding',
									'type'  => 'text',
									'title' => esc_html__('Padding between items', 'iron-music'),
									'description' => esc_html__('enter value with px. eg: 5px','iron-music'),
									'value' => '20px'
								),
							),
						),
						array(
							'id'    => 'iron_events_filter',
							'title' => esc_html__('Artist Dropdown','iron-music'),
							'fields'=> array(
								array(
									'id' => 'events_filter',
									'type' => 'checkbox',
									'title' => esc_html__('Show Artist Dropdown', 'iron-music'),
									'description' => esc_html__('Show an artist dropdown selector above your list of events. If you have multiple artists, this can be usefull to filter your events by artists. This option only apply in pages that use the "Event Posts" template.','iron-music'),
									'switch' => true,
								),
								array(
									'id'    => 'events_filter_label',
									'type'  => 'text',
									'title' => esc_html__('Text Label', 'iron-music'),
									'description' => esc_html__('eg: Select an artist','iron-music'),
									'value' => 'Filter by Artist'
								),
								array(
									'id' => 'events_filter_typography',
									'type' => 'typography',
									'title' => esc_html__('Label Typography', 'iron-music'),
									'description' => esc_html__('Choose a font, font size and color', 'iron-music'),
									'value' => array(
										'font' => 'Karla',
										'font-readable' => 'Karla',
										'weight' => '400',
										'size' => '15px',
										'color' => 'rgb(43, 43, 43)',
									)
								),
								array(
									'id'    => 'events_filter_letterspacing',
									'type'  => 'text',
									'title' => esc_html__('Label Letter Spacing', 'iron-music'),
									'description' => esc_html__('enter value with px (eg: 2px)','iron-music'),
									'value' => '0px'
								),
								array(
									'id' => 'events_filter_bg_color',
									'type' => 'text',
									'class' => 'color',
									'title' => esc_html__('Background Color', 'iron-music'),
									'value' => 'rgb(240, 240, 240)'
								),
							)
						),

					),
				),
				array(
					'page_title'	=> esc_html__('Music Player','iron-music'),
					'menu_title' 	=> esc_html__('Music Player','iron-music'),
					'capability'    => 'manage_options',
					'menu_slug'     => 'iron_music_music_player',
					'sections'		=> array(
						array(
							'id' 	=> 'iron_music_player',
							'title'	=> esc_html__('Music Player Color Setting', 'iron-music'),
							'fields'=> array(
								array(
									'id' => 'music_player_song_title',
									'type' => 'typography',
									'title' => esc_html__('Music Player Song Title', 'iron-music'),
									'description' => esc_html__('Choose a font, font size and color', 'iron-music'),
									'value' => array(
										'font' => 'Karla',
										'font-readable' => 'Karla',
										'weight' => '700',
										'size' => '16px',
										'color' => 'rgb(43, 43, 43)',
									)
								),
								array(
									'id' => 'music_player_album_title',
									'type' => 'typography',
									'title' => esc_html__('Music Player Album Title', 'iron-music'),
									'description' => esc_html__('Choose a font, font size and color', 'iron-music'),
									'value' => array(
										'font' => 'Karla',
										'font-readable' => 'Karla',
										'weight' => '400',
										'size' => '14px',
										'color' => 'rgb(43, 43, 43)',
									)
								),
								array(
									'id' => 'music_player_playlist',
									'type' => 'typography',
									'title' => esc_html__('Playlist', 'iron-music'),
									'description' => esc_html__('Choose a font, font size and color', 'iron-music'),
									'value' => array(
										'font' => 'Karla',
										'font-readable' => 'Karla',
										'weight' => '400',
										'size' => '16px',
										'color' => 'rgb(43, 43, 43)',
									)
								),
								array(
									'id' => 'music_player_playlist_active_text_color',
									'type' => 'text',
									'title' => esc_html__('Playlist active text color', 'iron-music'),
									'class' => 'color',
									'value' => 'rgb(77, 77, 79)'
								),
								array(
									'id' => 'music_player_playlist_hover_color',
									'type' => 'text',
									'title' => esc_html__('Playlist hover', 'iron-music'),
									'class' => 'color',
									'value' => 'rgb(215, 215, 215)'
								),
								array(
									'id' => 'music_player_icon_color',
									'type' => 'text',
									'title' => esc_html__('Player control color', 'iron-music'),
									'class' => 'color',
									'value' => 'rgb(127, 127, 127)'
								),
								array(
									'id' => 'music_player_timeline_color',
									'type' => 'text',
									'title' => esc_html__('Timeline background', 'iron-music'),
									'class' => 'color',
									'value' => 'rgb(31, 31, 31)'
								),
								array(
									'id' => 'music_player_progress_color',
									'type' => 'text',
									'title' => esc_html__('Progress bar', 'iron-music'),
									'class' => 'color',
									'value' => 'rgb(13, 237, 180)'
								),
							)
						),
						array(
							'id' 	=> 'iron_music_continuous_player',
							'title'	=> esc_html__('Continuous Music Player Color Setting', 'iron-music'),
							'fields'=> array(
								array(
									'id' => 'continuous_music_player_label_color',
									'type' => 'text',
									'title' => esc_html__('Music Player Label Color', 'iron-music'),
									'class' => 'color',
									'value' => 'rgb(0, 0, 0)'
								),
								array(
									'id' => 'continuous_music_player_background',
									'type' => 'text',
									'title' => esc_html__('Footer music player background', 'iron-music'),
									'class' => 'color',
									'value' => 'rgb(0, 0, 0)'
								),
								array(
									'id' => 'continuous_music_player_control_color',
									'type' => 'text',
									'title' => esc_html__('Player Control Color', 'iron-music'),
									'class' => 'color',
									'value' => 'rgb(255, 255, 255)'
								),
								array(
									'id' => 'continuous_music_player_timeline_background',
									'type' => 'text',
									'title' => esc_html__('Timeline background', 'iron-music'),
									'class' => 'color',
									'value' => 'rgb(255, 255, 255)'
								),
								array(
									'id' => 'continuous_music_player_progress_bar',
									'type' => 'text',
									'title' => esc_html__('Progress bar', 'iron-music'),
									'class' => 'color',
									'value' => 'rgb(150, 150, 150)'
								),


							)
						)
					)
				),
				array(
					'page_title'	=> esc_html__('Discography','iron-music'),
					'menu_title' 	=> esc_html__('Discography','iron-music'),
					'capability'    => 'manage_options',
					'menu_slug'     => 'iron_music_discography',
					'sections'      => array(
						array(
							'id'    => 'iron_discography',
							'title' => esc_html__('Discography Features','iron-music'),
							'fields'=> array(
								// text input
								array(
									'id'    => 'discography_slug_name',
									'title' => esc_html__('Discography Slug Name','iron-music'),
									'type'  => 'text',
									'description' => esc_html__('eg: http://www.domain.com/SLUG-NAME/album-title','iron-music'),
									'value' => 'albums'
								),
							)
						),
					),
				),

				array(
					'page_title'	=> 'Import / Export',
					'menu_title' 	=> 'Import / Export',
					'capability'    => 'manage_options',
					'menu_slug'     => 'iron_music_import_export',
					'sections'      => array(
						array(
							'id'    => 'iron_import_export',
							'title' => esc_html__('Import / Export','iron-music'),
							'fields' => array(

								array(
									'id' => 'external_css',
									'type' => 'checkbox',
									'title' => esc_html__('Move Dynamic/Custom CSS Into External Stylesheet?', 'iron-music'),
									'description' => esc_html__('This gives you the option move all the dynamic css that lives in the head by default into its own file for aesthetic & caching purposes', 'iron-music'),
									'value' => 0
								),
								array(
									'id' => 'import_html',
									'title' => esc_html__('Data to import', 'iron-music'),
									'type' => 'html',
									'data' => '<textarea class="import"></textarea><br><button class="btn import">Import data</button>'
								),
								array(
									'id' => 'export_html',
									'title' => esc_html__('Data to export', 'iron-music'),
									'type' => 'htmlExport',
									'export_options' => array(
										'_iron_music_event_options',
								        '_iron_music_music_player_options',
								        '_iron_music_discography_options'
									)
								),
							)
						),
					),
				),
			),
	    ),
	);


	$ironFeatures_pages->pages( $ironFeatures_pages_options );

}
