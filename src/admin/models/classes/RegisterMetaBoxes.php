<?php

namespace IsibiaDashboardMessages\Models;

class RegisterMetaBoxes
{
    public static function register()
    {
        add_meta_box(
            'isibia-dashmess-settings',
            __('Settings', 'isibia-dashboard-messages'),
            static function ($post) {
                self::getMetabox($post);
            },
            RegisterPostType::MESSAGES_POST_TYPE
        );
    }

    private static function getMetabox($post)
    {
        $start_date = get_post_meta($post->ID, 'start_date', 1);
        $end_date = get_post_meta($post->ID, 'end_date', 1);
        $closed = (int)get_post_meta($post->ID, 'closed', 1) === 1 ? "checked" : "";

        wp_nonce_field('isibia-dashmess-nonce', 'isibia-dashmess-nonce');

        ?>
        <div class="row">
            <label for="isibia-start-date"><?php echo esc_html__("Start date", 'isibia-dashboard-messages' ); ?></label>
            <input type="text" id="isibia-start-date" class="datepicker" name="start_date" value="<?php echo esc_attr($start_date); ?>" size="25" />
        </div>
        <div class="row">
            <label for="isibia-end-date"><?php echo esc_html__("End date", 'isibia-dashboard-messages' ); ?></label>
            <input type="text" id="isibia-end-date" class="datepicker" name="end_date" value="<?php echo esc_attr($end_date); ?>" size="25" />
        </div>
        <div class="row">
            <label for="isibia-closed"><?php echo esc_html__("Can close", 'isibia-dashboard-messages' ); ?></label>
            <input type="checkbox" id="isibia-closed" name="closed" <?php echo esc_attr($closed); ?> size="25" />
        </div>
        <?php
    }
}