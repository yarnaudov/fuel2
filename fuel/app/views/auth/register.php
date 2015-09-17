<br>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Registration form</h3>
			</div>
			<div class="panel-body">
				
				<?php 
				if($messages = \Messages::get()){
					foreach($messages as $messages){ 
						echo $messages;
					}
				}
				?>
				
				<?php echo Form::open(array('action' => Uri::generate('register'), 'class' => 'form-horizontal')); ?>
				<?php echo Form::csrf(); ?>
					<fieldset>
						<div class="form-group">
							<label class="control-label col-sm-4" >Name</label>
							<div class="col-sm-8" >
								<?php echo Form::input('fullname', (isset($username) ? $username : null), array('class' => 'form-control')); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" >Username</label>
							<div class="col-sm-8" >
								<?php echo Form::input('username', (isset($username) ? $username : null), array('class' => 'form-control')); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" >Password</label>
							<div class="col-sm-8" >
								<?php echo Form::password('password', null, array('class' => 'form-control')); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" >Confirm password</label>
							<div class="col-sm-8" >
								<?php echo Form::password('password2', null, array('class' => 'form-control')); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" >E-mail</label>
							<div class="col-sm-8" >
								<?php echo Form::input('email', (isset($username) ? $username : null), array('class' => 'form-control')); ?>
							</div>
						</div>
						
						<div class="row">
							<hr>
							<div class="col-sm-8 col-sm-offset-4" >
								<?php echo Form::button('register', 'Register', array('class' => 'btn btn-success')); ?>
								| <a href="#" >Clear</a>
							</div>
						</div>
						
					</fieldset>
				<?php echo Form::close(); ?>
				
			</div>
		</div>
	</div>
</div>
