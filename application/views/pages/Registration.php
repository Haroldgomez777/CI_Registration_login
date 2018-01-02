<div class="jumbotron">
	<div class="container">
<?php echo validation_errors(); ?>

<?php echo form_open('users/create','id="signupform2"'); ?>
    <p><label id="lfname" for="name">firstname</label>
        <input id="firstname" type="text" name="firstname"/></p>
    <p><label id="llname" for="name">lastname</label>
        <input id="lastname" type="text" name="lastname"/></p>
    <p><label id="lemail" for="email">Email</label>
        <input id="email" type="email" name="email" /></p>
   	<p><label id="password" for="password">Password</label>
   	    <input id="password" type="password" name="password" /></p>
    <input id="usercreatesubmit" type="submit" name="submit" value="Sign up" />
    <div class="inner"></div>
</form>
	</div>
</div>