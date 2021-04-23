<?php
if (!defined('ABSPATH')) {
    return;
}
/**
 * Chosen header from option
 */
if (!function_exists('arrow_header')) {
    function arrow_header()
    {
        $header_layout = arrow_get_option('header_layout', 'header-1');

        if (is_page()) {
            global $post;

            $page_meta = get_post_meta($post->ID, '_page_options', true);
            $header_layout = (arrow_get_value_in_array($page_meta, 'header_page_setting') == 'custom') ? $page_meta['header_layout'] : $header_layout;
        }

        get_template_part('components/header/' . $header_layout);

        echo arrow_mobile_menu();
    }
}

/**
 * Generate header params
 */
if (!function_exists('arrow_header_general_params')) {
    function arrow_header_general_params()
    {
        $header_fullwidth = (boolean)arrow_get_option('header_fullwidth', false);
        $header_transparent = (boolean)arrow_get_option('header_transparent', false);
        $header_sticky = (boolean)arrow_get_option('header_sticky', false);
        if (is_page()) {
            global $post;

            $page_meta = get_post_meta($post->ID, '_page_options', true);
            $header_fullwidth = (arrow_get_value_in_array($page_meta, 'header_page_setting') == 'custom') ? $page_meta['header_fullwidth'] : $header_fullwidth;
            $header_transparent = (arrow_get_value_in_array($page_meta, 'header_page_setting') == 'custom') ? $page_meta['header_transparent'] : $header_transparent;
            $header_sticky = (arrow_get_value_in_array($page_meta, 'header_page_setting') == 'custom') ? $page_meta['header_sticky'] : $header_sticky;
        }

        $params = array(
            'is_fullwidth' => $header_fullwidth,
            'is_transparent' => $header_transparent,
            'is_sticky' => $header_sticky
        );

        return $params;
    }
}

/**
 * General header class
 */
if (!function_exists('arrow_header_generate_class')) {
    function arrow_header_generate_class($custom_class)
    {
        $general_options = arrow_header_general_params();
        $header_class = array(
            'arrow-header',
            'header-sticky',
            $general_options['is_transparent'] ? 'header-transparent' : '',
            $general_options['is_sticky'] ? 'header-sticky' : '',
            $custom_class
        );

        $inner_class = $general_options['is_fullwidth'] ? 'container-fluid' : 'container';

        return array(
            'wrap' => implode(' ', $header_class),
            'inner' => $inner_class
        );
    }
}

/**
 * Render site logo.
 */
if (!function_exists('arrow_logo')) {
    function arrow_logo()
    {
        $home_url = esc_url(home_url('/'));
        $html = array();
        $logo = arrow_get_option('logo') ? arrow_get_option('logo') : array('url' => '');
        $alt = esc_attr(get_bloginfo('name'));


        $html[] = '<div id="arrow-site-logo" class="arrow-site-logo">';

        if ($logo) {
            $html[] = '<a href="' . esc_url($home_url) . '">';
            $html[] = $logo ? '<img class="arrow-logo" src="' . esc_url($logo) . '" alt="' . $alt . '"/>' : '';
            $html[] = '</a>';
        } else {
            $html[] = '<h1 class="site-name"><a href="' . esc_url($home_url) . '">' . $alt . '</a></h1>';
        }

        $html[] = '</div>';

        return implode("\n", $html);
    }
}

/**
 * Render main navigation menu.
 */
if (!function_exists('arrow_header_main_menu')) {
    function arrow_header_main_menu()
    {
        $html = array();

        $html[] = '<nav id="arrow-site-nav" class=" arrow-nav-main">';

        ob_start();

        if (has_nav_menu('primary')) {
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'main-nav d-flex justify-content-between',
                'link_before' => '',
                'link_after' => '',
            ));
        }

        $html[] = ob_get_clean();

        $html[] = '</nav>';

        return implode("\n", $html);
    }
}

/**
 * Generate header mobile menu
 */
