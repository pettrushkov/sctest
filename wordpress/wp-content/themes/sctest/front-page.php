<?php
get_header();
global $template_uri;
?>

    <div class="about-benefits-wrapper">
        <section class="about">
            <div class="container">
                <div class="about-inner">
                    <h1 class="about-title">
                        <img class="about-hand" src="<?php echo $template_uri; ?>/assets/img/about-hand.png"
                             alt="Fingers up">
                        <?php _e('Володарі Трафіку', 'sctest'); ?>
                        <img class="about-hand about-hand--right"
                             src="<?php echo $template_uri; ?>/assets/img/about-hand.png" alt="Fingers up">
                    </h1>
                    <p class="about-text"><?php _e('SC Partners – нова партнерська мережа з величезним досвідом та експертизою.
                        Кожен наш партнер отримує очікувану вигоду на абсолютно прозорих умовах та бездоганний супровід.
                        Ми будемо поряд з вами: на відстані одного повідомлення в месенджері або дзвінка, адже ми
                        працюємо поряд з вами.', 'sctest'); ?></p>
                </div>
            </div>
        </section>

        <section class="benefits">
            <div class="container">
                <h2 class="benefits-title"><?php _e('Тим, хто нагоняє Траф', 'sctest'); ?></h2>
                <div class="benefits-row">
                    <div class="benefits-col">
                        <div class="benefits-col-icon"><img
                                src="<?php echo $template_uri; ?>/assets/img/benefits-megaphone-icon.svg"
                                alt="Megaphone"></div>
                        <div class="benefits-col-text-wrapper">
                            <h3 class="benefits-col-title"><?php _e('Круті акції, призи та прибуткова бонусна програма', 'sctest'); ?></h3>
                            <p class="benefits-col-text"><?php _e('Ми постійно працюємо над тим, щоб вам було цікаво та вигідно!', 'sctest'); ?></p>
                        </div>
                    </div>
                    <div class="benefits-col">
                        <div class="benefits-col-icon"><img
                                src="<?php echo $template_uri; ?>/assets/img/benefits-smile-icon.svg"
                                alt="Smile"></div>
                        <div class="benefits-col-text-wrapper">
                            <h3 class="benefits-col-title"><?php _e('Особлива підтримка для кожного 24/7', 'sctest'); ?></h3>
                            <p class="benefits-col-text"><?php _e('У вас буде свій персональний менеджер', 'sctest'); ?></p>
                        </div>
                    </div>
                    <div class="benefits-col">
                        <div class="benefits-col-icon"><img
                                src="<?php echo $template_uri; ?>/assets/img/benefits-chart-icon.svg"
                                alt="Chart"></div>
                        <div class="benefits-col-text-wrapper">
                            <h3 class="benefits-col-title"><?php _e('Детальна статистика', 'sctest'); ?></h3>
                            <p class="benefits-col-text"><?php _e('Миттєве оновлення, зрозуміла система відображення статистики', 'sctest'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php
get_footer();