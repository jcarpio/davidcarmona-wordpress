<?php get_header(); ?>
<?php if ( have_posts() ) : the_post() ?>
<?php





switch ( Iron_Croma::getField('album_background_type', $post->ID ) ) {
	case 'image':
		$background_image = wp_get_attachment_image_src( Iron_Croma::getField('album_background_image', $post->ID), 'full' );
		$headerstyle = 'style="background: url(' . $background_image[0] . ') center center no-repeat; background-size: cover;"';
		break;

	case 'color':
		$background_color =  Iron_Croma::getField('album_background_color', $post->ID);
		$headerstyle = 'style="background-color:' . $background_color . '"';
		break;

	default:

		$uploadDir = wp_upload_dir();
		$imageFile = wp_get_attachment_metadata( get_post_thumbnail_id( $post_id ) );
		$imageFilePath = $uploadDir['basedir'] . '/' .$imageFile['file'];

		$imageFileOnly = substr( $imageFile['file'], strrpos($imageFile['file'], '/') );

		// echo $imageFileOnly;


		$imageFilePathConverted = $uploadDir['basedir'] . '/converted' .$imageFileOnly;
		$imageFileUrlConverted = $uploadDir['baseurl'] . '/converted' .$imageFileOnly;

		if (!is_dir($uploadDir['basedir'] . '/converted')) {
			mkdir( $uploadDir['basedir'] . '/converted' );
		}
		if (!is_file( $imageFilePathConverted )) {
			$im = imagecreatefromjpeg($imageFilePath);
			if( $im ){
				for ($i = 0; $i < 100; $i++) {
					imagefilter($im, IMG_FILTER_GAUSSIAN_BLUR);
				}
				imagefilter($im, IMG_FILTER_SELECTIVE_BLUR);
			    imagejpeg($im, $imageFilePathConverted);
			}

			imagedestroy($im);
		}
		$headerstyle = 'style="background: url(' . $imageFileUrlConverted . ') center center no-repeat; background-size: cover; filter: blur(50px) ;"';
		break;
}
?>

		<div class="album-header">
			<div class="backCover" <?php echo $headerstyle ?>></div>
			<div class="albumCover">
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'medium' ); ?>
				<img src="<?php echo $image[0] ?>">
			</div>
		</div>


		<!-- container -->
		<div class="container">


		<div class="boxed">



	<?php list( $iron_croma_has_sidebar, $iron_croma_sidebar_position, $iron_croma_sidebar_area ) = Iron_Croma::setupDynamicSidebar( $post->ID );
	if ( $iron_croma_has_sidebar ) : ?>
		<div id="twocolumns" class="content__wrapper<?php if ( 'left' === $iron_croma_sidebar_position ) echo ' content--rev'; ?>">
			<div id="content" class="content__main">
	<?php endif; ?>


	<!-- info-section -->
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'featured' ); ?>>
	<?php the_title('<h2>','</h2>');?>
	<?php Iron_Croma::displayPageTitleDivider(); ?>
	<?php
	$iron_croma_atts = array(
		'albums' => array($post->ID),
		'show_playlist' => true
	);

	the_widget('Iron_Widget_Radio', $iron_croma_atts, array( 'before_widget'=>'<div class="iron_widget_radio">', 'after_widget'=>'</div>', 'widget_id'=>'single_album'));
	?>
</div>

<?php
if ( Iron_Croma::getField('alb_store_list', $post->ID) ) : ?>
	<div class="buttons-block">
		<div class="ctnButton-block">
		<div class="available-now"><?php echo esc_html__("Available now on", 'croma'); ?>:</div>
		<ul class="store-list">
			<?php while(has_sub_field('alb_store_list')): ?>
			<li><a class="button" href="<?php echo esc_url( get_sub_field('store_link') ); ?>"><?php the_sub_field('store_name'); ?></a></li>
			<?php endwhile; ?>
		</ul>
		</div>
	</div>
<?php endif; ?>




<?php		if ( Iron_Croma::getField('alb_review', $post->ID) ) : ?>
			<!-- content-box -->
			<section class="content-box">
			<h4><?php esc_html_e('Album Review', 'croma'); ?></h4>
			<?php Iron_Croma::displayPageTitleDivider(); ?>
<?php		if ( Iron_Croma::getField('alb_review', $post->ID ) || Iron_Croma::getField('alb_review_author', $post->ID ) ) : ?>
			<!-- blockquote-box -->
				<figure class="blockquote-block">
<?php			if ( Iron_Croma::getField('alb_review', $post->ID ) ) : ?>
					<blockquote><?php echo Iron_Croma::getField('alb_review', $post->ID); ?></blockquote>
<?php
				endif;

				if ( Iron_Croma::getField('alb_review_author', $post->ID ) ) : ?>
					<figcaption>- <?php echo Iron_Croma::getField('alb_review_author', $post->ID ); ?></figcaption>
<?php 			endif; ?>
				</figure>
<?php		endif; ?>
			</section>
<?php	endif; ?>



<?php	if ( get_the_content() ) : ?>
			<!-- content-box -->
			<section class="content-box">
				<div class="entry">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'croma' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
				</div>
			</section>
<?php	endif; ?>



<?php	get_template_part('parts/share'); ?>

<?php	comments_template(); ?>

<?php
		if ( $iron_croma_has_sidebar ) :
?>
				</div>

				<aside id="sidebar" class="content__side widget-area widget-area--<?php echo esc_attr( $iron_croma_sidebar_area ); ?>">
<?php
	do_action('before_ironband_sidebar_dynamic_sidebar', 'single-album.php');

	dynamic_sidebar( $iron_croma_sidebar_area );

	do_action('after_ironband_sidebar_dynamic_sidebar', 'single-album.php');
?>
				</aside>
			</div>
<?php
		endif;
?>

<?php endif; ?>

		</div>
		</div>

<?php get_footer(); ?>