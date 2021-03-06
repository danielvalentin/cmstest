<h1>Tilmeld dig</h1>
<p>
	<?php echo html::anchor(user::slug('login'),'&laquo; Allerede tilmeldt?'); ?>
</p>
<?php if($errors): ?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Ups</h4>
		<p>
			<strong>Fejl</strong> Tjek venligst formularen for fejl og prøv igen
		</p>
	</div>
<?php endif; ?>

<form method="post" name="signupform">
	<div class="form-group<?php echo (arr::get($errors, 'name', false)?' has-error':'') ?>">
		<label for="register-name" class="control-label">Dit navn:</label>
		<div class="form-group">
			<input type="text" class="form-control" required name="name" value="<?php echo arr::get($_POST, 'name', ''); ?>" id="register-name" />
			<p class="help-block">
				<?php echo arr::get($errors, 'name',''); ?>
			</p>
		</div>
	</div>
	<div class="form-group<?php echo (arr::get($errors, 'email', false)?' has-error':'') ?>">
		<label for="register-email" class="control-label">Din e-mail:</label>
		<div class="form-group">
			<input class="form-control" type="email" required name="email" value="<?php echo arr::get($_POST, 'email', ''); ?>" id="register-email" />
			<p class="help-block">
				<?php echo arr::get($errors, 'email',''); ?>
			</p>
		</div>
	</div>
	<div class="form-group<?php echo (arr::path($errors, '_external.password', false)?' has-error':'') ?>">
		<label for="register-password" class="control-label">Password:</label>
		<div class="form-group">
			<input title="Min 5, max 42 characters" required value="<?php echo arr::get($_POST, 'password',''); ?>" class="form-control" type="password" name="password" id="register-password" />
			<p class="help-block">
				<?php echo arr::path($errors, '_external.password'); ?>
			</p>
		</div>
	</div>
	<div class="form-group<?php echo (arr::path($errors, '_external.password_confirm', false)?' has-error':'') ?>">
		<label for="password-again" class="control-label">Bekræft password:</label>
		<div class="form-group">
			<input type="password" class="form-control" required value="<?php echo arr::get($_POST, 'password_confirm',''); ?>" name="password_confirm" id="password-again" />
			<p class="help-block">
				<?php echo arr::path($errors, '_external.password_confirm'); ?>
			</p>
		</div>
	</div>
	<button id="signupbtn" type="submit" class="btn btn-primary btn-large">Tilmeld</button>
</form>

