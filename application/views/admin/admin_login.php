<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/ci_blog_app/application/views/include/header.php';
include_once($path);

?>

<div class="container">
<?php echo form_open('login/admin_login', ['class'=>'form_horizontal']) ?>
  <fieldset>
    <legend>Login</legend>
    <div class="form-group">
      <label for="inputUid" class="col-lg-2 control-label">User Id</label>
      <div class="col-lg-10">
        <?php echo form_input(['class'=>'form-control', 'placeholder'=>'inputUid']) ?>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <?php echo form_password(['class'=>'form-control', 'placeholder'=>'inputPassword']) ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <?php echo form_reset(['class'=>'btn btn-default', 'value'=>'Reset']); ?>
        <?php echo form_submit(['class'=>'btn btn-primary', 'value'=>'Login']); ?>
      </div>
    </div>
  </fieldset>
</div>

