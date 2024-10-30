<?php

namespace IsibiaDashboardMessages\Templates\MessageModalTemplates;

class Settings
{
    public static function getTemplate(): string
    {
        $title_message = __('Message title', 'isibia-dashboard-messages');
        $title_start_date = __('Start date', 'isibia-dashboard-messages');
        $title_end_date = __('End date', 'isibia-dashboard-messages');
        $title_closed = __('Can close', 'isibia-dashboard-messages');
        
        return '
            <div class="isibia-modal-settings">
                <div class="column">
                    <label>
                        ' . esc_html($title_message) . '
                        <input name="title" type="text" size="30">
                    </label>
                </div>
                <div class="column">
                    <label>
                        ' . esc_html($title_start_date) . '
                        <input class="datepicker" name="start_date" type="text">
                    </label>
                    <label>
                        ' . esc_html($title_end_date) . '
                        <input class="datepicker" name="end_date" type="text">
                    </label>
                </div>
                <div class="column">
                    <label>
                        ' . esc_html($title_closed) . '
                        <input name="closed" type="checkbox" checked value="1">
                    </label>
                </div>
            </div>
            <script>
                jQuery("input[name*=\'date\'], .datepicker").datepicker({ dateFormat: "yy-mm-dd" });
            </script>
        ';
    }
}