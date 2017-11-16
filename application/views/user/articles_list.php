<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/ci_blog_app/application/views/include/user_header.php';
include_once($path);

?>

<div class="container">
  <h2>Articles</h2>
  <hr>
  <table class="table">
    <thead>
      <tr>
        <td>Sr.</td>
        <td>Title</td>
      </tr>
    </thead>
    <tbody>
        <?php if ( count($articleslist) ):
          foreach ($articleslist as $article): ?>
          <tr>
            <td><?= $article->id ?></td>
            <td><?= $article->title ?></td>
          </tr>
          <?php endforeach;
        else:
          echo "No records found!";
        endif; ?>
    </tbody>
  </table>

</div>
