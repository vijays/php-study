<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= link_tag('assets/css/bootstrap.min.css') ?>
    <title>Articles List</title>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url('User')?>">My Blog</a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!-- form class="navbar-form navbar-left" role="search" -->
              <!-- div class="form-group" -->
                <!-- input type="text" class="form-control" placeholder="Search" name="query" -->
              <!-- /div -->
              <!-- button type="submit" class="btn btn-default">Submit</button -->
            <!-- /form -->
            <?php echo form_open('user/search', ['class'=>"navbar-form navbar-left", 'role'=>"search"]) ?>
            <?php echo form_input(['id'=>"search", 'name'=>'query', 'value'=>set_value('query'), 'class'=>'form_control']) ?>
            <?php echo form_submit(['name'=>'submit', 'value'=>'Search', 'class'=>'btn btn-success']); ?>
            <?php echo form_close(); ?>
            <?php echo form_error('query', "<p class='nav-bar-text text-danger'>", "</p>"); ?>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url('Login')?>">Login</a></li>
            </ul>
          </div>
        </div>
    </nav>
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>
