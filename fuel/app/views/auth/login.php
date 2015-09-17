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
				
				<?php echo Form::open(Uri::generate('login')); ?>
				<?php echo Form::csrf(); ?>
					<fieldset>
						<div class="form-group">
							<label class="control-label" >Username</label>
							<?php echo Form::input('username', (isset($username) ? $username : null), array('class' => 'form-control')); ?>
						</div>
						<div class="form-group">
							<label class="control-label" >Password</label> (<a href="<?php echo Uri::generate('lostpassword') ?>" >Forgot password?</a>)
							<?php echo Form::password('password', null, array('class' => 'form-control')); ?>
						</div>
						<div class="checkbox">
							<label>
								<?php echo Form::checkbox('remember'); ?> Remember Me
							</label>
						</div>
						<?php echo Form::button('login', 'Login', array('class' => 'btn btn-lg btn-success btn-block')); ?>
						<hr>
						Not have account? <a href="<?php echo Uri::generate('register') ?>" >Register</a>
					</fieldset>
				<?php echo Form::close(); ?>
				
			</div>
		</div>
	</div>
</div>
