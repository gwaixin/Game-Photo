<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('font-awesome.min');
		echo $this->Html->css('jquery-ui.min');
		echo $this->Html->css('jquery-ui.structure.min');
		echo $this->Html->css('jquery-ui.theme.min');
		echo $this->Html->css('main');

		echo $this->Html->script('jquery-2.1.1.min');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('jquery-ui.min');
		echo $this->Html->script('main');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<!--<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
	-->
</head>
<body>
	<div id="container">
		<!-- <div id="header">
			<h1></h1>
		</div> -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		    <div class="container">
		        <!-- Brand and toggle get grouped for better mobile display -->
		        <div class="navbar-header">
		            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		            <a class="navbar-brand" href="<?php echo $this->webroot;?>">Game Photo</a>
		        </div>
		
		        <!-- Collect the nav links, forms, and other content for toggling -->
		        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		            <ul class="nav navbar-nav">
		                <li class="dropdown">
		                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Game category">Category <b class="caret"></b></a>
		                    <ul class="dropdown-menu">
		                        <li>
		                            <a href="javascript:;"><i class="fa fa-globe fa-fw"></i> All Templates &amp; Themes</a>
		                        </li>
		                        <li>
		                            <a href="javascript:;"><i class="fa fa-star fa-fw"></i> Most Popular</a>
		                        </li>
		                        <li>
		                            <a href="javascript:;"><i class="fa fa-shopping-cart fa-fw"></i> Buy Bootstrap Templates</a>
		                        </li>
		                        <li class="divider"></li>
		                        <li class="dropdown-header">
		                            Template &amp; Theme Categories:
		                        </li>
		                        <li>
		                            <a href="javascript:;">Admin and Dashboard</a>
		                        </li>
		                        <li>
		                            <a href="javascript:;">Full Websites</a>
		                        </li>
		                        <li>
		                            <a href="javascript:;">Landing Pages</a>
		                        </li>
		                    </ul>
		                </li>
		                <li>
		                    <a href="<?php echo $this->webroot;?>games/gameList" title="Game Photo list">Games</a>
		                </li>
		                <li>
		                    <a href="<?php echo $this->webroot;?>games/profile" title="Add new photo">Add</a>
		                </li>
		            </ul>
		            <ul class="nav navbar-nav navbar-right">
		            	
	            		<?php 
	                  		$userSession = $this->Session->read('User');
	                  		if ($userSession['isLogin']) {
                  		?>
                  		<li>
                  			<a><?php echo $userSession['name']?></a>
                  		</li>
                  		<li>
                  			<a href="<?php echo $this->webroot ?>users/logout">Logout</a>
                  		</li>
                  		<?php 
	                  		} else {
	                  	?>
	                  	<li>
                  			<a href="<?php echo $this->webroot ?>users/login">Login</a>
                  		</li>
	                  	<?php 
	                  		}
                  		?>
		            	
		               
		            </ul>
		        </div>
		        <!-- /.navbar-collapse -->
		    </div>
		    <!-- /.container -->
		</nav>
		<br/>
		<br/>
		<br/>
		<br/>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
</body>
</html>
