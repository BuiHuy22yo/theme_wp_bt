<?php
//
// Create a metabox
CSF::createMetabox(META_OPTIONS, array(
    'title' => esc_html__('Custom Link', 'arrow'),
    'post_type' => 'product',
    'data_type' => 'unserialize',
    'priority' => 'low',
    'context' => 'normal',
));

//
// Create a section
CSF::createSection(META_OPTIONS, array(
    'fields' => array(
//
// A text field
        array(
            'id'          => 'link_view_demo',
            'type'        => 'text',
            'title'       => esc_html__('Link View Demo', 'arrow'),
            'placeholder' => 'http://',

        ),
        array(
            'id'          => 'link_download',
            'type'        => 'text',
            'title'       => esc_html__('Link Download', 'arrow'),
            'placeholder' => 'http://',

        ),

        array(
            'id'          => 'link_detailed_document',
            'type'        => 'text',
            'title'       => esc_html__('Link Detailed Document', 'arrow'),
            'placeholder' => 'http://',

        ),
        array(
            'id'          => 'link_watch_video_tutorials',
            'type'        => 'text',
            'title'       => esc_html__('Link Watch Video Tutorials', 'arrow'),
            'placeholder' => 'http://',

        ),

    )
));

