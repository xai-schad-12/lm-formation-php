<?php 
require_once "../db_conf.php";//appel de la base de donnee
require_once "../crud.php";
$employees=new Crud($pdo,"employee");
$employes=$employees->readAll();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>gestion de presence</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <?php require_once "./navbar.php"; ?>
    <h1>Liste de presence des employés</h1>
    <a href="form_employee.php">ajouter un employée</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>postnom</th>
          <th>fonction</th>
          <th>sexe</th>
        </tr>
        <tbody>
            <?php foreach($employes as $employe):?>
                <tr>
                    <td><?php echo $employe['nom'] ?></td>
                    <td><?php echo $employe['prenom'] ?></td>
                    <td><?php echo $employe['postnom'] ?></td>
                    <td><?php echo $employe['fonction'] ?></td>
                    <td><?php echo $employe['sexe'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
   </table>
    
    
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>