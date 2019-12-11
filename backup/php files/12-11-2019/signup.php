<?php 
   require 'database.php'; 

   $message = '';
   $messageError = '';
   $fechaActualHora = date('d-m-Y H:i:s');
   $fechaActual = date('d-m-Y');
 
      if(!empty($_POST['user']) && !empty($_POST['email']) && !empty($_POST['password'])){
        $sql = "INSERT INTO users (user, email, password) VALUES (:user,:email,:password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user', $_POST['user']);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password); 

        if ($stmt->execute()) {
            $message = 'Successfully created new user';
        }else{
            $messageError = 'Sorry there must have been an issue creating  your accounr'; 
        }
       }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signup Webapp</title>

    <!-- Bootstrap core CSS -->
    <link href="resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">

      
    <form class="form-signin"  action="signup.php" method="post">
    
      <?php if (!empty($message)):?>
        <div class="alert alert-success" role="alert">
        <?php echo $message?>
        <a class="btn btn-success" href="login/" role="button">Iniciar sesión</a>
        </div>
       <?php endif?>

       <?php if (!empty($messageError)):?>
        <div class="alert alert-danger" role="alert">
        <?php echo $messageError?>
        </div>
       <?php endif?>

       <style>
       .tittle{
          font-family:  impact;
       }
       </style>
      <h1 class="tittle" >Time Smart</h1>
      <h1 class="h3 mb-3 font-weight-normal">Registro</h1>
      
      <label for="inputUser" class="sr-only">User</label>
      <input type="text" name="user" id="inputUser" class="form-control" placeholder="user" required autofocus>
     
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="email" required autofocus>
     
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      
      <label for="inputRepeatPassword" class="sr-only">Confirm Password</label>
      <input type="password" id="inputRepeatPassword" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
      
      <button class="btn btn-lg btn-primary btn-block" type="submit" value="Send">Registrarme</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form>
  </body>
</html>
