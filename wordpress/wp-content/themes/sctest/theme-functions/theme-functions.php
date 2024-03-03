<?php
require 'login-user.php';
require 'register-user.php';
require 'user-custom-fields.php';

global $template_uri;
$template_uri = get_template_directory_uri();


function auto_login_new_user($user_id)
{
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);
}
add_action('user_register', 'auto_login_new_user');