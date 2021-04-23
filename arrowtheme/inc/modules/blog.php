<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 9/20/2019
 * Time: 9:48 PM
 */

/**
 * Create thumbnail post for blog page
 */
if (!function_exists('arrow_blog_thumbnail')) {
    function arrow_blog_thumbnail($size)
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        global $post;

        echo '<div class="post-thumbnail">';
        '">';
        echo get_the_post_thumbnail($post->ID, $size);
        echo '</span></a>';
        echo '</div>';
    }
}

/**
 * Create title post for blog page
 */
if (!function_exists('arrow_blog_title')) {
    function arrow_blog_title()
    {
        global $post;

        echo '<h3 class="entry-title">';
        echo '<a href="' . esc_url(get_the_permalink($post->ID)) . '">';
        echo get_the_title($post->ID);
        echo '</a>';
        echo '</h3>';
    }
}

/**
 * Create date of post for blog post
 */
if (!function_exists('arrow_blog_date')) {
    function arrow_blog_date($format = false)
    {
        global $post;

        $format = ($format == false) ? get_option('date_format') : $format;

        echo '<div class="entry-date">';
        echo '<a href="' . esc_url(get_the_permalink($post->ID)) . '" rel="bookmark">';
        echo '<span>' . get_the_date($format) . '</span>';
        echo '</a>';
        echo '</div>';
    }
}

/**
 * Create author of post for blog post
 */
if (!function_exists('arrow_blog_author')) {
    function arrow_blog_author()
    {
        echo '<div class="entry-author author vcard">';
        //echo '<a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . get_the_author() . '</a>';
        echo '<a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html__('By ', 'arrow') . '<span>' . get_the_author() . '</span></a>';

        echo '</div>';
    }
}

/**
 * Create comments of post for blog post
 */
if (!function_exists('arrow_blog_comments')) {
    function arrow_blog_comments()
    {
        if (!is_single() && !is_search() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<div class="entry-comments-link">';
            comments_popup_link(esc_html__('0 Comment', 'arrow'), esc_html__('1 Comment', 'arrow'), esc_html__('% Comments', 'arrow'));
            echo '</div>';
        }
    }
}

/**
 * Create excerpt of post for blog post
 */
if (!function_exists('arrow_blog_excerpt')) {
    function arrow_blog_excerpt($length)
    {
        global $post;

        $excerpt = arrow_get_excerpt_by_id($post->ID, $length);

        echo '<div class="entry-excerpt">' . $excerpt . '</div>';
    }
}

if (!function_exists('arrow_sidebar_ads')) {
    function arrow_sidebar_ads()
    {
        echo '<div class="sidebar-inner-ads">';
        $ads_query = new WP_query();
        $ads_query->query(array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 2,
            'orderby' => 'date',
            'order' => 'DESC',
        ));
        $i = 0;
        while ($ads_query->have_posts()) : $ads_query->the_post();
            $i++;
            echo '<div class="ads inner-ads'.$i.'">';
            arrow_get_images('images' . $i);
            echo '<div class="price">';
            if ($i == 1) {
               echo arrow_get_option('price1');
            } else {
               echo arrow_get_option('price2');
            }
            echo '</div>';
            arrow_blog_title();
            arrow_blog_excerpt(10);
//            href="'.the_permalink().'"
            echo '<div class="load-content"><a href="';
            the_permalink();

            echo '">'.arrow_get_option('load1').'</a></div></div>';
        endwhile;
        wp_reset_postdata();
        echo '</div>';
    }
}

if (!function_exists('arrow_get_ads')) {
    function arrow_get_ads($i)
    {
        if ($i == arrow_get_option('ads1')) {
            echo '<div class="background-color"></div>';
            echo '<div class="blog-price-text">';
            echo '<div class="blog-price">'.arrow_get_option('price1').'</div>';
            echo ' <div class="blog-text"></div>';
            echo ' </div>';
            echo '<div class="blog-title-excerpt">';
            echo '<div class="blog-title">'.arrow_blog_title().'</div>';
            arrow_blog_excerpt(10);
            echo ' <div class="load-content-8"><a class="ctt" href="'.the_permalink().'">'.arrow_get_option('load1').'</a></div></div>';
        } elseif ($i == arrow_get_option('ads2')) {
            echo '<div class="blog-title-excerpt">';
            echo '<div class="blog-title">';
            arrow_blog_title();
            echo ' </div>';
            arrow_blog_excerpt(10);
            echo ' </div>';
            echo '<div class="blog-price-text d-flex align-items-center">';
            echo '<div class="blog-price"><div class="Sale-price">'.arrow_get_option('price2').'</div><div class="Regular-price">'.arrow_get_option('price3').'</div></div>';
            echo ' <div class="blog-text"><span class="one">'.arrow_get_option('text1').'</span><br><span class="two">'.arrow_get_option('text2').'</span><br>'.arrow_get_option('text3').'</div>';
            echo ' <div class="arrow-left">';
            echo ' </div>';
            echo ' </div>';
        }

    }
}

if (!function_exists('arrow_get_images')) {
    function arrow_get_images($images)
    {
        if (arrow_get_option($images) == '') {
            arrow_blog_thumbnail('full');
        } else {
            echo '<img src ="' . arrow_get_option($images) . '"/>';
        }

    }
}

if (!function_exists('arrow_sidebar_other_post')) {
    function arrow_sidebar_other_post()
    {
        echo '<div class="sidebar-other ">';
        echo '<div class="name-post">'.arrow_get_option('name_post').'</div>';
        $ads_query = new WP_query();
        $ads_query->query(array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 4,
            'orderby' => 'rand',

        ));
        global $wp_query;
        $wp_query->in_the_loop = true;
        while ($ads_query->have_posts()) : $ads_query->the_post();
            echo '<div class="sidebar-other-post d-flex">';
            arrow_blog_thumbnail('full');
            arrow_blog_title();
            echo '</div>';
        endwhile;
        wp_reset_postdata();
        echo '</div>';
    }
}

if (!function_exists('arrow_blog_inner_position')) {
    function arrow_blog_inner_position($i,$relative='relative')
    {
        if ($i == arrow_get_option('blog_inner_position1')||$i == arrow_get_option('blog_inner_position2')) {
            if ($relative=='relative') {
                echo 'parent';
            }else {
                echo 'child';
            }
        }
        else {
            echo '';
        }

    }
}