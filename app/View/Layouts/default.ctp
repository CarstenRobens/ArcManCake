<?php
/**
 *
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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
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
		echo $this->Html->meta('icon');
		
		echo $this->Html->css('ArcManCake');
		echo $this->Html->css('jquery.imageZoom');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('carousel');
		echo $this->Html->css('theme');
		
		echo $scripts_for_layout;
		//echo $this->Html->script('jquery-1.2.6');
		echo $this->Html->script('startstop-slider');
		//echo $this->Html->script('jquery-1.6.2.min');
		echo $this->Html->script('animatedcollapse');
		echo $this->Html->script('jquery-1.11.0.min');
		echo $this->Html->script('bootstrap.min'); 	
		echo $this->Html->script('docs.min');
		echo $this->Html->script('signin');
		echo $this->Html->script('customize.min');
		echo $this->Html->script('raw-files.min');
	?>
</head>
<body>
	
							


            
	<?php echo($this->element('topmenu'));?>
				
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->Session->flash('email'); ?>
								
	<?php echo $this->fetch('content'); ?>
                            

	<?php echo($this->element('footer'));?>


</body>
</html>
