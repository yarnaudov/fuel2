<br>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Forgot password</h3>
			</div>
			<div class="panel-body">
				
				<?php 
				if($messages = \Messages::get()){
					foreach($messages as $messages){ 
						echo $messages;
					}
				}
				?>
				
				<?php echo Form::open(array('action' => Uri::generate('lostpassword'), 'class' => 'form-horizontal')); ?>
				<?php echo Form::csrf(); ?>
					<fieldset>
						<div class="row">
							<label class="control-label col-sm-2" >Email</label>
							<div class="col-sm-10" >
								<?php echo Form::input('email', (isset($email) ? $email : null), array('class' => 'form-control')); ?>
							</div>
						</div>
						
						<div class="row">
							<hr>
							<div class="col-sm-12 text-center" >
								<?php echo Form::button('submit', 'Submit', array('class' => 'btn btn-success')); ?>
							</div>
						</div>
					</fieldset>
				<?php echo Form::close(); ?>
				
			</div>
		</div>
	</div>
</div>
