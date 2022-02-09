<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/ci_blog_app/application/views/include/user_header.php';
include_once($path);

?>

<div class="container">
  <h4><?php echo $article->title ?></h4>
  <hr>
  <p><?php echo $article->body ?></p>
</div>
