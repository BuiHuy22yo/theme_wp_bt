<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 10/8/2019
 * Time: 3:20 PM
 */

global $post;

$post_id	= isset($post) ? $post->ID : false;
$post_id	= is_home() ? get_option('page_for_posts') : $post_id;
//$post_id	= arrow_is_woocommerce_page() ? wc_get_page_id('shop') : $post_id;

if (is_front_page()) {
	return;
}

$bg_type	= arrow_get_option('page_header_background_type', 'image');
$paralalx	= arrow_get_option('page_header_parallax');
$align		= arrow_get_option('page_header_content_align', 'center');
$overlay	= arrow_get_option('page_header_overlay_color');

$mp4		= arrow_get_option('page_header_mp4');
$ogv		= arrow_get_option('page_header_ogv');
$webm		= arrow_get_option('page_header_webm');

if (is_page()) {
	$page_options 	= get_post_meta($post_id, '_page_options', true);
	$type			= arrow_get_value_in_array($page_options, 'page_header_type');

	if ($type == 'custom') {
		$bg_type	= arrow_get_value_in_array($page_options,'page_header_background_type', 'image');
		$paralalx	= arrow_get_value_in_array($page_options,'page_header_parallax');
		$align		= arrow_get_value_in_array($page_options,'page_header_content_align', 'center');
		$overlay	= arrow_get_value_in_array($page_options,'page_header_overlay_color');

		$mp4		= arrow_get_value_in_array($page_options,'page_header_mp4');
		$ogv		= arrow_get_value_in_array($page_options,'page_header_ogv');
		$webm		= arrow_get_value_in_array($page_options,'page_header_webm');
	} else if ($type == 'disable') {
		return;
	}
}

if (is_search()) {
	$page_title = esc_html__('Search: ', 'arrow') . esc_attr($_GET['s']);
} else if (is_category()) {
	$page_title = esc_html__('Category Archives: ', 'arrow') . single_cat_title('', false);
} else if (is_author()) {
	$page_title = esc_html__('Author Archives: ', 'arrow') . get_the_author();
} else if (is_404()) {
	$page_title = esc_html__('Page not found: ', 'arrow');
} else if (is_day()) {
	$page_title = esc_html__('Daily Archives: ', 'arrow') . get_the_date();
} else if (is_month()) {
	$page_title = esc_html__('Monthly Archives: ', 'arrow') . get_the_date('F Y');
} else if (is_year()) {
	$page_title = esc_html__('Yearly Archives: ', 'arrow') . get_the_date('Y');
} else if (is_tag()) {
	$page_title = esc_html__('Tags Archives: ', 'arrow') . single_tag_title('', false);
} else {
	$page_title = get_the_title($post_id);
}

if (class_exists('WooCommerce')) {
	if (is_shop()) {
		$page_title = esc_html__('Shop', 'arrow');
	}
}

if ($paralalx) {
	wp_enqueue_script('simpleParallax');
	wp_enqueue_script('arrow-parallax');

	$bg				= arrow_get_option('page_header_background');
	$image			= arrow_get_value_in_array($bg, 'background-image');
	$url			= arrow_get_value_in_array($image, 'url');
}
?>

<div class="arrow-page-header text-<?php echo esc_attr($align); ?>">
	<?php if ($paralalx) : ?>
		<div class="arrow-bg-parallax">
			<img src="<?php echo esc_url($url); ?>" class="arrow-img-parallax" data-orientation="up" data-scale="1.2" data-delay="0.6" data-transition="cubic-bezier(0,0,0,1)" />
		</div>
	<?php endif; ?>

	<?php if ($overlay) : ?>
		<div class="arrow-section-overlay"></div>
	<?php endif; ?>

	<div class="arrow-section-content">
		<div class="section-title">
			<div class="container">
				<h1>
					<span>
						<?php echo esc_attr($page_title); ?>
					</span>
				</h1>
			</div>
		</div>
		<div class="section-breadcrumb">
			<div class="container">
				<?php echo arrow_breadcrumb(); ?>
			</div>
		</div>
	</div>

	<?php if ($bg_type == 'video' && ($mp4 || $ogv || $webm)) : ?>
		<div class="arrow-section-video-wrapper">
			<div class="arrow-video-wrapper">
				<video width="1920" height="1080" poster="" autoplay>
					<?php if ($mp4) : ?>
						<source type="video/mp4" src="<?php echo esc_url($mp4); ?>" />
					<?php endif; ?>

					<?php if ($ogv) : ?>
						<source type="video/ogv" src="<?php echo esc_url($ogv); ?>" />
					<?php endif; ?>

					<?php if ($webm) : ?>
						<source type="video/webm" src="<?php echo esc_url($webm); ?>" />
					<?php endif; ?>
				</video>
			</div>
		</div>
	<?php endif; ?>
</div>
