<?php

namespace IsibiaDashboardMessages\Actions;

use IsibiaDashboardMessages\Templates\MessageModalTemplates\MainTemplate;

class ShowMessageModalAction
{
    public static function showModal()
    {
        $template = new MainTemplate();
        $template->render();
        die;
    }
}