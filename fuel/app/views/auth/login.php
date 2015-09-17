<br>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Please Sign In</h3>
			</div>
			<div class="panel-body">
				
				<?php 
				if($messages = \Messages::get()){
					foreach($messages as $messages){ 
						echo $messages;
					}
				}
				?>
				
				<?php echo Form::open(array('action' => Uri::generate('login'), 'class' => 'form-horizontal')); ?>
				<?php echo Form::csrf(); ?>
					<fieldset>
						<div class="form-group">
							<label class="control-label col-sm-4" >Username</label>
							<div class="col-sm-8" >
								<?php echo Form::input('username', (isset($username) ? $username : null), array('class' => 'form-control input-sm')); ?>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 text-right" >
								<label class="control-label" >Password</label><br>
								<a href="<?php echo Uri::generate('lostpassword') ?>" >Forgot password?</a>
							</div>
							<div class="col-sm-8" >
								<?php echo Form::password('password', null, array('class' => 'form-control input-sm')); ?>
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
							<hr>
							<div class="col-sm-8 col-sm-offset-4" >
								<?php echo Form::button('login', 'Login', array('class' => 'btn btn-success')); ?>
								| <a href="<?php echo Uri::generate('register') ?>" >Register</a>
							</div>
						</div>
						
					</fieldset>
				<?php echo Form::close(); ?>
				
			</div>
		</div>
	</div>
</div>
