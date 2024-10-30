<?php

namespace IsibiaDashboardMessages\AdminBarMenu;

class AdminBarNode
{
    const ISIBIA_ADMIN_BAR_NODE_ID = 'isibia_admin_bar';

    private string $id;
    private string $title;
    private string $href;
    private string $parent;
    private bool $group;
    private array $meta;

    public function __construct()
    {
        $this->id = self::ISIBIA_ADMIN_BAR_NODE_ID;
        $this->title = __('Message', 'isibia-dashboard-messages');
        $this->href = '#';
        $this->parent = '';
        $this->group = false;
        $this->meta = [
//            'html' => '',
//            'class' => '',
//            'rel' => '',
//            'target' => '',
//            'title' => '',
//            'tabindex' => '',
//            'onclick' => '',
        ];
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array(
            'id' => $this->id,
            'title' => $this->title,
            'href' => $this->href,
            'parent' => $this->parent,
            'group' => $this->group,
            'meta' => $this->meta,
        );
    }
}
