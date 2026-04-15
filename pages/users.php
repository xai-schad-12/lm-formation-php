<?php
require_once "../db_conf.php";//appel de la base de donnee
require_once "../crud.php";
$user = new Crud($pdo, "users");
$users = $user->readAll();


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    
    <?php require_once "./navbar.php"; ?>
<div class="container mt-5">
    <h3 class="text-center">Liste des utilisateurs</h3>
    <div class="row justify-content-center">
        <div class="col-md-8">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Address mail</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $index => $user){ ?>
    <tr>
      <th scope="row"><?php echo $index + 1 ?></th>
      <td><?php echo $user["email"] ?></td>
    </tr>
    <?php } ?>

  </tbody>
</table>
</div>
</div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>