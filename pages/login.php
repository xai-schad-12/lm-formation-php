<?php 
$message="";
$error="";

 if(isset($_POST["login"])){

    $email=$_POST["email"];
    $password=$_POST["password"];

      if($email==""){
        $error= "email est obligatoire";
      }elseif($password==""){
        $error= "password est obligatoire";
      }else{
        require_once "../db_conf.php";
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user){
            if($password== $user["password"]){
                $message= "connexion reussie";
            }else{
                $error= "email ou password incorrect";
            }
        }else{
            $error="utilisateur n'existe pas";
        }
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
        <h3 class="text-center">Login</h3>
        <div class="col-md-6">
          <?php  echo $message ?>
          <span class="text-danger"><?php  echo $error ?></span>
          <form method="POST" >
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control"  name="email">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <button type="submit" class="btn btn-primary" name="login">connexion</button>
</form>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>