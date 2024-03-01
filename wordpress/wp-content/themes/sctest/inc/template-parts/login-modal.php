<?php global $template_uri; ?>

<div class="modal-wrapper login-modal-js hide">
    <div class="modal">
        <button class="modal-close" type="button"></button>
        <div class="modal-inner">
            <h2 class="modal-title">
            <span class="modal-title-icon">
                <img src="<?php echo $template_uri; ?>/assets/img/lock-icon.svg" alt="Lock icon">
            </span>
                Вхід
            </h2>
            <form action="#" class="modal-form">
                <div class="field-wrapper"><input type="email" name="email" placeholder="Ваш email"></div>
                <div class="field-wrapper password-field">
                    <input type="password" name="password" placeholder="Ваш пароль">
                    <span class="show-toggle"></span>
                </div>
                <div class="field-wrapper submit-field-wrapper"><input type="submit" class="btn" value="Війти"></div>
                <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
                <div class="modal-server-answer"></div>
            </form>
        </div>
    </div>
</div>