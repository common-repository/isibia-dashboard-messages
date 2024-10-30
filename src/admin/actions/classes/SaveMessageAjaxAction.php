<?php

namespace IsibiaDashboardMessages\Actions;

use Exception;
use IsibiaDashboardMessages\Models\DashboardMessagePost;
use IsibiaDashboardMessages\Models\DashboardMessagePostValidator;

class SaveMessageAjaxAction
{
    public static function save()
    {
        check_ajax_referer( 'isibia-dashmess-nonce', 'nonce_code' );
        
        // Validate data
        $validated_data = array();

        try {
            $validator = new DashboardMessagePostValidator($_POST);
            $validated_data = $validator->validate();
        } catch (Exception $e) {
            wp_send_json_error([
                'error' => $e->getMessage()
            ]);
        }

        $message = new DashboardMessagePost($validated_data);
        $message_id = $message->save();

        if ($message_id && is_int($message_id)) {
            wp_send_json_success();
        }

        wp_send_json_error([
            'error' => __('Something wrong...')
        ]);
    }
}