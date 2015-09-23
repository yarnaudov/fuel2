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
				
		<?php echo Form::open(array('action' => Uri::create('register'), 'class' => 'form-horizontal')); ?>
		<?php echo Form::csrf(); ?>
					
		<div class="row">
			<label class="form-control-label col-sm-4" >Name</label>
			<div class="col-sm-8" >
				<?php echo Form::input('fullname', (isset($username) ? $username : null), array('class' => 'form-control form-control-sm')); ?>
			</div>
		</div>
		<div class="row">
			<label class="form-control-label col-sm-4" >Username</label>
			<div class="col-sm-8" >
				<?php echo Form::input('username', (isset($username) ? $username : null), array('class' => 'form-control form-control-sm')); ?>
			</div>
		</div>
		<div class="row">
			<label class="form-control-label col-sm-4" >Password</label>
			<div class="col-sm-8" >
				<?php echo Form::password('password', null, array('class' => 'form-control form-control-sm')); ?>
			</div>
		</div>
		<div class="row">
			<label class="form-control-label col-sm-4" >Confirm password</label>
			<div class="col-sm-8" >
				<?php echo Form::password('password2', null, array('class' => 'form-control form-control-sm')); ?>
			</div>
		</div>
		<div class="row">
			<label class="form-control-label col-sm-4" >E-mail</label>
			<div class="col-sm-8" >
				<?php echo Form::input('email', (isset($username) ? $username : null), array('class' => 'form-control form-control-sm')); ?>
			</div>
		</div>
						
		<div class="row">
			<hr>
			<div class="col-sm-12 text-center" >
				<?php echo Form::button('register', 'Register', array('class' => 'btn btn-success')); ?>
			</div>
		</div>

		<?php echo Form::close(); ?>
				
	</div>
</div>