if (!function_exists('arrow_mobile_menu')) {
    function arrow_mobile_menu()
    {
        $html = array();
        $html[] = '<div id="arrow-navigation-mobile" class="d-md-none menu-mobile">';

        ob_start();

        if (has_nav_menu('mobile')) {
            wp_nav_menu(array(
                'theme_location' => 'mobile',
            ));
        } else {
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'mobile' => true,
            ));
        }

        $html[] = ob_get_clean();

        $html[] = '</div>';

        return implode("\n", $html);

    }
}

/**
 * Generate header mobile icon.
 */
//== [ Render action menu mobile ]
if (!function_exists('arrow_header_menu_mobile_actions')) {
    function arrow_header_menu_mobile_actions($custom)
    {
        $html = array();

//$a=arrow_get_option($a);
        if (has_nav_menu('mobile-menu')) {
        $html[] = '<div id = "arrow-menu-toggle" class="hamburger-menu-mobile ' . $custom . '">';
        $html[] = '<a class="d-flex" ><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg"><line y1="14.5" x2="20" y2="14.5" stroke="black"></line><line y1="7.5" x2="20" y2="7.5" stroke="black"></line><line y1="0.5" x2="20" y2="0.5" stroke="black"></line></svg></a>';;
        $html[] = '</div>';
    }

        return implode("\n", $html);
    }
}

/**
 * Render icon search.
 */
if (!function_exists('arrow_header_icon_search')) {
    function arrow_header_icon_search()
    {
        $html = array();

        if (!arrow_get_option('header_enable_search')) {
            return;
        }
        $html[] = '<div class="arrow-h-search">';
        $html[] = '<div class="search-icon-action hide-min-lg st">';
        $html[] = '<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.49996 2.75C8.16495 2.75 6.85991 3.14588 5.74989 3.88757C4.63986 4.62927 3.7747 5.68347 3.26381 6.91686C2.75292 8.15026 2.61925 9.50745 2.8797 10.8168C3.14015 12.1262 3.78302 13.3289 4.72702 14.2729C5.67102 15.2169 6.87375 15.8598 8.18311 16.1202C9.49248 16.3807 10.8497 16.247 12.0831 15.7361C13.3165 15.2252 14.3707 14.3601 15.1124 13.25C15.854 12.14 16.2499 10.835 16.2499 9.49996C16.2498 7.70979 15.5386 5.99298 14.2728 4.72714C13.0069 3.46131 11.2901 2.75011 9.49996 2.75V2.75Z" stroke="#303030" stroke-width="2" stroke-miterlimit="10"/><path d="M14.5361 14.5361L19.2502 19.2502" stroke="#303030" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"/></svg>';
        $html[] = '</div>';

		$html[] = '<div class="site-nav-canvas">';
		$html[] = '<div class="site-search-container">';
		$html[] = '<div class="search-box wpo-wrapper-search">';

        $html[] = '<form method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">';
		$html[] = '<div class="form-content">';
		$html[] = '<input type="search" placeholder="' . esc_html__( 'Looking for...', 'arrow' ) . '" name="s" />';
		$html[] = '<div class="btnSearch d-lg-none d-lg-inline-block">';
		$html[] = '<svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M25.909 7.5C22.268 7.5 18.7089 8.57967 15.6815 10.6025C12.6542 12.6253 10.2946 15.5004 8.90131 18.8642C7.50798 22.228 7.14342 25.9294 7.85373 29.5004C8.56405 33.0714 10.3173 36.3516 12.8919 38.9261C15.4664 41.5006 18.7466 43.2539 22.3176 43.9642C25.8886 44.6746 29.59 44.31 32.9538 42.9167C36.3176 41.5233 39.1927 39.1638 41.2155 36.1365C43.2383 33.1091 44.318 29.5499 44.318 25.909C44.3177 21.0267 42.3781 16.3445 38.9258 12.8922C35.4735 9.43992 30.7913 7.50031 25.909 7.5V7.5Z" stroke="#BCBCBC" stroke-width="3" stroke-miterlimit="10"/>
<path d="M39.6426 39.6436L52.4992 52.5002" stroke="#BCBCBC" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"/>
</svg>';

    $html[] = '</div>';
        $html[] = '<div class="close-button"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M28.8008 24.9843L49.2822 4.08632C49.7297 3.62633 49.977 3.00898 49.9703 2.36847C49.9636 1.72796 49.7035 1.11585 49.2464 0.665262C49.0206 0.442471 48.7527 0.266591 48.4582 0.147532C48.1637 0.0284728 47.8483 -0.0312266 47.5305 -0.0282116C47.2126 -0.0251965 46.8986 0.0405212 46.6064 0.165146C46.3142 0.28977 46.0498 0.470685 45.8282 0.697719L25.3825 21.5635L4.09045 0.665262C3.86452 0.442668 3.59663 0.266863 3.30213 0.147928C3.00763 0.0289917 2.69239 -0.0306323 2.37462 -0.0276178C2.05685 -0.0246034 1.74276 0.0410404 1.45059 0.165541C1.15842 0.290042 0.893938 0.470879 0.672302 0.697719C0.224335 1.15728 -0.0235636 1.77447 -0.0174683 2.41498C-0.0113731 3.05548 0.248157 3.66756 0.704788 4.11858L21.966 24.9843L0.704788 45.8501C0.248157 46.3011 -0.0113731 46.9134 -0.0174683 47.5539C-0.0235636 48.1944 0.224335 48.8116 0.672302 49.2711C0.893712 49.4984 1.15809 49.6795 1.45029 49.8043C1.74249 49.929 2.05673 49.9948 2.37462 49.9979C2.69252 50.0009 3.0078 49.9411 3.30233 49.8219C3.59686 49.7027 3.86474 49.5264 4.09045 49.3034L25.3825 28.4054L45.8282 49.2711C46.0525 49.502 46.3211 49.6855 46.6181 49.8108C46.915 49.9362 47.2343 50.0007 47.5568 50.0006C47.8712 50.0018 48.1829 49.9408 48.4735 49.8211C48.7641 49.7014 49.0279 49.5254 49.2497 49.3034C49.7067 48.8528 49.9668 48.2409 49.9735 47.6004C49.9802 46.9599 49.733 46.3425 49.2854 45.8825L28.8008 24.9843Z" fill="#219CEB"/>
</svg>
 </div>';
		$html[] = '</div>';
		$html[] = '</form>';

		$html[] = '</div>';
		$html[] = '</div>';
		$html[] = '</div>';
        $html[] = '</div>'; //== [ End arrow2 search ]

        return implode("\n", $html);
    }
}

