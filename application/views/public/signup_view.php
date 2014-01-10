<h2 class="offset1">Opprett ny bruker</h2>
<?php 
	$attr = array('class' => 'offset1', 'name' => 'signup');
	echo form_open('signup',$attr);
?>
    <label>First Name</label>
    <input type="text" name="firstname" class="span4">
    <label>Last Name</label>
    <input type="text" name="lastname" class="span4">
    <label>Email Address</label>
    <input type="email" name="email" class="span4">
    <label>Username</label>
    <input type="text" name="username" class="span4">
    <label>Password</label>
    <input type="password" name="password" class="span4">
    </br>
    <label>Confirm password</label>
    <input type="password" name="verify" class="span4">
    </br>
    <input type="submit" value="Sign up" class="btn btn-primary">
    <div class="clearfix"></div>
</form>
