<?php

namespace IsibiaDashboardMessages\Actions;

use IsibiaDashboardMessages\Models\DashboardMessagePost;
use IsibiaDashboardMessages\Templates\MessageTemplate;

class ShowMessagesAction
{
    public static function show()
    {
        $messages = DashboardMessagePost::getPosts();

        if ($messages) {
            foreach ($messages as $message) {
                echo MessageTemplate::getTemplate($message);
            }
        }
    }
}