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
				
		<?php echo Form::open(array('action' => Uri::generate('lostpassword'), 'class' => 'form-horizontal')); ?>
		<?php echo Form::csrf(); ?>
		
		<div class="row">
			<label class="form-control-label col-sm-2" >Email</label>
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
					
		<?php echo Form::close(); ?>
				
	</div>
</div>