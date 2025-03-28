<?php

// you can modify this template by creating a file in your current theme : {THEMENAME}/iron-music/templates/event.php

global $wp_query, $events_filter;

$expanded = ( isset($_GET['id']) && $_GET['id'] == get_the_ID() ? 'expanded' : false );
$show_countdown = (bool)get_ironMusic_option('events_show_countdown_rollover', '_iron_music_event_options');
$item_show_countdown = (bool)get_field('event_enable_countdown');
if($show_countdown != $item_show_countdown) {
	$show_countdown = $item_show_countdown;
}

if((!empty($events_filter) && $events_filter == 'past') || (!empty($wp_query->query_vars['filter']) && $wp_query->query_vars['filter'] == 'past')) {
	$show_countdown = false;
	$no_countdown = true;
}


$artist_at_event = get_field('artist_at_event', get_the_ID());

if (!empty($artist_at_event)) {
	foreach($artist_at_event as &$artist) {
		$artist = 'artist-'.$artist;
	}
	$expanded .= implode(' ',$artist_at_event);
}

?>
<li id="post-<?php the_ID(); ?>" <?php post_class($expanded); ?>>

	<?php
		$showtime = (bool)get_field('event_show_time');
		$city = get_field('event_city');
		$venue = get_field('event_venue');
		$show_countdown = (bool)get_ironMusic_option('events_show_countdown_rollover', '_iron_music_event_options');
		$item_show_countdown = (bool)get_field('event_enable_countdown');
	?>
	<a href="<?php the_permalink(); ?>" class="event-line-wrap">
		<?php
			if($show_countdown && $item_show_countdown){
			?>
			<div class="event-line-countdown-wrap">
				<script>
					jQuery(function(){
						/* Countdown Call */
						function CountCall(Row,Day){
							jQuery('.'+Row+' .countdown-block').countdown({until: Day, padZeroes: true, format:'DHMS', layout: '<b>{dnn}D</b>-{hnn}H-{mnn}M:{snn}S'});
							var totalcount = jQuery('.'+Row+' .countdown-block').countdown('getTimes');
							if(totalcount[3] == 0 && totalcount[4] == 0 && totalcount[5] == 0 && totalcount[6] == 0){
								jQuery('.'+Row+' .event-line-countdown-wrap').addClass('finished');
							}
						};
						var event_y = '<?php echo get_the_time('Y'); ?>';
						var event_m = '<?php echo get_the_time('m'); ?>';
						var event_d = '<?php echo get_the_time('d'); ?>';
						var event_g = '<?php echo get_the_time('H'); ?>';
						var event_i = '<?php echo get_the_time('i'); ?>';
						var targetRow = 'post-<?php the_ID(); ?>';
						var targetDay = new Date(event_y,event_m-1,event_d,event_g,event_i);
						CountCall(targetRow,targetDay);
						//Remove the following line's comment to stop the timers
						//jQuery('.countdown-block').countdown('pause');
					});
				</script>
				<div class="countdown-block"></div>
			</div>
			<?php
			}
		?>
		<div class="event-line-node"><?php echo get_the_date(); ?></div>
		<div class="event-line-node medium"><?php echo esc_html($city); ?><?php if($venue != ""){echo ", ".esc_html($venue);}?></div>
		<div class="event-line-node large"><?php the_title(); ?></div>
	</a>
	<!-- ========================================= -->

</li>

