<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 10/29/2020
 * Time: 11:27 AM
 */


CSF::createOptions(ARROW_OPTIONS, array(
    'menu_title' => esc_html__('Arrow_Options', 'arrow'),
    'menu_slug' => 'arrow_options',
    'framework_title' =>  esc_html__('Arrow Options', 'arrow').'<small>'.esc_html__(' by Huybv', 'arrow').'</small>',
// Create a section Header
));

//
// Create a section Header
//
CSF::createSection( ARROW_OPTIONS, array(
    'id'    => 'header',
    'title' => esc_html__('Header', 'arrow'),
    'icon'  => '',
) );

//
// Create a section Logo
//
CSF::createSection(ARROW_OPTIONS, array(
    'parent'      => 'header',
    'title' => esc_html__('Logo', 'arrow'),
    'icon' => '',
    'fields' => array(
        //
        // A text field
        //

//        array(
//            'id'    => 'logo',
//            'type'  => 'media',
//            'title' => esc_html__('Logo', 'arrow'),
//        ),

        array(
            'id'    => 'logo',
            'type'  => 'upload',
            'title' => esc_html__('Logo', 'arrow'),
        ),

    )
));

//
// Create a section Icon
//
CSF::createSection(ARROW_OPTIONS, array(
    'parent'      => 'header',
    'title' => esc_html__('Icon', 'arrow'),
    'icon' => '',
    'fields' => array(
        //
        // A text field
        //

        array(
            'id'      => 'header_enable_search',
            'type'    => 'checkbox',
            'title'   => esc_html__('Enable', 'arrow'),
            'label'   => 'Enable Search',
            'default' => true // or false
        ),
        array(
            'id'      => 'header_enable_user',
            'type'    => 'checkbox',
            'title'   => esc_html__('Enable', 'arrow'),
            'label'   => 'Enable User',
            'default' => true // or false
        ),
        array(
            'id'      => 'header_enable_cart',
            'type'    => 'checkbox',
            'title'   => esc_html__('Enable', 'arrow'),
            'label'   => 'Enable Cart',
            'default' => true // or false
        ),



    )
));



//
// Create a section banner
//

CSF::createSection(ARROW_OPTIONS, array(
    'title' => esc_html__('Banner', 'arrow'),
    'icon' => '',
    'fields' => array(

        //
        // A text field
        //


        array(
            'id'    => 'banner_angle',
            'type'  => 'number',
            'title' => esc_html__('Angle', 'arrow'),
        ),

        array(
            'id'    => 'banner_color1',
            'type'  => 'color',
            'title' => esc_html__('Banner Color1', 'arrow'),
        ),

        array(
            'id'    => 'banner_opacity1',
            'type'  => 'number',
            'title' => esc_html__('Opacity1', 'arrow'),
        ),

        array(
            'id'    => 'banner_color2',
            'type'  => 'color',
            'title' => esc_html__('Banner Color2', 'arrow'),
        ),

        array(
            'id'    => 'banner_opacity2',
            'type'  => 'number',
            'title' => esc_html__('Opacity2', 'arrow'),
        ),
    )
));

CSF::createSection(ARROW_OPTIONS, array(
    'id'      => 'single_product',
    'title' => esc_html__('Single Product', 'arrow'),
    'icon' => '',
    'fields' => array(
        //
        // A text field
        //

    )
));

//
// Create a section single-product-top
//

CSF::createSection(ARROW_OPTIONS, array(
    'parent'      => 'single_product',
    'title' => esc_html__('Single Product Top', 'arrow'),
    'icon' => '',
    'fields' => array(

        //
        // A text field
        //
        array(
            'id' => 'button_view',
            'type' => 'text',
            'title' => esc_html__('Button Title View Demo', 'arrow'),
        ),
        array(
            'id' => 'color_view',
            'type' => 'color',
            'title' => esc_html__('Color View Demo', 'arrow'),
        ),
        array(
            'id' => 'button_download',
            'type' => 'text',
            'title' => esc_html__('Button Title Download', 'arrow'),
        ),
        array(
            'id' => 'color_download',
            'type' => 'color',
            'title' => esc_html__('Color Download', 'arrow'),
        ),

        array(
            'id' => 'button_buy_before',
            'type' => 'text',
            'title' => esc_html__('Button Title Buy Now Before', 'arrow'),
        ),
        array(
            'id' => 'button_buy',
            'type' => 'text',
            'title' => esc_html__('Button Title Buy Now', 'arrow'),
        ),
        array(
            'id' => 'color_buy',
            'type' => 'color',
            'title' => esc_html__('Color Buy Now', 'arrow'),
        ),
//        array(
//            'id' => 'group_button',
//            'type' => 'group',
//            'title' => esc_html__('Group'),
//            'fields' => array(
//                array(
//                    'id'    => 'button',
//                    'type'  => 'text',
//                    'title' => esc_html__('Button Title', 'arrow'),
//                ),
//
//            ),
//        ),


    )
));

