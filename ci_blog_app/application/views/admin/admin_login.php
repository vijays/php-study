<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/ci_blog_app/application/views/include/user_header.php';
include_once($path);

?>

<div class="container">
<?php echo form_open('login/admin_login', ['class'=>'form_horizontal']) ?>
  <fieldset>
    <legend>Login</legend>
    <?php if ($error = $this->session->flashdata('login_failed')): ?>
      <div class="row">
        <div class="col-lg-6">
          <div class="alert alert-dismissible alert-danger">
            <?php echo $error; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="inputUid" class="col-lg-2 control-label">User Id</label>
          <div class="col-lg-10">
            <?php echo form_input(['name'=>'uid', 'class'=>'form-control', 'placeholder'=>'Input User Id', 'value'=>set_value('uid')]) ?>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <?php
          //echo form_error('uid',"<p class='text-danger'>","</p>");
          echo form_error('uid');
        ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="inputPassword" class="col-lg-2 control-label">Password</label>
          <div class="col-lg-10">
            <?php echo form_password(['name'=>'pwd', 'class'=>'form-control', 'placeholder'=>'Input Password', 'value'=>set_value('pwd')]) ?>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <?php
          //echo form_error('pwd',"<p class='text-danger'>","</p>");
          echo form_error('pwd');
        ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <br>
        <?php echo form_reset(['name'=>'reset', 'class'=>'btn btn-default', 'value'=>'Reset']); ?>
        <?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Login']); ?>
      </div>
    </div>
  </fieldset>
</div>

<?php
  //echo validation_errors();
?>
