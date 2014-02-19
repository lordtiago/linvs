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
	<?php
		echo $this->Html->meta(
			'favicon.ico',
			'http://localhost/linvs/favicon.ico',
			array('type' => 'icon')
		);

		// echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('select2');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
		echo $this->Html->script('jquery-1.10.2.min');
		echo $this->Html->script('smart-menu');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			  <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header navbar-right">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#linvs-nav">
			      <span class="sr-only">Toggle navigation</span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			    </button>
			    <a class="navbar-brand" title="Ir para o Início" href="<?php echo Router::url('/', true); ?>">LINVS</a>
			  </div>

			  <!-- Collect the nav links, forms, and other content for toggling -->
			  <div class="collapse navbar-collapse" id="linvs-nav">
			    <ul class="nav navbar-nav">
					<?php $span = $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-user')).$this->Html->tag('span',__("People"));?>
					<li><?php echo$this->Html->link($span, array('action' => 'index', "controller"=>"people"),array('escape'=>false)); ?></li>
					<?php $span = $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-heart')).$this->Html->tag('span',__("Tithe"));?>
			    	<li><?php echo$this->Html->link($span, array('action' => 'index', "controller"=>"tithes"),array('escape'=>false)); ?></li>	    	
			    </ul>
			  </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>
			<div class="breadcrumb">
				<?php echo $this->Html->getCrumbs(' > ', __('Home')); ?>
			</div>
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
