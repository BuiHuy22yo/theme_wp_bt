<?php
if (!defined('ABSPATH')) {
    return;
}

/**
 * Create thumbnail post for single page
 */
if (!function_exists('arrow_single_thumbnail')) {
    function arrow_single_thumbnail($size = 'full')
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail() || arrow_get_option('blog_single_image_show')) {
            return;
        }

        global $post;

        echo '<div class="post-thumbnail">';
        echo '<a href="' . esc_url(get_the_permalink($post->ID)) . '" class="arrow-image">';
        echo get_the_post_thumbnail($post->ID, $size);
        echo '</a>';
        echo '</div>';
    }
}

/**
 * Create title post for single page
 */
if (!function_exists('arrow_single_title')) {
    function arrow_single_title()
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
 * Create date of post for single post
 */
if (!function_exists('arrow_single_date')) {
    function arrow_single_date($format = false)
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
 * Create author of post for single post
 */
if (!function_exists('arrow_single_author')) {
    function arrow_single_author()
    {
        echo '<div class="entry-author author vcard">';
        echo '<a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html__('By ', 'arrow') . '<span>' . get_the_author() . '</span></a>';
        echo '</div>';
    }
}

/**
 * Create comments of post for single post
 */
if (!function_exists('arrow_single_comments')) {
    function arrow_single_comments()
    {
        echo '<div class="entry-comments-link">';
        echo '<i class="fa fa-comments" aria-hidden="true"></i>';
        echo comments_number('0', '1', '%');
        echo '</div>';
    }
}

/**
 * Create content for single post
 */
if (!function_exists('arrow_single_content')) {
    function arrow_single_content()
    {
        the_content(esc_html__('Read More', 'arrow'));

        wp_link_pages(
            array(
                'before' => '<div class="page-links arrow-pagination"><span class="page-links-title">' . esc_html__('Pages:', 'arrow') . '</span>',
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>',
            )
        );
    }
}

/**
 * Create author info section for single post
 */
if (!function_exists('arrow_single_section_author_info')) {
    function arrow_single_section_author_info()
    {
        if (get_the_author_meta('description') && arrow_get_option('blog_single_show_about_author')) {
            ?>
            <div class="author-section" itemprop="author" itemscope itemtype="http://schema.org/Person">
                <div class="author-avatar" itemprop="image">
                    <?php echo get_avatar(get_the_author_meta('user_email'), 140, '', esc_html(get_the_author_meta('display_name'))); ?>
                </div>
                <div class="author-info">
                    <h2 class="author-title">
                        <?php echo esc_html__('About Author:', 'arrow'); ?>
                        <span class="author-name" itemprop="name"><?php the_author(); ?></span>
                    </h2>
                    <div class="author-description" itemprop="description">
                        <?php the_author_meta('description'); ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}

/**
 * List Comment
 */
if (!function_exists('arrow_custom_list_comment')) {
    function arrow_custom_list_comment($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
        <article class="comment-wrap">
            <div class="comment-avatar">
                <?php echo get_avatar($comment, $args['avatar_size']); ?>
            </div>
            <div class="comment-body">
                <div class="c-author"><?php echo get_comment_author_link(); ?></div>
                <div class="c-date"><?php echo get_comment_date(); ?></div>
                <div><?php echo get_comment_text(); ?></div>
                <footer>
                    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </footer>
            </div>
        </article>
        <?php
    }
}

/**
 * Comment form.
 */
if (!function_exists('arrow_comment_form')) {
    function arrow_comment_form()
    {
        $commenter = wp_get_current_commenter();
        $req = get_option('require_name_email');
        $aria_req = $req ? ' aria-required="true"' : '';
        $html_req = $req ? ' required="required"' : '';

        ob_start();

        $author = '<div class="comment-input"><p class="comment-form-author"><input placeholder="' . esc_html__('Name*', 'arrow') . '" type="text" value="' . esc_attr($commenter['comment_author']) . '" id="author" name="author" maxlength="245"' . $aria_req . $html_req . ' /></p>';
        $email = '<p class="comment-form-email"><input placeholder="' . esc_html__('Email*', 'arrow') . '" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" id="email" name="email" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req . '/></p>';
        $url = '<p class="comment-form-url"><input placeholder="' . esc_html__('Website', 'arrow') . '" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" id="url" name="url" maxlength="200" /></p></div>';

        $args = array(
            'title_reply' => esc_html__('Write a comment', 'arrow'),
            'comment_notes_after' => '',
            'fields' => apply_filters('comment_form_default_fields', array(
                'author' => $author,
                'email' => $email,
                'url' => $url,
            )),
            'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
            'title_reply_after' => '</h3>',
            'comment_field' => '<p class="comment-form-comment"><textarea name="comment" placeholder="' . esc_html__('Comment', 'arrow') . '" id="comment" cols="45" rows="8" max-length="65525" aria-required="true" required="required"></textarea>',
        );

        comment_form($args);

        $comment_form = ob_get_clean();
        $comment_form = str_replace('novalidate', '', $comment_form);

        return $comment_form;
    }
}

/**
 * Related Post
 */
if (!function_exists('arrow_single_related_post')) {
    function arrow_single_related_post()
    {
        global $post;

        if (!arrow_get_option('blog_single_show_posts')) {
            return;
        }

        $type = arrow_get_option('blog_single_posts', 'related');
        $title = arrow_get_option('blog_single_posts_title', esc_html__('Related News', 'arrow'));

        $arpg = array(
            'posts_per_page' => 3,
            'ignore_sticky_posts' => 1,
        );

        $custom_image_size = arrow_get_option('custom_image_sizes');
        $size = array(
            'width' => arrow_get_value_in_array($custom_image_size, 'rp_width'),
            'height' => arrow_get_value_in_array($custom_image_size, 'rp_height'),
            'crop' => arrow_get_value_in_array($custom_image_size, 'rp_crop'),
        );

        switch ($type) {
            case 'commented':
                $arpg['orderby'] = 'comment_count';

                break;
            case 'random':
                $arpg['orderby'] = 'rand';

                break;
            case 'related':
                $tags = wp_get_post_tags($post->ID);
                $ids = array();

                if (!empty($tags)) {
                    foreach ($tags as $term) {
                        $ids[] = $term->term_id;
                    }
                }

                $arpg['tag__in'] = $ids;
                $arpg['post__not_in'] = array($post->ID);
                $arpg['orderby'] = 'rand';

                break;

            default:
                $arpg['orderby'] = 'date';

                break;
        }

        $related_post_query = new WP_Query($arpg);

        ?>
        <div class="arrow-related-post">
            <h3>
                <?php echo esc_attr($title); ?>
            </h3>
            <div class="related-post-content">
                <div class="row">
                    <?php
                    if ($related_post_query->have_posts()) :
                        while ($related_post_query->have_posts()) :
                            $related_post_query->the_post();

                            global $post;

                            $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url($post->ID) : get_template_directory_uri() . '/images/frontend/placeholder.png';
                            ?>
                            <div class="item-post col-md-4">
                                <div class="item-image">
                                    <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                        <img src="<?php echo arrow_generate_image($thumb_url, $size); ?>"
                                             alt="<?php echo get_the_title(); ?>"/>
                                    </a>
                                </div>
                                <div class="item-details">
                                    <div class="item-cat">
                                        <?php echo arrow_generate_html_terms_list($post->ID, 'category'); ?>
                                    </div>
                                    <div class="item-title">
                                        <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                            <?php echo get_the_title($post->ID); ?>
                                        </a>
                                    </div>
                                    <div class="item-date">
                                        <?php echo get_the_date(); ?>
                                    </div>
                                    <div class="item-excerpt">
                                        <?php echo arrow_get_excerpt_by_id($post->ID, 20); ?>
                                    </div>
                                    <div class="item-button">
                                        <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                            <?php echo esc_html__('Read more', 'arrow'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                    endif;

                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <?php
    }

    add_action('arrow_single_post_after_content', 'arrow_single_related_post');
}

if (!function_exists('arrow_share_icon')) {
    function arrow_share_icon()
    {

        $share_link = arrow_get_option('opt-group-share-link');

        if(!empty($share_link)){
            echo '<div class="arrow_share_icon d-flex">';
            foreach ($share_link as $share) {
                $icon_link     = arrow_get_value_in_array( $share, 'link-icon-share' , '#' ) ;
                $icon     = arrow_get_value_in_array( $share, 'upload-share-link','') ;
                $background    = arrow_get_value_in_array( $share, 'background-icon-share','') ;
                ?>
                <div class="share-icon" style="background-color :<?php echo $background['background-color'];  ?>; ">
                    <a class="icon-link" href="<?php echo $icon_link  ?>"><i class="<?php echo $icon ?>"></i></a>
                </div>
                 <?php
            }
            echo '</div>';
        }

    }
}



if (!function_exists('arrow_related_posts')) {
    function arrow_related_posts($cat)
    {
        ;
//        var_dump($cat);
        echo '<div class="related-posts-title col-12">';
        if (!arrow_get_option('related_posts')==''){
            echo arrow_get_option('related_posts');
        }else {
            echo esc_html__('Related Posts');
        }
        echo '</div>';

        $ads_query=array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'cat' => $cat,
            'posts_per_page' => 3,
            'orderby' => 'rand',

        );
        $ads_query = new WP_query($ads_query);

        global $post;
        while ($ads_query->have_posts()) : $ads_query->the_post();
            echo '<div class="related-posts-other col-md-4">';
            arrow_blog_thumbnail('full');
            echo '<div class="d-flex blog-author">';
            arrow_blog_author();
            echo '&nbsp';
            echo arrow_generate_html_terms_list($post->ID, 'category');
            echo '</div>';
            arrow_blog_title();
            echo '<div class="posts-other-load"><a href="';
            the_permalink();
            echo '">';
            arrow_get_option('button_continue_reading');
            echo '</a></div></div>';
        endwhile;
        wp_reset_postdata();
    }
}

if (!function_exists('arrow_post_id')) {
    function arrow_post_id()
    {
        $select=arrow_get_option('select_posts') ? arrow_get_option('select_posts') : array('url' => '');

        if ($select=='option-3'){
            return 'a';

        }elseif($select=='option-2') {
            global $post;
            $terms = wp_get_post_terms( $post->ID,'category');
            foreach ( $terms as $term ) {
                return $term->term_id;
            }

        }


    }
}

