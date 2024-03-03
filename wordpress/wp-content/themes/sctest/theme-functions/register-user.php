<?php
if (!is_user_logged_in()) {
    add_action('wp_ajax_nopriv_custom_register', 'custom_register');
}

function custom_register()
{
// Start the 'foo' timer:
    if (check_ajax_referer('ajax-register-nonce', 'register-security')) {
        $username                = isset($_POST['name']) ? sanitize_user($_POST['name']) : null;
        $email                   = isset($_POST['email']) ? sanitize_email($_POST['email']) : null;
        $password                = isset($_POST['password']) ? sanitize_text_field($_POST['password']) : null;
        $additional_contact_type = isset($_POST['additional-contact-type']) ? sanitize_text_field($_POST['additional-contact-type']) : null;
        $additional_contact      = isset($_POST['additional-contact']) ? sanitize_text_field($_POST['additional-contact']) : null;
        $description             = '';


        if (username_exists($username)) {
            echo json_encode(array('registered' => false, 'message' => __('Такий користувач вже зареєстрований')));
            wp_die();
        }

        if (email_exists($email)) {
            echo json_encode(array('registered' => false, 'message' => __('Такий емейл вже зареєстрований')));
            wp_die();
        }

        if (!$password) {
            echo json_encode(array('registered' => false, 'message' => __('Пустий пароль')));
            wp_die();
        }

        $meta_input = array();
        isset($_POST['additional-contact']) ? $meta_input['additional-contact'] = sanitize_text_field($_POST['additional-contact']) : null;
        isset($_POST['additional-contact-type']) ? $meta_input['additional-contact-type'] = sanitize_text_field($_POST['additional-contact-type']) : null;

        $new_user_data = array(
            'user_login' => $username,
            'user_email' => $email,
            'user_pass' => $password,
            'meta_input' => $meta_input,
            'description' => $description
        );

        $new_user_id = wp_insert_user($new_user_data);

        if (is_wp_error($new_user_id)) {
            echo json_encode(array('registered' => false, 'message' => __('Користувача не зареєстровано')));
        } else {
            if ($additional_contact && $additional_contact_type) {
                update_user_meta($new_user_id, 'additional_contact', $additional_contact_type . ': ' . $additional_contact);
            }
            echo json_encode(array('registered' => true, 'message' => __('Успішна реєстрація. Через 3 секунди ви перенаправитесь на головну сторінку')));
        }

        wp_die();
    }
}