//
// Create a section single-product-bottom
//
CSF::createSection(ARROW_OPTIONS, array(
    'parent'      => 'single_product',
    'title' => esc_html__('Single Product Bottom', 'arrow'),
    'icon' => '',
    'fields' => array(

        //
        // A text field
        //
        array(
            'id' => 'button_title_before',
            'type' => 'text',
            'title' => esc_html__('Title Before', 'arrow'),
        ),

        array(
            'id' => 'button_purchase_now',
            'type' => 'text',
            'title' => esc_html__('Button Title Purchase Now', 'arrow'),
        ),

        array(
            'id' => 'icon_detailed_document',
            'type' => 'icon',
            'title' => esc_html__('Icon Title Detailed Document', 'arrow'),
        ),
        array(
            'id' => 'button_detailed_document',
            'type' => 'text',
            'title' => esc_html__('Button Title Detailed Document', 'arrow'),
        ),
        array(
            'id' => 'icon_premium_support_updates',
            'type' => 'icon',
            'title' => esc_html__('Icon Title Premium Support & Updates', 'arrow'),
        ),
        array(
            'id' => 'link_premium_support_updates',
            'type' => 'text',
            'title' => esc_html__('Link Title Premium Support & Updates', 'arrow'),
            'placeholder' => 'http://',
        ),
        array(
            'id' => 'button_premium_support_updates',
            'type' => 'text',
            'title' => esc_html__('Button Title Premium Support & Updates', 'arrow'),
        ),
        array(
            'id' => 'icon_watch_video_tutorials',
            'type' => 'icon',
            'title' => esc_html__('Icon Title Watch Video Tutorials', 'arrow'),
        ),
        array(
            'id' => 'button_watch_video_tutorials',
            'type' => 'text',
            'title' => esc_html__('Button Title Watch Video Tutorials', 'arrow'),
        ),

    )
));

//
// Create a section Blog
//
CSF::createSection(ARROW_OPTIONS, array(
    'title' => esc_html__('Blog', 'arrow'),
    'icon' => '',
    'fields' => array(

        //
        // A text field
        //
        array(
            'id'    => 'ads1',
            'type'  => 'number',
            'title' => esc_html__('ads1', 'arrow'),
        ),
        array(
            'id'    => 'price1',
            'type'  => 'text',
            'title' => esc_html__('Sale Price1', 'arrow'),
        ),
        array(
            'id'    => 'load1',
            'type'  => 'text',
            'title' => esc_html__('Button Load', 'arrow'),
        ),

        array(
            'id'    => 'ads2',
            'type'  => 'number',
            'title' => esc_html__('ads2', 'arrow'),
        ),
        array(
            'id'    => 'price2',
            'type'  => 'text',
            'title' => esc_html__('Sale Price2', 'arrow'),
        ),
        array(
            'id'    => 'price3',
            'type'  => 'text',
            'title' => esc_html__('Regular Price2', 'arrow'),
        ),

        array(
            'id'    => 'text1',
            'type'  => 'text',
            'title' => esc_html__('Button Text top', 'arrow'),
        ),
        array(
            'id'    => 'text2',
            'type'  => 'text',
            'title' => esc_html__('Button Text center', 'arrow'),
        ),
        array(
            'id'    => 'text3',
            'type'  => 'text',
            'title' => esc_html__('Button Text botton', 'arrow'),
        ),

        array(
            'id'    => 'blog_inner_position1',
            'type'  => 'number',
            'title' => esc_html__('Blog Inner Position1', 'arrow'),
        ),
        array(
            'id'    => 'blog_inner_position2',
            'type'  => 'number',
            'title' => esc_html__('Blog Inner Position2', 'arrow'),
        ),
        array(
            'id'    => 'button_continue_reading',
            'type'  => 'text',
            'title' => esc_html__('Button Read', 'arrow'),
        ),
    )
));
//
// Create a section Blog Detail
//
CSF::createSection(ARROW_OPTIONS, array(
    'id' => 'blog_detail',
    'title' => esc_html__('Blog Detail', 'arrow'),
    'icon' => '',

));

