<?php get_header(); ?>
		<!-- container -->
		<div class="container">
		<div class="boxed">

		<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
		?>

		<?php
		$iron_croma_single_title = Iron_Croma::getOption('single_event_page_title');
		if(!empty($iron_croma_single_title)):
		?>
			<div class="page-title <?php (Iron_Croma::isPageTitleUppercase() == true) ? 'uppercase' : '';?>">
			<span class="heading-t"></span>
				<h1><?php echo esc_html($iron_croma_single_title); ?></h1>
			<?php Iron_Croma::displayPageTitleDivider(); ?>
		</div>
		<?php else: ?>

			<div class="heading-space"></div>

		<?php endif; ?>

		<?php
		list( $iron_croma_has_sidebar, $iron_croma_sidebar_position, $iron_croma_sidebar_area ) = Iron_Croma::setupDynamicSidebar( $post->ID );

		if ( $iron_croma_has_sidebar ) :
?>
			<div id="twocolumns" class="content__wrapper<?php if ( 'left' === $iron_croma_sidebar_position ) echo ' content--rev'; ?>">
				<div id="content" class="content__main">
<?php
		endif;
?>


			<!-- single-post -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry">
					<div class="event-wrapper">
					<?php
					if ( has_post_thumbnail() ) {
					?>
						<div class="lefthalf">
							<?php the_post_thumbnail('full'); ?>
						</div>
					<?php
					};
					?>
						<div class="righthalf">
							<div class="event-boldtitle"><?php the_title(); ?><br></div>
							<table>
								<tr>
									<td class="event-icon"><i class="fa fa-calendar"></i></td>
									<td><?php echo get_the_date(); ?></td>
								</tr>

								<?php $iron_croma_event_show_time = Iron_Croma::getField( 'event_show_time', $post->ID );
								if( !empty( $iron_croma_event_show_time ) ){ ?>
								<tr>
									<td class="event-icon"><i class="fa fa-clock-o"></i></td>
									<td><?php echo get_the_time(); ?></td>
								</tr>
								<?php } ?>

								<?php
								$iron_croma_event_city = Iron_Croma::getField( 'event_city', $post->ID );
								if ( !empty( $iron_croma_event_city ) ) {
								?>
								<tr>
									<td class="event-icon"><i class="fa fa-globe"></i></td>
									<td><?php echo Iron_Croma::getField( 'event_city', $post->ID ); ?></td>
								</tr>
								<?php } ?>

								<?php
								$iron_croma_event_venue = Iron_Croma::getField( 'event_venue', $post->ID );
								if(!empty( $iron_croma_event_venue )): ?>
								<tr>
									<td class="event-icon"><i class="fa fa-arrow-down"></i></td>
									<td><?php echo Iron_Croma::getField( 'event_venue', $post->ID ); ?></td>
								</tr>
								<?php endif; ?>
								<?php
								$iron_croma_event_map = Iron_Croma::getField( 'event_map', $post->ID );
								if(!empty( $iron_croma_event_map )): ?>
								<tr>
									<td class="event-icon"><i class="fa fa-map-marker"></i></td>
									<td><a class="event-map-link" href="<?php echo esc_url( Iron_Croma::getField( 'event_map', $post->ID )); ?>" target="_blank"><?php echo Iron_Croma::getField( 'event_map_label', $post->ID ); ?></a></td>
								</tr>
								<?php endif; ?>
							</table>
							<?php $iron_croma_iftickets = Iron_Croma::getField( 'event_link', $post->ID );?>
							<?php if(!empty($iron_croma_iftickets)): ?>

							<a class="button" target="_blank" href="<?php echo esc_url($iron_croma_iftickets); ?>"><?php echo Iron_Croma::getField( 'event_action_label', $post->ID); ?></a>
							<?php endif; ?>
							<?php the_content(); ?>
						</div>
						<div class="clear"></div>
					</div>

					<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'croma' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
				</div>
			</article>

			<?php	get_template_part('parts/share'); ?>
			<?php	comments_template(); ?>

<?php
		if ( $iron_croma_has_sidebar ) :
?>
				</div>

				<aside id="sidebar" class="content__side widget-area widget-area--<?php echo esc_attr( $iron_croma_sidebar_area ); ?>">
<?php
	do_action('before_ironband_sidebar_dynamic_sidebar', 'single-event.php');

	dynamic_sidebar( $iron_croma_sidebar_area );

	do_action('after_ironband_sidebar_dynamic_sidebar', 'single-event.php');
?>
				</aside>
			</div>
<?php
		endif;
?>

<?php
			endwhile;
		endif;
		?>

		</div>
		</div>

<?php get_footer(); ?>