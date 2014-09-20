<h1>Nulstil dit password</h1>

<?php /*<p>
	Enter the e-mail address you signed up with, and we'll send you an e-mail which will help you reset your password.
</p> */ ?>
<p>
	Indtast den e-mail adresse du tilmeldte dig med og så sender vi dig en e-mail med instruktioner om hvordan du nulstiller dit password
</p>

<form action="<?php echo user::url('password'); ?>" method="post" role="form" class="form-search">
	<div class="form-group">
		<label for="email" class="control-label">Din e-mailadresse:</label>
		<input type="text" placeholder="Din e-mail..." name="email" class="form-control" id="email" />
	</div>
	<input type="submit" value="Nulstil password" class="btn btn-primary" />
</form>
