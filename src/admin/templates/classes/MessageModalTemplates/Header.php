<?php

namespace IsibiaDashboardMessages\Templates\MessageModalTemplates;

class Header
{
    public static function getTemplate(): string
    {
        $title = __('Message', 'isibia-dashboard-messages');

        return '
            <div class="isibia-modal-header">
                <h2>' . $title . '</h2>
                <span class="dashicons dashicons-no-alt"></span>
            </div>
        ';
    }
}