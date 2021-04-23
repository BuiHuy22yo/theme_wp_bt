<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 3/29/2021
 * Time: 9:06 AM
 */

global $post;
?>

<article id="post-<?php esc_attr(the_ID()); ?>" <?php post_class(); ?>>
    <?php arrow_single_thumbnail(); ?>
    <div class="post-meta d-flex">
        <?php arrow_single_author(); ?>
        <?php arrow_single_date(); ?>
        <?php echo arrow_generate_html_terms_list($post->ID, 'category'); ?>
    </div>
    <div class="arrow_single_title">
        <?php arrow_single_title(); ?>
    </div>
    <div class="arrow_single_content">
        <?php arrow_single_content(); ?>
    </div>
    <?php echo arrow_generate_html_terms_list($post->ID, 'post_tag'); ?>
    <?php arrow_share_icon();?>

</article>
