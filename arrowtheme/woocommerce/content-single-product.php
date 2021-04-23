<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
remove_action('woocommerce_before_single_product', 'woocommerce_output_all_notices', 10);
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>


    <div class="summary entry-summary">
        <?php
        /**
         * Hook: woocommerce_single_product_summary.
         *
         * @hooked woocommerce_template_single_title - 5
         * @hooked woocommerce_template_single_rating - 10
         * @hooked woocommerce_template_single_price - 10
         * @hooked woocommerce_template_single_excerpt - 20
         * @hooked woocommerce_template_single_add_to_cart - 30
         * @hooked woocommerce_template_single_meta - 40
         * @hooked woocommerce_template_single_sharing - 50
         * @hooked WC_Structured_Data::generate_product_data() - 60
         */
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);

        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
        remove_action('woocommerce_single_product_summary', 'generate_product_data', 60);
        do_action('woocommerce_single_product_summary');
        ?>
    </div>

    <?php
    /**
     * Hook: woocommerce_before_single_product_summary.
     *
     * @hooked woocommerce_show_product_sale_flash - 10
     * @hooked woocommerce_show_product_images - 20
     */
    remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
    //remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_images',20);

    do_action('woocommerce_before_single_product_summary');
    ?>
    <div class="button-single button-single-produce d-md-flex justify-content-center">
        <div class="button padding_view" style="background-color: <?php echo arrow_get_option('color_view','green')?>">
            <a href="<?php echo get_post_meta( get_the_ID(), 'link_view_demo', true ); ?>" class="button-link"><?php echo arrow_get_option('button_view','demo'); ?></a>
        </div>
        <div class="button padding_download" style="background-color: <?php echo arrow_get_option('color_download','blue')?>">
            <a href=" <?php echo get_post_meta(get_the_ID(), 'link_download', true ); ?>" class="button-link"><?php echo arrow_get_option('button_download','demo'); ?></a>
        </div>
        <div class="button padding_buy" style="background-color: <?php echo arrow_get_option('color_buy','red')?>">
            <?php
            add_filter( 'add_to_cart_text', 'woo_custom_cart_button_text' );
            add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );

            function woo_custom_cart_button_text()
            {
                return __( buy_now(), 'woocommerce');

            }
            //                }
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
            add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

            do_action('woocommerce_single_product_summary');
            remove_filter( 'add_to_cart_text', 'woo_custom_cart_button_text' );
            remove_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );
            ?>
<!--            <a href=" " class="button-link"></a></div>-->
        </div>
    </div>

    <?php
    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
    do_action('woocommerce_after_single_product_summary');
    ?>
</div>

<?php do_action('woocommerce_after_single_product'); ?>
