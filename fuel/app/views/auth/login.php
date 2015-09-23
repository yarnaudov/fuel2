<br>
<div class="row">
	
	<?php $messages = \Messages::get(); ?>
	<?php if($messages){ ?>
	<div class="col-sm-12" >
		<?php 
			foreach($messages as $messages){ 
				echo $messages;
			}
		?>
	</div>
	<?php } ?>
	
	<div class="col-md-4 col-md-offset-4">
				
		<?php echo Form::open(array('action' => Uri::update_query_string(), 'class' => 'form-horizontal')); ?>
		<?php echo Form::csrf(); ?>

		<div class="row">
			<div class="col-sm-4">
				<label class="form-control-label">Username</label>
			</div>
			<div class="col-sm-8">
				<?php echo Form::input('username', (isset($username) ? $username : null), array('class' => 'form-control form-control-sm')); ?>
			</div>
		</div>
				
		<div class="row">
			<div class="col-sm-4">
				<label class="form-control-label">Password</label>
			</div>
			<div class="col-sm-8">
				<?php echo Form::password('password', null, array('class' => 'form-control form-control-sm')); ?>
			</div>
		</div>
				
		<div class="row">
			<div class="col-sm-8 col-sm-offset-4" >
				<div class="checkbox">
					<label class="control-label"><?php echo Form::checkbox('remember'); ?> Remember Me</label>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12" >
				<a href="<?php echo Uri::create('lostpassword') ?>" >Forgot password?</a>
			</div>
		</div>
		
		<div class="row">
			<hr>
			<div class="col-sm-12 text-center" >
				<?php echo Form::button('login', 'Login', array('class' => 'btn btn-primary-outline')); ?>
			</div>
		</div>

		<?php echo Form::close(); ?>
				
	</div>
</div>