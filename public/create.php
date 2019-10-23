<?php

require_once '../includes/config.php';

$pt = new PostTable();

if (isset($_POST['title']) && isset($_POST['content'])) {
    $post = new Post();
    $post->setTitle($_POST['title']);
    $post->setContent($_POST['content']);
    $pt->create($post);
}

$posts = $pt->all();

if (!empty($_GET['id'])) {
  $getid = $_GET['id'];
  $pt->delete($getid);
  header("location:index.php");
}

?>
