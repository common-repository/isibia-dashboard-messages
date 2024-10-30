jQuery(document).ready(function ($)
{
    // Show message modal
    $('#wp-admin-bar-isibia_admin_bar > a').click(function (event)
    {
        event.preventDefault();

        $.get({
            url: ajaxurl,
            data: {
                action: 'show_message_modal'
            },
            success: function (response) {
                $('body').append(response);
            },
            dataType: 'html'
        });
    });
    
    // Close message modal
    $(document).on('click', '.isibia-modal-header .dashicons-no-alt, #isibia-button-modal-close', function () {
        $('#isibia-message-modal').remove();
        wp.editor.remove('message-modal-editor');
    })

    // Show message modal
    $(document).on('click', '#isibia-button-modal-save', function (event)
    {
        event.preventDefault();
        
        let form = $('#isibia-message-modal');
        
        // Copy content from editor to textarea
        form.find('[name="content"]').val(
            $('#message-modal-editor_ifr').contents().find('[data-id="message-modal-editor"]').html()
        );

        $.post({
            url: ajaxurl,
            data: {
                action: 'dashboard_message_save',
                nonce_code : isibiaLocalize.nonce,
                form: form.serializeArray()
            },
            success: function (response) {
                if (response.success === true) {
                    $('#isibia-message-modal').remove();
                    wp.editor.remove('message-modal-editor');
                    alert('Saved');
                } else {
                    alert(response.data.error);
                }
            }
        });
    })

    // Close message
    $('.isibia-message .notice-dismiss').click(function (event)
    {
        event.preventDefault();

        const message_id = $(this).closest('.isibia-message').data('id');
        $.post({
            url: ajaxurl,
            data: {
                action: 'isibia_close_message',
                nonce_code : isibiaLocalize.nonce,
                message_id
            },
            success: function (response) {
                console.log(response);
            }
        });
    });
    
    // Datepicker start
    jQuery("input[name*=\'date\'], .datepicker").datepicker({ dateFormat: "yy-mm-dd" });
});
