<?php ?>
<div class="sidebar col-lg-3 d-none d-lg-block">
    <?php if (is_active_sidebar('primary-bar')) {
        dynamic_sidebar('primary-bar');
    } ?>

    <?php arrow_sidebar_ads(); ?>
    <?php arrow_sidebar_other_post(); ?>

</div>