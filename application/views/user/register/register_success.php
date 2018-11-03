<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

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
			<h4>Thank you for registering your new account!</h5>
			<p>You have successfully register. Please check your email inbox to confirm your email address.</p>
		</div>
	</div>
	</div>