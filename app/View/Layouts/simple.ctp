<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'LINVS - Sistema de Gerenciamento Canônico');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
    <meta name="robots" content="noindex,nofollow">
	<?php
		echo $this->Html->meta(
			'favicon.ico',
			'http://localhost/linvs/favicon.ico',
			array('type' => 'icon')
		);

		// echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap');
		/* Usermgmt Plugin CSS */
		echo $this->Html->css('/usermgmt/css/umstyle.css?q='.QRDN);
		
		/* Bootstrap Datepicker is taken from https://github.com/eternicode/bootstrap-datepicker */
		echo $this->Html->css('/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css?q='.QRDN);

		/* Bootstrap Datepicker is taken from https://github.com/smalot/bootstrap-datetimepicker */
		echo $this->Html->css('/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css?q='.QRDN);
		
		/* Chosen is taken from https://github.com/harvesthq/chosen/releases/ */
		echo $this->Html->css('/plugins/chosen/chosen.min.css?q='.QRDN);


		echo $this->Html->css('select2');
        echo $this->Html->css('dashboard');
		echo $this->html->scriptBlock('var webroot = "'.$this->Html->url('/').'";');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
		echo $this->Html->script('jquery-1.10.2.min');
		echo $this->Html->script('smart-menu');
        echo $this->Html->script('bootstrap.min');

		/* Bootstrap Datepicker is taken from https://github.com/eternicode/bootstrap-datepicker */
		echo $this->Html->script('/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js?q='.QRDN);
        echo $this->Html->script('/plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js?q='.QRDN);

		/* Bootstrap Datepicker is taken from https://github.com/smalot/bootstrap-datetimepicker */
		//echo $this->Html->script('/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js?q='.QRDN);
		
		/* Bootstrap Typeahead is taken from https://github.com/biggora/bootstrap-ajax-typeahead */
		echo $this->Html->script('/plugins/bootstrap-ajax-typeahead/js/bootstrap-typeahead.min.js?q='.QRDN);
		
		/* Chosen is taken from https://github.com/harvesthq/chosen/releases/ */
		echo $this->Html->script('/plugins/chosen/chosen.jquery.min.js?q='.QRDN);

		/* Usermgmt Plugin JS */
		echo $this->Html->script('/usermgmt/js/umscript.js?q='.QRDN);
		echo $this->Html->script('/usermgmt/js/ajaxValidation.js?q='.QRDN);

		echo $this->Html->script('/usermgmt/js/chosen/chosen.ajaxaddition.jquery.js?q='.QRDN);
	?>
</head>
<?php 
$user = array("first_name"=>"", "last_name"=>"");
$user_detail = array("photo"=>"");//var_dump($var);exit;
if(isset($var['User']) && isset($var['UserDetail'])){
    $user = $var['User'];
    $user_detail = $var['UserDetail'];
}
?>     
<body>
	<div id="container">
		<div id="header">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			  <!-- Brand and toggle get grouped for better mobile display --> 
			    <a class="navbar-brand" title="Ir para o Início" href="<?php echo Router::url('/', true); ?>">LINVS</a>
			</nav>
		</div>		
		<div id="content">	
			<?php echo $this->Session->flash(); ?>			
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<p class="marca">© 2014 - LINVS - Sistema de Gerenciamento Canônico</p>
			<p class="developers">
				Desenvolvido por:
				<a href="mailto:daviddisans@gmail.com?Subject=Contato%20LINVS" target="_top">David Sans</a>,
				<a href="mailto:pro.tiagorafaell@gmail.com?Subject=Contato%20LINVS" target="_top">Tiago Rafael</a>
			</p>

		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
