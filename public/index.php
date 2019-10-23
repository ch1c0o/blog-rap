<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">BLOG RAP</h1>
        <div class="row">
          <?php require_once 'create.php';?>
           <?php foreach($posts as $post): ?>
                <div class="col-md-4">
                    <h2><?= $post['title'] ?></h2>
                    <p><?= $post['content'] ?></p>
                    <a href="Modifier.php?id=<?= $post['id']?>" class="btn btn-danger">Modifier</a>
                    <a href="index.php?id=<?= $post['id'] ?> "class="btn btn-danger btn-rounded">Supprimer</a>
                </div>
            <?php endforeach; ?>
        </div>
        <br></br>
        <h1>Ajouter un poste</h1>
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
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</body>
</html>