/**
 * Render icon cart.
 */
if (!function_exists('arrow_header_icon_cart')) {
    function arrow_header_icon_cart($type = 'icon', $icon = false, $image = false)
    {
        if (!class_exists('WooCommerce') || !arrow_get_option('header_enable_cart')) {
            return;
        }

        $count = WC()->cart->cart_contents_count;

        ob_start();
        woocommerce_mini_cart();
        $mini_cart = ob_get_clean();
        $text = ' item ';
        $html = array();

        $html[] = '<div class="arrow-icon-cart">';
//        $html[] = '<a class="arrow-btn-cart" href="' . esc_url( wc_get_cart_url() ) . '">';
//
//        //$html[] = '<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 16H0V5H15V16ZM0.789474 15.1665H14.1228V5.84209H0.789474V15.1665Z" fill="#2D2D2D"></path><path d="M11.1586 7.25279H10.4849V3.78071C10.4849 2.08325 9.13752 0.694416 7.49074 0.694416C5.84395 0.694416 4.49658 2.08325 4.49658 3.78071V7.17563H3.74805V3.78071C3.74805 1.69746 5.39483 0 7.49074 0C9.58664 0 11.2334 1.69746 11.2334 3.78071V7.25279H11.1586Z" fill="#2D2D2D"></path><path d="M5.09591 6.48145H3V7.25302H5.09591V6.48145Z" fill="#2D2D2D"></path><path d="M11.8322 6.48145H9.73633V7.25302H11.8322V6.48145Z" fill="#2D2D2D"></path></svg>';
//        $html[] = '<i class="far fa-shopping-cart"></i>';
//        $html[] = '<span class="nm"><span class="cart-count">' . $count .' </span></span>';
//
//        $html[] = '</a>';
        $html[] = '<a class="arrow-cart-btn d-flex justify-content-between" href="' . esc_url(wc_get_cart_url()) . '">';
        $html[] = '<div class ="cart-left">';
        $html[] = '<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10.3125 25.3125C10.8303 25.3125 11.25 24.8928 11.25 24.375C11.25 23.8572 10.8303 23.4375 10.3125 23.4375C9.79473 23.4375 9.375 23.8572 9.375 24.375C9.375 24.8928 9.79473 25.3125 10.3125 25.3125Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M23.4375 25.3125C23.9553 25.3125 24.375 24.8928 24.375 24.375C24.375 23.8572 23.9553 23.4375 23.4375 23.4375C22.9197 23.4375 22.5 23.8572 22.5 24.375C22.5 24.8928 22.9197 25.3125 23.4375 25.3125Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M2.8125 4.6875H6.5625L9.375 20.625H24.375" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M9.375 16.875H23.9906C24.099 16.8751 24.2041 16.8376 24.288 16.7689C24.3718 16.7002 24.4293 16.6045 24.4506 16.4982L26.1381 8.06074C26.1517 7.99271 26.15 7.9225 26.1332 7.85518C26.1164 7.78786 26.0849 7.72511 26.0409 7.67147C25.9969 7.61782 25.9415 7.57461 25.8788 7.54496C25.816 7.51531 25.7475 7.49995 25.6781 7.5H7.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
';
        $html[] = '</div>';

        $html[] = '<div class ="cart-center d-none d-lg-block">';
        $html[] = '<span class="cart-count ">' . $count . ' ' . $text . ' </span>';
        $html[] = '</div>';
        $html[] = '<div class ="cart-right d-none d-lg-block">';
        $html[] = '<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.5575 5.87988L9 9.31488L12.4425 5.87988L13.5 6.93738L9 11.4374L4.5 6.93738L5.5575 5.87988Z" fill="white"/>
</svg>
';
        $html[] = '</div>';


//        $html[] = '<span class="arrow-down"></span>';
        $html[] = '</a>';
        //$html[] = '<a class="arrow-cart-text" href="' . esc_url( wc_get_cart_url() ) . '">item</a>';
        $html[] = '</div>';

        return implode("\n", $html);
    }
}

