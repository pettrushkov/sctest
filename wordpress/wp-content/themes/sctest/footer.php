<?php
wp_footer();
global $template_uri;
?>

<?php
if (!is_user_logged_in()) {
    get_template_part('inc/template-parts/login', 'modal');
}
?>

</body>
</html>