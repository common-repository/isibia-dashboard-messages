<?php

namespace IsibiaDashboardMessages\Core;

use IsibiaDashboardMessages\Models\RegisterPostType;

class Plugin
{
    const PLUGIN_VERSION = '1.0';
    /**
     * Plugin entry point, plugin launch
     */
    public function launch()
    {
        // CSS+JS
        add_action('admin_enqueue_scripts', function () {
            wp_enqueue_script('jquery-ui-datepicker');
            wp_enqueue_style(
                'jqueryui',
                plugins_url('css/jquery-ui.min.css', __FILE__)
            );
            wp_enqueue_editor();
            wp_enqueue_style(
                'isibia-dashmess-styles',
                plugins_url('css/style.css', __FILE__)
            );
            wp_enqueue_script(
                'isibia-dashmess-script',
                plugins_url('js/script.js', __FILE__),
                array('jquery', 'jquery-ui-datepicker'),
                self::PLUGIN_VERSION,
                true);
            wp_localize_script( 'isibia-dashmess-script', 'isibiaLocalize',
                array(
                    'nonce' => wp_create_nonce('isibia-dashmess-nonce')
                )
            );
        });

        // Admin Bar Menu Hook
        add_action('admin_bar_menu', array('IsibiaDashboardMessages\AdminBarMenu\AdminBarMenuHook', 'hook'), 9999);
    
        // ShowMessageModalAction
        add_action('wp_ajax_show_message_modal', array('IsibiaDashboardMessages\Actions\ShowMessageModalAction', 'showModal'));
        // SaveMessageAjaxAction
        add_action('wp_ajax_dashboard_message_save', array('IsibiaDashboardMessages\Actions\SaveMessageAjaxAction', 'save'));

        // Register custom post type
        add_action('init', array('IsibiaDashboardMessages\Models\RegisterPostType', 'register'));

        // Add metaboxes
        add_action('add_meta_boxes', array('IsibiaDashboardMessages\Models\RegisterMetaBoxes', 'register'));

        // Save post
        add_action('save_post_' . RegisterPostType::MESSAGES_POST_TYPE, array('IsibiaDashboardMessages\Models\DashboardMessagePost', 'update'));

        // Show messages
        add_action('admin_notices', array('IsibiaDashboardMessages\Actions\ShowMessagesAction', 'show'));

        // Close message
        add_action('wp_ajax_isibia_close_message', array('IsibiaDashboardMessages\Models\DashboardMessagePost', 'close'));
    }
}