<?php 
	$name = '';
	$username = '';
	$email = '';
	if (!empty($post)) {
		$name = $post['name'];
		$email = $post['email'];
		$username = $post['username'];
	}

?>
<div class='col-lg-6 col-lg-offset-3'>
	<div>
		<?php echo $this->Session->flash();?>
	</div>
	<h2>Register</h2>
	<form role="form" method="POST">
		<br>
		<div class="form-group input-group">
			<span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
			<input type="text" name="name" class="form-control" placeholder="Your Name" value="<?php echo $name;?>">
		</div>
		<div class="form-group input-group">
			<span class="input-group-addon"><i class="fa fa-tag"></i></span> 
			<input type="text" name="username" class="form-control" placeholder="Desired Username" value="<?php echo $username;?>">
		</div>
		<div class="form-group input-group">
			<span class="input-group-addon">@</span> 
			<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email;?>">
		</div>
		<div class="form-group input-group">
			<span class="input-group-addon"><i class="fa fa-lock"></i></span> 
			<input type="password" name="password" class="form-control" placeholder="Enter Password">
		</div>
		<div class="form-group input-group">
			<span class="input-group-addon"><i class="fa fa-lock"></i></span> 
			<input type="password" name="password_confirm" class="form-control" placeholder="Retype Password">
		</div>
	
		<input type="submit" class="btn btn-success " value="Register Me">
		<hr>
		Already Registered ? <a href="<?php echo $this->webroot; ?>">Login here</a>
	</form>

</div>