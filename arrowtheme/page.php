<?php
//if (!defined('ABSPATH')) {
//    return;
//}
//
//get_header();
//
//get_footer();

if (!defined('ABSPATH')) {
    return;
}

get_header();

global $post;
?>
    <div class="Arrow-page Arrow-tmp">
        <div class="Arrow-inner">
            <div class="Arrow-content">
                <div class="container">
                    <?php
                    while (have_posts()) {
                        the_post();
                        the_content();

                        wp_link_pages(
                            array(
                                'before' 		=> '<nav class="Arrow-page-break Arrow-pagination">',
                                'after'  		=> '</nav>',
                                'link_before'	=> '<span class="current">',
                                'link_after'	=> '</span>',
                            )
                        );

                        do_action('Arrow_page_end');

                        if (comments_open() || '0' != get_comments_number()) {
                            comments_template('', true);
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
get_template_part('components/page', 'blog');
get_footer();
