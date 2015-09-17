<!DOCTYPE html>
<html lang="<?php echo Config::get('language'); ?>" >
<head>
	<meta charset="utf-8" >
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.min.css'); ?>
	<?php echo Asset::js('jquery.min.js'); ?>
	<?php echo Asset::js('bootstrap.min.js'); ?>
</head>
<body>
    <div class="container-fluid">
		<?php echo $content; ?>
    </div>
</body>
</html>
