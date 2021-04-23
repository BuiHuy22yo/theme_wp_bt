<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 9/28/2019
 * Time: 9:56 AM
 */
?>

<header class="<?php echo arrow_header_generate_class('header-1')['wrap']; ?>">
    <div class="<?php echo arrow_header_generate_class('header-1')['inner']; ?>">
        <div class="arrow-inner-header row d-flex align-items-center">
            <div class="h-left-logo d-flex justify-content-between align-items-center col-8 col-md-3">
                <?php echo arrow_header_menu_mobile_actions('d-inline-flex d-md-none') ?>
                <?php echo arrow_logo(); ?>

            </div>
            <div class="h-center-menu d-none d-md-flex col-md-6 ">
                <!--                <div class="r-top">-->
                <!--                    --><?php //echo arrow_get_language_location(); ?>
                <!--                </div>-->
                <?php echo arrow_header_main_menu(); ?>
            </div>
            <div class="h-right-icon col-4 col-md-3 d-flex justify-content-end align-items-center">
                <?php echo arrow_header_icon_search() ?>
                <?php echo arrow_header_account() ?>
                <?php echo arrow_header_icon_cart() ?>
            </div>
        </div>
    </div>
</header>
