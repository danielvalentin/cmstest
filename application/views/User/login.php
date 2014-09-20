<h1>Log ind</h1>
<?php
if($errors)
{
	echo '<div class="alert alert-danger">';
	echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
	echo '<h4>Fejl</h4>';
	echo 'Forkert brugernavn eller password';
	echo '</div>';
}
?>
<form action="<?php echo user::url('login'); ?>" method="post" role="form">
	<div class="login">
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="text" class="form-control" name="email" placeholder="Din e-mail..." id="email" value="<?php echo arr::get($_POST, 'email', ''); ?>" />
		</div>
		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" class="form-control" name="password" id="password" placeholder="Password..." />
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">
				Log ind
				<span class="glyphicon glyphicon-log-in"></span>
			</button> - <a href="<?php echo user::url('signup'); ?>" title="Tilmeld">Ny bruger</a>?
		</div>
		<a href="<?php echo user::url('help'); ?>" title="Nulstil dit password">glemt password?</a>
	</div>
</form>