CSF::createSection(ARROW_OPTIONS, array(
    'parent' =>'blog_detail',
    'title' => esc_html__('Title Single', 'arrow'),
    'icon' => '',
    'fields' => array(

        //
        // A text field
        //

        array(
            'id'    => 'title_single',
            'type'  => 'text',
            'title' => esc_html__('Title Single', 'arrow'),
        ),

        array(
            'id'    => 'name_post',
            'type'  => 'text',
            'title' => esc_html__('Name Post', 'arrow'),
        ),
    )
));

CSF::createSection(ARROW_OPTIONS, array(
    'parent' =>'blog_detail',
    'title' => esc_html__('Related Posts', 'arrow'),
    'icon' => '',
    'fields' => array(

        //
        // A text field
        //

        array(
            'id'    => 'related_posts',
            'type'  => 'text',
            'title' => esc_html__('Related Posts Title', 'arrow'),
        ),
        array(
            'id'          => 'select_posts',
            'type'        => 'select',
            'title'       => esc_html__('Select Posts', 'arrow'),
            'placeholder' => esc_html__('Select an option', 'arrow'),
            'options'     => array(
                //'option-1'  => esc_html__('Option 1', 'arrow'),
                'option-2'  => esc_html__('Category', 'arrow'),
                'option-3'  => esc_html__('Random', 'arrow'),
            ),
            'default'     => ''
        ),

    )
));

CSF::createSection( ARROW_OPTIONS, array(
    'parent' =>'blog_detail',
    'title' => esc_html__('Share link'),
    'fields' => array(
        array(
            'id' => 'opt-group-share-link',
            'type' => 'group',
            'title' => esc_html__('Group'),
            'fields' => array(
                array(
                    'id' => 'upload-share-link',
                    'type' => 'icon',
                    'title' => esc_html__('Insert icon'),
                ),
                array(
                    'id' => 'link-icon-share',
                    'type' => 'text',
                    'title' => esc_html__('Insert link go icon'),
                ),

                array(
                    'id'    => 'background-icon-share',
                    'type'  => 'background',
                    'title' => 'Background',esc_html__('Insert Background icon'),
                ),
            ),
        ),
    )
) );
//
// Create a section Sidebar
//
CSF::createSection(ARROW_OPTIONS, array(
    'title' => esc_html__('Sidebar', 'arrow'),
    'icon' => '',
    'fields' => array(

        //
        // A text field
        //

        array(
            'id'    => 'images1',
            'type'  => 'upload',
            'title' => esc_html__('images1', 'arrow'),
        ),

        array(
            'id'    => 'images2',
            'type'  => 'upload',
            'title' => esc_html__('images2', 'arrow'),
        ),
    )
));

//
// Create a section Footer
//


CSF::createSection(ARROW_OPTIONS, array(
    'id' => 'footer',
    'title' => esc_html__('Footer', 'arrow'),
    'icon' => '',

));

//
// Create a section Footer Top
//

CSF::createSection(ARROW_OPTIONS, array(
    'parent'      => 'footer',
    'title' => esc_html__('Footer Top', 'arrow'),
    'icon' => '',
    'fields' => array(

        //
        // A text field
        //
        array(
            'id'      => 'footer_widgets',
            'type'    => 'number',
            'title'   => esc_html__('Widget', 'arrow'),
        ),
    )
));

//
// Create a section Footer Bottom
//
CSF::createSection(ARROW_OPTIONS, array(
    'parent'      => 'footer',
    'title' => esc_html__('Footer Bottom', 'arrow'),
    'icon' => '',
    'fields' => array(

        //
        // A text field
        //
        array(
            'id'      => 'footer_text',
            'type'    => 'textarea',
            'title'   => esc_html__('@copyright', 'arrow'),
        ),
    )
));