<!DOCTYPE html>
<html>
<head>
	<title><?php echo cms::option('sitename'); ?></title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet'>
	<?php echo HTML::style('media/libs/bootstrap/dist/css/bootstrap.min.css'); ?>
	<?php echo HTML::style('media/libs/fontawesome/css/font-awesome.min.css'); ?>
	<?php echo HTML::style('media/libs/fancybox/source/jquery.fancybox.css'); ?>
	<?php echo HTML::style('media/css/global.css'); ?>
</head>
<body>

<section class="container" id="topwrap">
	<div id="top">
		<div class="pull-left contacts">
			<span class="fa fa-mobile"></span> phoneno
		</div>
		<nav class="pull-right">
			<ul>
<?php
				$menu = cms::get_menu('top');
				$items = $menu->items->find_all();
				if((bool)$items->count())
				{
					foreach($items as $item)
					{
						echo '<li>'.$item->get_link().'</li>';
					}
				}
?>
				<li>
					<span class="fa fa-facebook-square"></span>
					<span class="fa fa-twitter-square"></span>
				</li>
			</ul>
		</nav>
	</div>
</section>

<header id="header">
	<div class="logo"><a href="<?php echo URL::site(''); ?>" title="<?php echo cms::option('sitename'); ?>"><?php echo cms::option('sitename'); ?></a></div>
	<nav>
		<ul>
<?php
			$menu = cms::get_menu('main');
			$items = $menu->items->find_all();
			if((bool)$items->count())
			{
				foreach($items as $item)
				{
					echo '<li>'.$item->get_link().'</li>';
				}
			}
?>
		</ul>
	</nav>
</header>



<div class="container" id="mainwrap">
	<div class="row" id="main">
		<div class="col-xs-12">
			<?php echo $view; ?>
		</div>
	</div>
</div>
<div class="container" id="footerwrap">
	<footer class="row">
		<div class="col-xs-12">
			<?php echo cms::option('footertext'); ?>
		</div>
	</footer>
</div>

<?php echo HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js'); ?>	
<?php echo HTML::script('media/libs/bootstrap/dist/js/bootstrap.min.js'); ?>
<?php echo HTML::script('media/libs/fancybox/source/jquery.fancybox.pack.js'); ?>
<?php echo HTML::script('media/js/global.js'); ?>

</body>
</html>