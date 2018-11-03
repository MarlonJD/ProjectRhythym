<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<form method="post" accept-charset="utf-8" class="form-signin">
	  Zeroday Music
      <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Reset Password</h1>
      <div class="form-group">
        <label for="password">Password <i class="fas fa-question-circle tooltipc" data-toggle="tooltip" data-placement="top" data-original-title="At least 6 characters"></i></label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter a password">
      </div>
      <div class="form-group">
        <label for="passconf">Confirm password <i class="fas fa-question-circle tooltipc" data-toggle="tooltip" data-placement="top" data-original-title="Must match your password"></i></label></label>
        <input type="password" class="form-control" id="passconf" name="passconf" placeholder="Confirm your password">
      </div>
	  </br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018 Zeroday Music</p>
    </form>
