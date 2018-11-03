<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<?php
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		$randomPass = implode($pass); //turn the array into a string
	?>
	

	<div>
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-12">
			<div class="page-header">
				<h1>Register</h1>
			</div>
			<?= form_open() ?>
				<div class="form-group">
					<label for="username">Username <i class="fas fa-question-circle tooltipc" data-toggle="tooltip" data-placement="top" data-original-title="At least 4 characters, letters or numbers only"></i></label> 
					<input type="text" class="form-control" id="username" name="username" placeholder="Enter a username">
				</div>
				<div class="form-group"> 
					<label for="email">Email <i class="fas fa-question-circle tooltipc" data-toggle="tooltip" data-placement="top" data-original-title="A valid email address"></i></label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter a email">
				</div>
				<div class="form-group">
					<label for="password">Password <i class="fas fa-question-circle tooltipc" data-toggle="tooltip" data-placement="top" data-original-title="At least 6 characters"></i></label>
					<input type="text" class="form-control" id="password" name="password" placeholder="Enter a password" value="<?php echo $randomPass; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="password_confirm">Confirm password <i class="fas fa-question-circle tooltipc" data-toggle="tooltip" data-placement="top" data-original-title="Must match your password"></i></label></label>
					<input type="text" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm your password" value="<?php echo $randomPass; ?>" readonly>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Register">
				</div>
			</form>
		</div>
	</div>
	</div>