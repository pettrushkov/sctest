<?php
if (!is_user_logged_in()) {
    add_action('wp_ajax_nopriv_custom_login', 'custom_login');
}

function custom_login()
{

    if (check_ajax_referer('ajax-login-nonce', 'security')) {
        $info                  = array();
        $info['user_login']    = $_POST['email'];
        $info['user_password'] = $_POST['password'];
        $info['remember']      = true;

        $user_signon = wp_signon($info, false);
        if (is_wp_error($user_signon)) {
            echo json_encode(array('loggedin' => false, 'message' => __('Неправильний email або пароль')));
        } else {
            echo json_encode(array('loggedin' => true, 'message' => __('Вхід виконано. Через 3 секунди ви перенаправитесь на головну сторінку')));
        }

        die();
    }
}