<?php header("Content-type: application/pdf");  ?>
<html>
    <head>        
	<?php echo $this->Html->charset(); ?>
	<?php
		echo $this->Html->css('bootstrap');
        echo $this->Html->css('report');

		echo $scripts_for_layout;
	?>
    </head>
    <body>
        <div class="">
            <?php echo $content_for_layout; ?>
        </div>
    </body>
</html>
