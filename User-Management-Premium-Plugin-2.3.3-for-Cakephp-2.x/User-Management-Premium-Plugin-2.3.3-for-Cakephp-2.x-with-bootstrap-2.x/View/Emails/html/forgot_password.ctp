<?php echo __('Welcome %s,<br/><br/>You have requested to have your password reset on %s. Please click the link below to reset your password now: <br/><br/>%s<br/><br/>If clicking on the link doesn\'t work, try copying and pasting it into your browser.<br/><br/>Thanks,<br/>%s', $user['User']['first_name'], SITE_NAME, $link, SITE_NAME); ?>