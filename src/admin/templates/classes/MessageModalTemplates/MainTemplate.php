<?php

namespace IsibiaDashboardMessages\Templates\MessageModalTemplates;

class MainTemplate
{
    
    public function render()
    {
        ?>
        <form id="isibia-message-modal" class="isibia-modal" method="post">
            <?php 
                echo Header::getTemplate();
                echo Settings::getTemplate();
                echo Editor::getTemplate();
                echo Footer::getTemplate();
            ?>
        </form>
        <?php
    }
}