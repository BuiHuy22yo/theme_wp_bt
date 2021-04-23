<?php
if (!defined('ABSPATH')) {
    return;
}
get_header();

?>

    <div class="arrow-single arrow-tmp">
        <div class="arrow-inner">
            <div class="container">
                <div class="arrow-post row">
                    <div class="arrow-content arrow-post-content col-12 col-lg-9">
                        <?php
                        while (have_posts()) {
                            the_post();
                            get_template_part('components/page-single');
                        }

                        wp_reset_postdata();
                        ?>
                    </div>
                    <?php get_sidebar(); ?>

                </div>
                <div class="arrow-related-posts row ">

                    <?php
                     $cat=  arrow_post_id();
                     //var_dump($cat);
                    arrow_related_posts($cat) ;

                    ?>;

                </div>
                <?php do_action('arrow_single_post_after_content'); ?>

            </div>

        </div>
    </div>

<?php
get_footer();
