<div class="jumbotron">
	<div class="container">
<?php echo form_open('users/login_view','id="loginform"'); ?>

    <p><label id="lemail" for="email">Email</label>
        <input id="email" type="input" name="email" /></p>

   	<p><label id="lpassword" for="password">Password</label>
   	    <input id="password" type="password" name="password" /></p>

    <input id="userlogin" type="submit" name="submit" value="Log in" />
	</div>
</div>
