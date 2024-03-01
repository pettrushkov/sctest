<?php
global $template_uri;
$favicon_uri = $template_uri . '/favicon/';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php bloginfo('name'); ?>
    </title>

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $favicon_uri; ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $favicon_uri; ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $favicon_uri; ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $favicon_uri; ?>/site.webmanifest">
    <link rel="mask-icon" href="<?php echo $favicon_uri; ?>/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- /FAVICON -->

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@400;500&display=swap"
          rel="stylesheet">
    <!-- /FONTS -->

    <?php wp_head(); ?>
</head>

<body>

<header class="header">
    <div></div>
    <div class="header-logo">
        <img src="<?php echo $template_uri; ?>/assets/img/header-logo.svg" alt="Logo">
    </div>
    <div>
        <?php if (!is_user_logged_in()) { ?>
            <button class="btn btn--dark btn-show-login" type="button">Вхід</button>
            <button class="btn" type="button">Реєстрація</button>
        <?php } else { ?>
            <a href="<?php echo wp_logout_url(home_url()); ?>" class="btn btn--dark">Вийти</a>
        <?php } ?>
    </div>
</header>