/**
 * Render button list
 */
if (!function_exists('arrow_header_button_actions')) {
    function arrow_header_button_actions()
    {
        $html = array();

        $html[] = '<div class="arrow-header-btn">';

        $html[] = arrow_header_icon_search('svg');

        $html[] = arrow_header_account();

        $html[] = arrow_header_icon_cart('svg');

        $html[] = arrow_header_menu_mobile_actions('d-none d-md-inline-flex d-lg-none');

        $html[] = '</div>';

        return implode("\n", $html);
    }
}

//== [ Render Header account ]
if (!function_exists('arrow_header_account')) {
    function arrow_header_account()
    {
        $user_url = get_permalink(get_option('woocommerce_myaccount_page_id')) ? get_permalink(get_option('woocommerce_myaccount_page_id')) : '#';
        $html = array();

        $html[] = '<div class="account-handle">';
        $html[] = '<a class="account-icon" href="' . $user_url . '">';
        //$html[] = '<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.99952 8C4.79727 8 2.98828 6.19608 2.98828 4C2.98828 1.80392 4.79727 0 6.99952 0C9.20176 0 11.0108 1.80392 11.0108 4C11.0108 6.19608 9.20176 8 6.99952 8ZM6.99952 1.01961C5.34783 1.01961 4.01075 2.35294 4.01075 4C4.01075 5.64706 5.34783 6.98039 6.99952 6.98039C8.6512 6.98039 9.98828 5.64706 9.98828 4C9.98828 2.35294 8.6512 1.01961 6.99952 1.01961Z" fill="#2D2D2D"></path><path d="M13.5281 15.9998H0.47191C0.157303 15.9998 0 15.7645 0 15.5292V12.0782C0 11.5292 0.235955 11.0586 0.707865 10.8233C4.48315 8.47036 9.59551 8.47036 13.3708 10.8233C13.764 11.0586 14.0787 11.6076 14.0787 12.0782V15.5292C14 15.7645 13.764 15.9998 13.5281 15.9998ZM1.02247 14.9802H13.0562V12.0782C13.0562 11.9213 12.9775 11.7645 12.8202 11.686C9.35955 9.5684 4.7191 9.5684 1.25843 11.686C1.10112 11.7645 1.02247 11.9213 1.02247 12.0782V14.9802Z" fill="#2D2D2D"></path></svg>';
        $html[] = '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14 4.375C10.6265 4.375 7.875 7.12646 7.875 10.5C7.875 12.6089 8.95166 14.4819 10.582 15.5859C7.46143 16.9258 5.25 20.0225 5.25 23.625H7C7 19.749 10.124 16.625 14 16.625C17.876 16.625 21 19.749 21 23.625H22.75C22.75 20.0225 20.5386 16.9258 17.418 15.5859C19.0483 14.4819 20.125 12.6089 20.125 10.5C20.125 7.12646 17.3735 4.375 14 4.375ZM14 6.125C16.4268 6.125 18.375 8.07324 18.375 10.5C18.375 12.9268 16.4268 14.875 14 14.875C11.5732 14.875 9.625 12.9268 9.625 10.5C9.625 8.07324 11.5732 6.125 14 6.125Z" fill="#303030"/>
</svg>
';
        $html[] = '</a>';
        $html[] = '</div>';

        return implode("\n", $html);
    }
}


