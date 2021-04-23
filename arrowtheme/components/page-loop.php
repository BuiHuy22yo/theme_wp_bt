<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 9/15/2019
 * Time: 10:28 PM
 */

global $wp_query;

$blog_layout 		= arrow_get_option('blog_layout', 'list');
$blog_sidebar		= arrow_get_option('blog_sidebar', 'right');
$widget				= arrow_get_option('blog_sidebar_type', 'primary-bar');

$blog_layout		= isset($_GET['layout']) ? $_GET['layout'] : $blog_layout;
$blog_sidebar		= isset($_GET['sidebar']) ? $_GET['sidebar'] : $blog_sidebar;

$class				= ($blog_sidebar != 'full' && is_active_sidebar($widget)) ? 'arrow-has-bar arrow-bar-' . $blog_sidebar : 'arrow-full';
$name				= ($blog_layout == 'list') ? 'list' : 'grid';

if ($blog_layout == 'masonry') {
	wp_enqueue_script('imagesloaded');
	wp_enqueue_script('isotope');
}

?>

<div class="arrow-archive arrow-tmp">
	<div class="arrow-inner">
		<div class="container">
			<div class="arrow-archive-<?php echo esc_attr($blog_sidebar); ?> <?php echo esc_attr($class); ?>">
				<div class="arrow-content arrow-archive-content">
					<div class="arrow-<?php echo esc_attr($name); ?>">
						<div class="blog-<?php echo esc_attr($name); ?>">
							<?php get_template_part('components/archives/' . $name); ?>
						</div>
						<?php
							if (arrow_get_option('blog_pagination') != 'hide') {
								arrow_pagination();
							}

							wp_reset_postdata();
						?>
					</div>
				</div>

				<?php if ($blog_sidebar != 'full') : ?>
					<?php get_sidebar(); ?>
				<?php endif; ?>
			</div>
		</div>

	</div>
</div>

