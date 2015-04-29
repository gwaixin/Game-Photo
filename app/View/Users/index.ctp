<div class='col-lg-6 col-lg-offset-3'>
	<!--  <form class="form-signin" method="POST">
		<h2 class="form-signin-heading">Please sign in</h2>
		<label for="username" class="sr-only">Username</label> 
			<input type="text" id="username" name="username" class="form-control" placeholder="Username" required="" autofocus=""> 
			<label for="password" class="sr-only">Password</label> 
			<input type="password" id="password" name="username" class="form-control" placeholder="Password" required="">
		<div class="checkbox">
			<label> 
			<input type="checkbox" value="remember-me"> Remember me
			</label>
			<span class='pull-right'> <a href='<?php echo $this->webroot;?>users/register'>Register Now</a></span>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form> -->
	<?php echo $this->Form->create('User'); ?>
   		<h2 class="form-signin-heading">Please sign in</h2>	
   	<?php 
   		echo $this->Form->input('username', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Username'));
        echo $this->Form->input('password', array('type' => 'password', 'class' => 'form-control', 'placeholder' => 'Username'));
        echo $this->Form->input('LOGIN', array('label' =>'', 'type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block'));
        
    ?>
    	<span class='pull-right'> <a href='<?php echo $this->webroot;?>users/register'>Register Now</a></span>
	<?php echo $this->Form->end(); ?>
</div>