if (!function_exists('arrow_banner')) {
    function arrow_banner()
    {
        global $post;
        $html = array();

        $angle = arrow_get_option('banner_angle');
        $opacity1 = arrow_get_option('banner_opacity1');
        $opacity2 = arrow_get_option('banner_opacity2');


        $angle = arrow_get_option('banner_angle') != null ? $angle . 'deg' : '0deg';
        $color1 = arrow_get_option('banner_color1') ? arrow_get_option('banner_color1') : array('url' => '');
        $opacity1 = arrow_get_option('banner_opacity1') != null ? $opacity1 . '%' : '0%';

        $color2 = arrow_get_option('banner_color2') ? arrow_get_option('banner_color2') : array('url' => '');
        $opacity2 = arrow_get_option('banner_opacity2') != null ? $opacity2 . '%' : '0%';


        $html[] = '<div class="banner" style="background: linear-gradient(' . $angle . ',' . $color1 . ' ' . $opacity1 . ',' . $color2 . ' ' . $opacity2 . ')">';
        $html[] = '<div class="container-fluid">';
        $html[] = '<div class="banner_inner" >';
        $html[] = '<div class="page_name">';

//           arrow_single_title();

        $html[] = '<h3 class="entry-title">';
        $html[] = '<a class="title-single-page" href="' . esc_url(get_the_permalink($post->ID)) . '">';
        if(!is_single()){
            $html[] =  get_the_title($post->ID);
        }else{
            if (!arrow_get_option('title_single') =='') {
                $html[] = arrow_get_option('title_single');
            } else {
                $html[] = 'Blog Detail';
            }
        }

        //$html[] =  get_the_title($post->ID);
        $html[] = '</a>';
        $html[] = '</h3>';
        $html[] = '</div>';
        $html[] = '<div class="page_breadcrumd">';
        $html[] = arrow_breadcrumb();
        $html[] = '</div>';
        $html[] = '</div>';
        //$html[] ='<div class="banner_inner">';
        $html[] = '</div>';

        $html[] = '</div>';

        return implode("\n", $html);

    }

}