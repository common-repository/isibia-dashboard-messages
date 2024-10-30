<?php

namespace IsibiaDashboardMessages\Templates\MessageModalTemplates;

class Editor
{
    public static function getTemplate()
    {
        return '
            <div class="isibia-modal-editor">
                <textarea class="wp-editor-area" name="content" id="message-modal-editor" cols="30" rows="20">Message</textarea>
            </div>
            <script>
                wp.editor.initialize(\'message-modal-editor\', {
                    tinymce: {
                        wpautop: true
                    },
                    quicktags: true
                });
            </script>
        ';
    }
}