<br>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Change password for @<?php echo $user->username ?></h3>
			</div>
			<div class="panel-body">
				
				<?php 
				if($messages = \Messages::get()){
					foreach($messages as $messages){ 
						echo $messages;
					}
				}
				?>
				
				<?php echo Form::open(Uri::generate('lostpassword')); ?>
				<?php echo Form::csrf(); ?>
					<fieldset>
						<div class="form-group">
							<label class="control-label" >Password</label>
							<?php echo Form::input('password', (isset($email) ? $email : null), array('class' => 'form-control')); ?>
						</div>
						<div class="form-group">
							<label class="control-label" >Confirm password</label>
							<?php echo Form::input('password2', (isset($email) ? $email : null), array('class' => 'form-control')); ?>
						</div>
						<?php echo Form::button('submit', 'Change password', array('class' => 'btn btn-lg btn-success btn-block')); ?>
					</fieldset>
				<?php echo Form::close(); ?>
				
			</div>
		</div>
	</div>
</div>
