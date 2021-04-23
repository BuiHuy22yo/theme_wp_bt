<?php
/*
 * template name: blog page
 * */
get_header(); ?>

    <div class="container">
        <div class="page-blog row">
            <!-- Get post News Query -->
            <?php $getposts = new WP_query();
            $getposts->query(array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => get_option('posts_per_page'),
                'orderby' => 'date',
                'order' => 'DESC',
            )); ?>


            <?php $i = 1;
            while ($getposts->have_posts()) : $getposts->the_post(); ?>
                <?php if ($i == arrow_get_option('ads1') || $i == arrow_get_option('ads2')) { ?>

                    <div class="col-md-8 blog-item  ">
                        <div class="<?php if ($i == arrow_get_option('ads1')) {
                            echo 'blog-ads1';
                        } elseif ($i == arrow_get_option('ads2')) {
                            echo 'blog-ads2';
                        } ?>">
                            <?php arrow_blog_thumbnail('full'); ?>
                            <?php arrow_get_ads($i); ?>
                        </div>

                    </div>
                <?php } else { ?>
                    <div class="col-md-4 blog-item <?php arrow_blog_inner_position($i,'relative') ?>">
                        <div class="blog-inner">
                            <?php arrow_blog_thumbnail('full') ?>
                            <div class="arrow_blog_date d-flex align-items-center">
                                <?php arrow_blog_date(); ?>
                                <div class="line"></div>
                            </div>

                        </div>
                        <div class="blog-author-title <?php arrow_blog_inner_position($i,'absolute') ?>">
                            <div class="d-lg-flex blog-author"><?php arrow_blog_author();
                                echo arrow_generate_html_terms_list($post->ID, 'category'); ?></div>
                            <?php arrow_blog_title() ?>
                            <div class="load-content-4"><a href="<?php the_permalink(); ?>"><?php echo arrow_get_option('button_continue_reading')?></a></div>
                        </div>

                    </div>
                <?php } ?>
                <?php $i++ ?>
            <?php endwhile; ?>
            <!-- Get post News Query -->
        </div>
        <?php
        arrow_pagination();
        wp_reset_postdata();
        ?>
    </div>

<?php
get_footer(); ?>