<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/7/2020
 * Time: 2:24 PM
 */

//if (!class_exists('Arrow2_Elementor')) {
//	class Arrow2_Elementor {
//		public function __construct() {
//			add_action('elementor/elements/categories_registered', array(__CLASS__, 'create_elementor_categories'), 99);
//			add_action('elementor/widgets/widgets_registered', array(__CLASS__, 'remove_default_widget'), 15);
//			add_action('elementor/widgets/widgets_registered', array(__CLASS__, 'init_widgets'));
//		}
//
//		public function create_elementor_categories($elements_manager) {
//			$elements_manager->add_category(
//				'Arrow2-base',
//				[
//					'title' => __('Arrow2 Base', 'Arrow2-helper'),
//					'icon' => 'fa fa-plug',
//				]
//			);
//		}
//
//		public static function remove_default_widget($widget_manager) {
//			//$widget_manager->unregister_widget_type('button');
//		}
//
//		public static function init_widgets() {
//			$patch	= Arrow2_HELPER_DIR_PATH . '/elementor/';
//
//			// Load general options
//			require_once $patch . '/options/button/content.php';
//			require_once $patch . '/options/button/style.php';
//
//			require_once $patch . '/options/image/content.php';
//			require_once $patch . '/options/image/style.php';
//
//			require_once $patch . '/options/typography/style.php';
//
//			// Load list widgets
//			require_once $patch . '/button.php';
//			require_once $patch . '/blog.php';
//			require_once $patch . '/heading.php';
//			require_once $patch . '/info-box.php';
//			require_once $patch . '/text-image.php';
//			require_once $patch . '/team.php';
//			require_once $patch . '/price-table.php';
//			require_once $patch . '/testimonials.php';
//			require_once $patch . '/gallery.php';
//
//			// Register widget
//			\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Arrow2_Elementor_Widget_Button());
//			\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Arrow2_Elementor_Widget_Blog());
//			\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Arrow2_Elementor_Widget_Heading());
//			\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Arrow2_Elementor_Widget_Info_Box());
//			\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Arrow2_Elementor_Widget_Text_Image());
//			\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Arrow2_Elementor_Widget_Team());
//			\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Arrow2_Elementor_Widget_Price_Table());
//			\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Arrow2_Elementor_Widget_Testimonials());
//			\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Arrow2_Elementor_Widget_Gallery());
//		}
//	}
//
//	new Arrow2_Elementor();
//}

