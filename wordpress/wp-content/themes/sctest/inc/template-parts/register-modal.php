<?php
global $template_uri;
$field_validation_path = 'inc/template-parts/field-validation';
?>

<div class="modal-wrapper register-modal-js hide">
    <div class="modal">
        <button class="modal-close" type="button"></button>
        <div class="modal-slider">
            <div class="modal-slider-inner">
                <h2 class="modal-slider-title">Зможеш обрати свій варіант</h2>

                <div class="swiper slider-carousel">
                    <div class="swiper-wrapper">
                        <?php for ($i = 0; $i < 3; $i++) { ?>
                            <div class="swiper-slide modal-slider-item">
                                <ul class="features-list">
                                    <li>
                                        <h3>CPA</h3>
                                        <span>$25 і вище</span>
                                    </li>
                                    <li>
                                        <h3>REVSHARE</h3>
                                        <span>Піднімай до 60%</span>
                                    </li>
                                    <li>
                                        <h3>Гібрід</h3>
                                        <span>Зробимо як скажеш</span>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-controls">
                        <button class="swiper-button-prev" type="button">
                            <img src="<?php echo $template_uri; ?>/assets/img/left-white-arrow-icon.svg" alt="Prev">
                        </button>
                        <div class="slider-carousel-pagination"></div>
                        <button class="swiper-button-next" type="button">
                            <img src="<?php echo $template_uri; ?>/assets/img/left-white-arrow-icon.svg" alt="Next">
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-inner">
            <h2 class="modal-title modal-title--multiline">
                <span class="modal-title-icon modal-title-icon--green">
                    <img src="<?php echo $template_uri; ?>/assets/img/user-icon.svg" alt="User icon">
                </span>
                Реєстрація
            </h2>
            <form action="#" class="modal-form">
                <div class="field-wrapper">
                    <?php get_template_part($field_validation_path); ?>
                    <input type="text" name="name" placeholder="Ваше імʼя" required>
                </div>
                <div class="field-wrapper">
                    <?php get_template_part($field_validation_path); ?>
                    <input type="email" name="email" placeholder="Ваш email" required>
                </div>
                <div class="field-wrapper password-field">
                    <?php get_template_part($field_validation_path, '', array('type'=>'password')); ?>
                    <input type="password" name="password" placeholder="Ваш пароль" class="password" required>
                    <span class="show-toggle"></span>
                </div>
                <div class="field-wrapper password-field">
                    <?php get_template_part($field_validation_path, '', array('type'=>'password')); ?>
                    <input type="password" name="password-repeat" placeholder="Повторіть пароль" class="password" required>
                    <span class="show-toggle"></span>
                </div>
                <div class="modal-additional-contact">
                    <h3 class="modal-additional-contact-title">Оберіть спосіб звязку</h3>
                    <div class="modal-additional-contact-row">
                        <button class="modal-additional-contact-type active" type="button"
                                data-source="телеграм">
                            <img src="<?php echo $template_uri; ?>/assets/img/telegram-icon.svg" alt="телеграм">
                        </button>
                        <button class="modal-additional-contact-type" type="button" data-source="скайп">
                            <img src="<?php echo $template_uri; ?>/assets/img/skype-icon.svg" alt="скайп">
                        </button>
                        <div class="field-wrapper">
                            <input type="text" placeholder="@телеграм_адреса" name="additional-contact" required>
                        </div>
                    </div>
                </div>
                <div class="field-wrapper submit-field-wrapper">
                    <input type="submit" class="btn" value="Реєстрація">
                </div>
                <?php wp_nonce_field('ajax-register-nonce', 'register-security'); ?>
                <input type="hidden" name="additional-contact-type" value="телеграм">
                <div class="modal-server-answer"></div>
            </form>
        </div>
    </div>
</div>