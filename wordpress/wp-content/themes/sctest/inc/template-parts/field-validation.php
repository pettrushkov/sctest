<?php
$type = $args['type'] ?? null;

// not show status block for passwords and show validation only for passwords
if ($type !== 'password') {
    ?>
    <div class="field-validation-status-ok"></div>
<?php } else { ?>
    <div class="field-validation-message"></div>
<?php }

