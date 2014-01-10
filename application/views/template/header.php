<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title.' | Omega Fotball';?></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('css/bootstrap.css');?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('css/main.css');?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('css/font-awesome.min.css');?>" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="<?php echo base_url('js/fancybox/source/jquery.fancybox.css?v=2.1.3'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url('js/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5');?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url('js/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7');?>" type="text/css" media="screen" />
	<link rel="shortcut icon" href="<?php echo base_url('img/design/favicon.ico')?>" />
</head>
<body>
	<!-- Top menu bar  -->
	<div class="navbar navbar-inverse navbar-fixed-top">
    	<div class="navbar-inner">
        	<div class="container">
	        	<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	            	<span class="icon-bar"></span>
	            	<span class="icon-bar"></span>
	            	<span class="icon-bar"></span>
	          	</button>
	       		<div class="nav-collapse collapse">
	            	<a href="<?php echo base_url();?>" class="brand"><img id="imgLogo" style="" src="<?php echo base_url('img/design/logo.png');?>" alt="logo"/></a>
	            	<ul class="nav extranav">
	            		<li><?php echo anchor(base_url(),'Hjem');?></li>
	            		<li><?php echo anchor(base_url('about'),'Klubb');?></li>
	            		<li><?php echo anchor(base_url('matches'),'Kamper');?></li>
	            		<li><?php echo anchor(base_url('statistics'),'Statistikk');?></li>
	            	</ul>
	            	<ul class="nav extranav pull-right">
	            		<li><?php echo anchor(base_url('register'),'Registrer');?></li>
	            		<li class="dropdown">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown">Logg inn <strong class="caret"></strong></a>
						<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
							<form method="post" action="login" accept-charset="UTF-8">
								<input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="username">
								<input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
								<input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
								<label class="string optional" for="user_remember_me"> Remember me</label>
								<input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
							</form>
						</div>
						</li>
						<li><?php echo anchor(base_url('admin'),'Admin');?></li>
	            	</ul>
	        	</div><!--/.nav-collapse -->
        	</div>
    	</div>
    </div>
    <!-- Top menu bar end -->
    <div class="container-fluid">
  		<div class="content_wrapper">
  			<div class="content">
  			<!--Body content-->