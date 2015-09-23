<!DOCTYPE html>
<html lang="<?php echo Config::get('language'); ?>" >
<head>
	<meta charset="utf-8" >
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('styles.css'); ?>
</head>
<body>
    <div class="container-fluid">
		
		<header class="row" >
			<div class="col-md-3" >
				<h1>System</h1>
			</div>
			<div class="col-md-9" >
				<div class="pull-right" >
				<?php if(Auth::check()){ ?>
				<i class="fa fa-user" ></i>
				<span><?php echo Auth::get_screen_name(); ?></span>
				<a href="<?php echo Uri::create('logout'); ?>" ><i class="fa fa-sign-out"></i></a>	
				<?php }else{ ?>
				<a class="btn btn-sm btn-primary" href="<?php echo Uri::create('register') ?>" >Sign up</a>
				<a class="btn btn-sm btn-primary-outline" href="<?php echo Uri::create('login') ?>" >Sign in</a>
				<?php } ?>
				</div>
			</div>
		</header>
	
		<?php if(Auth::check()){ ?>
		<div class="row" >
			<nav class="navbar navbar-light bg-faded">
				<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar">&#9776;</button>
				<div class="collapse navbar-toggleable-xs" id="navbar">
					<ul class="nav navbar-nav">
						<li class="nav-item<?php echo preg_match('/dashboard/', Uri::current()) ? ' active': ''; ?>" >
							<a class="nav-link" href="<?php echo Uri::create('dashboard'); ?>" >Dashboard</a>
						</li>
						<li class="nav-item<?php echo preg_match('/users/', Uri::current()) ? ' active': ''; ?>" >
							<a class="nav-link" href="<?php echo Uri::create('users'); ?>" >Users</a>
						</li>
					</ul>
				</div>
				<form class="form-inline navbar-form pull-right">
					<input class="form-control form-control-sm" type="text" placeholder="Search">
				</form>
			</nav>
		</div>
		<?php } ?>
		
		<?php echo $content; ?>
		
		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo Fuel::VERSION; ?></small>
			</p>
		</footer>
		
    </div>
	
	<?php echo Asset::js('jquery.min.js'); ?>
	<?php echo Asset::js('bootstrap.min.js'); ?>
	
</body>
</html>
