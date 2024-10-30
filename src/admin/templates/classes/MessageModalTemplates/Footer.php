<?php

namespace IsibiaDashboardMessages\Templates\MessageModalTemplates;

class Footer
{
    public static function getTemplate(): string
    {
        $title_close = __('Close', 'isibia-dashboard-messages');
        $title_send = __('Send', 'isibia-dashboard-messages');
        
        return '
            <div class="isibia-modal-footer">
                <button class="button button-secondary" id="isibia-button-modal-close">' . $title_close . '</button>
                <button class="button button-primary" id="isibia-button-modal-save">' . $title_send . '</button>
            </div>
        ';
    }
}