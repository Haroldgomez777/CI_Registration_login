<div class="jumbotron">
	<div class="container">
<?php echo validation_errors(); ?>

<?php echo form_open('users/register_view', array(
    'id' => 'signupform2'
)); ?>

<div class="form-group ">    <div class="form-inline">
        <label id="lfname" for="name" class="col-2 col-form-label">firstname</label>
        <input class="form-control" id="firstname" type="text" name="firstname"/>
    </div>
    <div class="form-inline">
        <label id="llname" for="name" class="col-2 col-form-label">lastname</label>
        <input class="form-control" id="lastname" type="text" name="lastname"/>
    </div>
    <div class="form-inline">
        <label id="lemail" for="email" class="col-2 col-form-label">Email</label>
        <input class="form-control" id="email" type="email" name="email" />
    </div>
       <div class="form-inline">
        <label id="password" for="password" class="col-2 col-form-label">Password</label>
           <input class="form-control" id="password" type="password" name="password" />
    </div>
    <div class="offset-sm-2 col-sm-10">
    <input id="usercreatesubmit" type="submit" name="submit" value="Sign up" />
    </div></div>
    <div class="inner"></div>
</form>
	</div>
</div>