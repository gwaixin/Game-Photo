<div class='col-lg-6 col-lg-offset-3'>
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