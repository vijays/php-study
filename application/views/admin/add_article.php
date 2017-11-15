<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/ci_blog_app/application/views/include/admin_header.php';
include_once($path);

?>

<div class="container">
<?php echo form_open('Admin/store_article', ['class'=>'form_horizontal']); ?>
<?php echo form_hidden('user_id', $this->session->userdata('user_id')); ?>
  <fieldset>
    <legend>Add Article</legend>
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
          <label for="inputArticleTitle" class="col-lg-4 control-label">Article Title</label>
          <div class="col-lg-8">
            <?php echo form_input(['name'=>'article_title', 'class'=>'form-control', 'placeholder'=>'Input Article Title', 'value'=>set_value('article_title')]) ?>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <?php
          //echo form_error('uid',"<p class='text-danger'>","</p>");
          echo form_error('article_title');
        ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="inputArticleBody" class="col-lg-4 control-label">Article Body</label>
          <div class="col-lg-8">
            <?php echo form_textarea  (['name'=>'article_body', 'class'=>'form-control', 'placeholder'=>'Input Article Body', 'value'=>set_value('article_body')]) ?>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <?php
          //echo form_error('pwd',"<p class='text-danger'>","</p>");
          echo form_error('article_body');
        ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-3">
        <br>
        <?php echo form_reset(['name'=>'reset', 'class'=>'btn btn-default', 'value'=>'Reset']); ?>
        <?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Submit']); ?>
      </div>
    </div>
  </fieldset>
</div>

<?php
  //echo validation_errors();
?>
