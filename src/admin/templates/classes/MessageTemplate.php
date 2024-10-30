<?php

namespace IsibiaDashboardMessages\Templates;

class MessageTemplate
{
    public static function getTemplate($data)
    {
        $is_dismissible = get_post_meta($data->ID, 'closed', true);
        $is_dismissible = $is_dismissible ? 'is-dismissible' : '';

        return '<div id="message-' . $data->ID . '" data-id="' . $data->ID . '" class="isibia-message notice notice-success ' . $is_dismissible . '">
	        <h3>' . $data->post_title . '</h3>
	        <div>
	            ' . $data->post_content . '
            </div>
        </div>';
    }
}