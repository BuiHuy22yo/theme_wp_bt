<?php
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * Footer area
 */
if ( ! function_exists( 'arrow_footer_area' ) ) {
	function arrow_footer_area( $slug = '_en' ) {
		$html = array();

		$footer_option = arrow_get_option( 'footer_oc_option' );
		//== [ Option Slug ]
		$logo      = arrow_get_value_in_array( $footer_option, 'logo' . $slug ) ? arrow_get_value_in_array( $footer_option, 'logo' . $slug ) : array( 'url' => '' );
		$contact   = arrow_get_value_in_array( $footer_option, 'contact' . $slug );
		$menu_1    = arrow_get_value_in_array( $footer_option, 'menu_1' . $slug );
		$menu_2    = arrow_get_value_in_array( $footer_option, 'menu_2' . $slug );
		$socials   = arrow_get_value_in_array( $footer_option, 'socials' . $slug );
		$address   = arrow_get_value_in_array( $footer_option, 'address' . $slug );
		$payments  = arrow_get_value_in_array( $footer_option, 'payment' . $slug );
		$copyright = arrow_get_value_in_array( $footer_option, 'copyright' . $slug );

		//== [ Config Option ]
		$menu_1_item = wp_get_nav_menu_items( $menu_1['menu_chose'], array( 'order' => 'DESC' ) );
		$menu_2_item = wp_get_nav_menu_items( $menu_2['menu_chose'], array( 'order' => 'DESC' ) );

		$html[] = '<footer class="arrow-footer">';
		$html[] = '<div class="main-footer">';
		//== [ Row Top ]
		$html[] = '<div class="container"><div class="row row-cols-1 row-cols-md-2">';

		//===============================================[ Column ]=====================================================
		$html[] = '<div class="col">';
		$html[] = '<div class="logo-footer"><a href="' . esc_url( home_url( '/' ) ) . '"><img src="' . esc_url( $logo['url'] ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '"></a></div>';
		$html[] = '</div>';
		//===============================================[ Column ]=====================================================
		$html[] = '<div class="col">';
		$html[] = '<div class="contact-wrapper">';
		$html[] = '<h4 class="widget-title">' . $contact['widget_title'] . '</h4>';
		$html[] = do_shortcode( shortcode_unautop( '[contact-form-7 id="' . $contact['form_id'] . '"]' ) );
		$html[] = '</div>';
		$html[] = '</div>';

		$html[] = '</div>';
		//== [ End Row Top ]
		//== [ Row Main ]
		$html[] = '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">';

		//===============================================[ Column ]=====================================================
		$html[] = '<div class="col">';
		$html[] = '<div class="menu-footer">';
		$html[] = '<h4 class="widget-title">' . $menu_1['widget_title'] . '</h4>';
		if ( $menu_1_item ) {
			$html[] = '<ul class="menu-nav list-style-type pdm-0">';
			foreach ( $menu_1_item as $item ) {
				$html[] = '<li class="menu-item"><a href="' . $item->url . '"><span>' . $item->title . '</span></a></li>';
			}
			$html[] = '</ul>';
		}
		$html[] = '</div>';
		$html[] = '</div>';

		//===============================================[ Column ]=====================================================
		$html[] = '<div class="col">';
		$html[] = '<div class="menu-footer">';
		$html[] = '<h4 class="widget-title">' . $menu_2['widget_title'] . '</h4>';
		if ( $menu_2_item ) {
			$html[] = '<ul class="menu-nav list-style-type pdm-0">';
			foreach ( $menu_2_item as $item ) {
				$html[] = '<li class="menu-item"><a href="' . $item->url . '"><span>' . $item->title . '</span></a></li>';
			}
			$html[] = '</ul>';
		}
		$html[] = '</div>';
		$html[] = '</div>';

		//===============================================[ Column ]=====================================================
		$html[] = '<div class="col">';
		$html[] = '<div class="socials-footer">';
		$html[] = '<h4 class="widget-title">' . $socials['widget_title'] . '</h4>';
		if ( $socials['social_item'] ) {
			$html[] = '<ul class="socials-list list-style-type pdm-0">';
			foreach ( $socials['social_item'] as $social ) {
				switch ( $social['social_type'] ) {
					case 'facebook':
						$icon = 'facebook-f"';
						break;
					case 'pinterest':
						$icon = 'pinterest-p';
						break;
					default:
						$icon = $social['social_type'];
				}
				$html[] = '<li class="social ' . $social['social_type'] . '"><a href="' . $social['social_link'] . '" target="_blank"><i class="fab fa-' . $icon . '"></i></a></li>';
			}
			$html[] = '</ul>';
		}
		$html[] = '</div>';
		$html[] = '</div>';

		//===============================================[ Column ]=====================================================
		if ( $address ) {
			foreach ( $address as $addressDetail ) {
				$html[] = '<div class="col">';
				$html[] = '<div class="address-footer">';
				$html[] = '<h4 class="widget-title">' . $addressDetail['widget_title'] . '</h4>';
				$html[] = '<div class="address-detail">' . wpautop( $addressDetail['address_content'] ) . '</div>';
				$html[] = '</div>';
				$html[] = '</div>';
			}
		}
		$html[] = '</div></div>';
		//== [ End Row Main ]
		$html[] = '</div>'; //== [ End Main Footer ]

		$html[] = '<div class="bottom-bar">';
		$html[] = '<div class="container"><div class="row">';

		//===============================================[ Column ]=====================================================
		$html[] = '<div class="col-12 col-md-6 col-lg-7">';
		$html[] = '<div class="copyright">' . wpautop( $copyright ) . '</div>';
		$html[] = '</div>';

		//===============================================[ Column ]=====================================================
		$html[] = '<div class="col-12 col-md-6 col-lg-5">';
		$html[] = '<div class="payment-logo">';
//		foreach ( $payments as $payment ) {
//			$html[] = '<div class="pay-img"><img src="' . $payment['payment_logo']['url'] . '" alt=""></div>';
//		}
		$html[] = '</div>';
		$html[] = '</div>';

		$html[] = '</div></div>';
		$html[] = '</div>';
		//== [ End BottomBar ]
		$html[] = '</footer>';

		return implode( "\n", $html );
	}
}



/**
 * Render Footer
 */
if(! function_exists('arrow_footer')){
    function arrow_footer() {
        //$html =array();

        echo '<footer class="arrow-footer">';
        echo '<div class="main-footer">';
        echo '<div class="footer-top">';
        echo '<div class="container">';
        arrow_footer_widget();
        echo '</div>';
        echo '</div>';
        echo '<div class="footer-bottom">';
        echo '<div class="container">';
        arrow_footer_text();
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</footer>';
    }
}
if (! function_exists('arrow_footer_widget')) {
    function arrow_footer_widget(){
        echo '<div class="row">';
        for ($num=1;$num<=3;$num++){
            echo '<div class="col-md-4 ';
            arrow_footer_widget_class($num);
            echo '">';
             arrow_footer_single_widget($num);
            echo '</div>';
        }
        echo'</div>';
    }
}
if (! function_exists('arrow_footer_widget_class')) {
    function arrow_footer_widget_class($num){
        if($num==1){
            echo 'footer-widget-left';
        } elseif($num==2) {
            echo 'footer-widget-center';
        } else {
            echo 'footer-widget-right';
        }
    }
}
if (! function_exists('arrow_footer_single_widget')) {
    function arrow_footer_single_widget($num){
        if (is_active_sidebar('footer-' . $num)) {
               dynamic_sidebar('footer-' . $num);
        }
    }
}


if (! function_exists('arrow_footer_text')) {
    function arrow_footer_text(){
        echo '<div class="arrow-footer_bottom">';
        echo arrow_get_option('footer_text');
        echo '<div>';
    }
}

