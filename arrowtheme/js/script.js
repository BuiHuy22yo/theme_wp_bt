(function ($, window, document) {
    "use strict";

    let arrow2 = window.arrow2 || {};

    var $body		= $('body'),
        $window		= $(window),
        $loading	= $('.arrow-load');

	arrow2.StickyMenu = function () {
		var header_height = $('.header-sticky').height();
		$(window).scroll(function () {
			if ($(window).scrollTop() > header_height) {
				$('.header-sticky').addClass('affix-mobile');
			} else {
				$('.header-sticky').removeClass('affix-mobile');
			}
		});
	};

	arrow2.MobileMenu = function() {
		if ($window.width() < arrow_script.view_port) {
			$body.addClass('mobile-mode');
		} else {
			$body.removeClass('mobile-mode');
		}

		let toogle_menu = $('#arrow-menu-toggle');

		toogle_menu.on('click', function () {
			if ($body.hasClass('open-menu-mobile')) {
				$body.removeClass('open-menu-mobile');
				$('.mobile-menu-bg').remove();
			} else {
				$body.addClass('open-menu-mobile');
				$body.append('<div class="mobile-menu-bg"></div>');

				$('.mobile-menu-bg').on('click', function () {
					$body.removeClass('open-menu-mobile');
					$('.mobile-menu-bg').remove();
				});
			}
		});
	};

	arrow2.Slide = function() {
		let slick = $('.arrow-slick');
		if (slick.length) {
			slick.slick();
		}
	};

	arrow2.Select = function() {
		let select = $('select');
		if (select.length) {
			select.amyuiFancySelect();
		}
	};

	arrow2.InputNumber = function() {
		let input = $('.qty');
		if (input.length) {
			input.amyuiNumberInput();
		}
	};

	arrow2.Tabs = function() {
		if ($('.arrow-tab-nav').length) {
			$(document).on('click.bs.tab.data-api', '.bs-tab-nav a', function (e) {
				e.preventDefault();
				$(this).tab('show');
			});
		}
	};

	arrow2.Fancybox = function() {
		let fancybox = $('.arrow-fancybox');
		if (fancybox.length) {
			fancybox.fancybox();
		}
	};

	arrow2.Masonry = function() {
		let $masonry = $('.arrow-masonry');
		if ($masonry.length) {
			$masonry.each(function () {
				let $this	= $(this),
					column	= $this.attr('data-column');

				$this.imagesLoaded(function() {
					$this.isotope({
						itemSelector: '.masonry-item',
						masonry: {
							columnWidth: column
						}
					});
				});
			});
		}
	};

	arrow2.HeaderSearch = function() {
		let wrapper = $('.site-nav-canvas');

		$('.st').on('click', function () {
			if (wrapper.hasClass('open')) {
				wrapper.removeClass('open');
			} else {
				wrapper.addClass('open');
			}
		});

		$('.close-button').on('click', function () {
			wrapper.removeClass('open');
		});
	};

	arrow2.WooChangeViewMode = function() {
		$('.woocommerce-view-mode a').on('click', function () {
			let content = $(this).parents('.shop-actions').siblings('.products');

			content.removeClass().addClass('products').addClass('mode-' + $(this).attr('data-view'));

		});
	};

	arrow2.EGallery = function() {
		let gallery = $('.arrow-elementor-gallery');

		gallery.find('.bar-list .item-name').on('click', function () {
			gallery.find('.bar-list .item-name').removeClass('active');
			gallery.find('.item-gallery').removeClass('active');

			$(this).addClass('active');
			gallery.find('.content-list').find('[data-index="' + $(this).attr('data-index') + '"]').addClass('active');
			arrow2.Masonry();
		});
	};

	arrow2.WooQuickView = function() {
		let $btn = $('.arrow-qv-btn');

		$btn.on('click', function (el) {
			el.preventDefault();

			let data = {};

			data['pid'] 	= $(this).attr('data-product');
			data['action']	= 'arrow_woocommerce_shop_quickview';

			$.ajax({
				type: 'POST',
				url: arrow_script.ajax_url,
				data: data,
				dataType: 'json',
				beforeSend: function () {
					$loading.addClass('open');
				},
				success: function (response) {
					$loading.removeClass('open');

					let popup = $('<div/>', {class: 'arrow-popup-quickview'}).append(response);
					$.fancybox.open(popup);
					arrow2.InputNumber();
					arrow2.Select();

				}
			});
		});
	};

	arrow2.WooNotice = function() {
		$(document.body).append('<div id="arrow-wc-popup-message" style="display: none;"><div id="arrow-wc-message"></div></div>').on('wc_fragments_refreshed', function() {
			$('.quantity input[type="number"]').not('.ni-initialized').amyuiNumberInput();
		}).on('adding_to_cart', function($button, data) {}).on('added_to_cart', function(fragments, cart_hash, $button) {
			let $wrapper;
			$('#arrow-wc-message').html(arrow_script.product_added);
			$wrapper = $('#arrow-wc-popup-message');
			$wrapper.css('margin-left', 0 - $wrapper.width() / 2);
			$wrapper.fadeIn();
			setTimeout(function() {
				return $wrapper.fadeOut();
			}, 2000);
		});
	};

    $(document).ready(function () {
		arrow2.StickyMenu();
		arrow2.Tabs();
		arrow2.Fancybox();
		arrow2.Slide();
		arrow2.Masonry();
		arrow2.Select();
		arrow2.InputNumber();
		arrow2.WooChangeViewMode();
		arrow2.EGallery();
		arrow2.WooQuickView();
		arrow2.MobileMenu();
		arrow2.HeaderSearch();
		arrow2.WooNotice();
    });

    $window.on('resize', function () {
		arrow2.MobileMenu();
    });

	$window.on('load', function () {
		$('.arrow-page-load').addClass('loaded');
	});

    $window.on('scroll', function() {

    });



	(function($) {
		$.fn.menumaker = function(options) {
			var cssmenu = $(this), settings = $.extend({
				format: "dropdown",
				sticky: false
			}, options);
			return this.each(function() {
				$(this).find(".menu-menu-arrow-container").on('click', function(){
					$(this).toggleClass('menu-opened');
					var mainmenu = $(this).next('ul');
					if (mainmenu.hasClass('open')) {
						mainmenu.slideToggle().removeClass('open');
					}
					else {
						mainmenu.slideToggle().addClass('open');
						if (settings.format === "dropdown") {
							mainmenu.find('ul').show();
						}
					}
				});
				cssmenu.find('li ul').parent().addClass('has-sub');
				multiTg = function() {
					cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
					cssmenu.find('.submenu-button').on('click', function() {
						$(this).toggleClass('submenu-opened');
						if ($(this).siblings('ul').hasClass('open')) {
							$(this).siblings('ul').removeClass('open').slideToggle();
						}
						else {
							$(this).siblings('ul').addClass('open').slideToggle();
						}
					});
				};
				if (settings.format === 'multitoggle') multiTg();
				else cssmenu.addClass('dropdown');
				if (settings.sticky === true) cssmenu.css('position', 'fixed');
				resizeFix = function() {
					var mediasize = 1000;
					if ($( window ).width() > mediasize) {
						cssmenu.find('ul').show();
					}
					if ($(window).width() <= mediasize) {
						cssmenu.find('ul').hide().removeClass('open');
					}
				};
				resizeFix();
				return $(window).on('resize', resizeFix);
			});
		};
	})(jQuery);

	(function($){
		$(document).ready(function(){
			$("#cssmenu").menumaker({
				format: "multitoggle"
			});
		});
	})(jQuery);





})(jQuery, window, document);
