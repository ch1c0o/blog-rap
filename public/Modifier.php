<?php

require_once '../includes/config.php';

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

$pt = new PostTable();

$id = $_GET['id'];

$objet = $pt->get($id);

if (!empty($_POST['Modifier'])){
    if(!empty($_POST['title'] && !empty($_POST['content']))) {

        $post = new Post();
        $post->setTitle($_POST['title']);
        $post->setContent($_POST['content']);
        $post->setId($id);
        $pt->update($post);

        header('location:../index.php');

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">BLOG RAP</h1>

        <h1>Modifier poste</h1>
        <div class="row">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="title">Contenu</label>
                    <textarea class="form-control" name="content"></textarea>
                </div>
                <a href="index.php" class="btn btn-danger btn-rounded">Modifier</a>
</body>
</html>
