<?php 
 require_once "../db_conf.php";
require_once "../crud.php";
$error="";
$message="";

if(isset($_POST['insert_employee'])){

   $nom=$_POST['nom'];
   $postnom=$_POST['postnom'];
   $prenom=$_POST['prenom'];
   $fonction=$_POST['fonction'];
   $sexe=$_POST['sexe'];

    if($nom=="" || $postnom=="" || $prenom=="" || $fonction=="" || $sexe==""){
    $error="tous les champs sont obligatoires";
    }else{
       
        $employee = new Crud($pdo, "employee");
        $employee->create([
            "nom" => $nom,
            "postnom" => $postnom,
            "prenom" => $prenom,
            "fonction" => $fonction,
            "sexe" => $sexe
        ]);
        $message="employé ajouté avec succès";
        $_POST['nom']="";
        $_POST['postnom']="";
        $_POST['prenom']="";
        $_POST['fonction']="";
        $_POST['sexe']="";
    }
     


}
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
      <div class="row justify-content-center">
        <h3 class="text-center">insertion employee</h3>
        <div class="col-md-6">
          <?php  echo $message ?>
          <span class="text-danger"><?php  echo $error ?></span>
          <form method="POST" >
            <div class="mb-0">
              <label for="exampleInputtext1" class="form-label">nom</label>
              <input type="text" class="form-control"  name="nom">
             
  </div>
     <div class="mb-0">
              <label for="exampleInputtext1" class="form-label">postnom</label>
              <input type="text" class="form-control"  name="postnom">
         
  </div>
     <div class="mb-0">
              <label for="exampleInputtext1" class="form-label">prenom</label>
              <input type="text" class="form-control"  name="prenom">      
  </div>
  <div class="mb-0">
    <label for="example   InputPassword1" class="form-label">fonction</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="fonction">
  </div>
   <div class="mb-0">
              <label for="exampleInputtext1" class="form-label">sexe</label>
              <input type="text" class="form-control"  name="sexe">
  </div>
  <button type="submit" class="btn btn-primary" name="insert_employee">insertion emplyee</button>
</form>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>