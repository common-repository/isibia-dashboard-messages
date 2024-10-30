<?php

namespace IsibiaDashboardMessages\AdminBarMenu;

class AdminBarMenuHook
{
    public static function hook($wp_admin_bar)
    {
        $admin_bar_node = new AdminBarNode();
        $wp_admin_bar->add_node($admin_bar_node->toArray());
    }
}