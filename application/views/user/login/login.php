<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<form method="post" accept-charset="utf-8" class="form-signin">
	  <h2>Zero day Music<h1 class="h5 font-weight-normal">Please sign in</h5></h2>
      <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      
	  <?php if (isset($flash_message)) { ?>
	  <div class="alert alert-success" role="alert">
	  	<?php echo $flash_message; ?>
	  </div>
	  <?php } ?>
	  <?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
	  <?php endif; ?>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="username" name="username" class="form-control" placeholder="Your username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
	  <div class="text-left">
	  <a href="<?php echo base_url('user/forgot'); ?>">Forgot password?</a>
	  </div>
	  </br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018 Zeroday Music</p>
    </form>