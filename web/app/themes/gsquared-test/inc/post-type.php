<?php

function create_course_post_type() {
    register_post_type('courses',
        array(
            'labels'      => array(
                'name'          => __('Courses'),
                'singular_name' => __('Course'),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array('title', 'editor', 'thumbnail'),
            'rewrite'     => array('slug' => 'courses'),
        )
    );
}
add_action('init', 'create_course_post_type');
