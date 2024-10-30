<?php

namespace IsibiaDashboardMessages\Models;

class RegisterPostType
{
    const MESSAGES_POST_TYPE = 'isibia_dashmess';
    
    public static function register()
    {
        register_post_type( self::MESSAGES_POST_TYPE, [
            'label'  => self::MESSAGES_POST_TYPE,
            'labels' => [
                'name'               => __('Dashboard Messages', 'isibia-dashboard-messages'),
                'singular_name'      => __('Message', 'isibia-dashboard-messages'),
                'add_new'            => __('Add new message', 'isibia-dashboard-messages'),
                'add_new_item'       => __('Adding new message', 'isibia-dashboard-messages'),
                'edit_item'          => __('Edit', 'isibia-dashboard-messages'),
                'new_item'           => __('New message', 'isibia-dashboard-messages'),
                'view_item'          => __('View message', 'isibia-dashboard-messages'),
                'search_items'       => __('Searching messages', 'isibia-dashboard-messages'),
                'not_found'          => __('Not founded', 'isibia-dashboard-messages'),
                'not_found_in_trash' => __('Not founded in trash', 'isibia-dashboard-messages'),
                'menu_name'          => __('Dashboard Messages', 'isibia-dashboard-messages'),
            ],
            'public'                 => false,
            'publicly_queryable'     => false,
            'exclude_from_search'    => true,
            'show_ui'                => true,
            'show_in_nav_menus'      => false,
            'show_in_menu'           => true,
            'show_in_rest'           => false,
            'menu_position'          => 1,
            'menu_icon'              => 'dashicons-testimonial',
            'hierarchical'           => false,
            'supports'               => [ 'title', 'editor', 'author' ],
            'taxonomies'             => [],
            'has_archive'            => false,
            'rewrite'                => true,
            'query_var'              => true,
        ] );
    }
}