<!DOCTYPE html>
<html lang="<?php echo Config::get('language'); ?>" >
<head>
	<meta charset="utf-8" >
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::js('jquery.min.js'); ?>
	<?php echo Asset::js('bootstrap.min.js'); ?>
</head>
<body>
    <div class="container-fluid">
		
		<div class="row" >
			<div class="col-md-3" >System</div>
			<div class="col-md-9" >
				<?php if(Auth::check()){ ?>
					<div class="pull-right" >
						<i class="glyphicon glyphicon-user" ></i>
						<span><?php echo Auth::get_screen_name(); ?></span>
						<i class="glyphicon glyphicon-triangle-bottom" ></i>
						<a href="<?php echo Uri::generate('logout'); ?>" ><i class="glyphicon glyphicon-log-out" ></i></a>
					</div>
				<?php } ?>
				
			</div>
		</div>
		
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav" >
						<li <?php echo preg_match('/dashboard/', Uri::current()) ? 'class="active"': ''; ?> ><a href="<?php echo Uri::generate('dashboard'); ?>" >Dashboard</a></li>
						<li <?php echo preg_match('/users/', Uri::current()) ? 'class="active"': ''; ?> ><a href="<?php echo Uri::generate('users'); ?>" >Users</a></li>
					</ul>
				</div>
			</div>
		</nav>
		
		<?php echo $content; ?>
		
    </div>
</body>
</html>
