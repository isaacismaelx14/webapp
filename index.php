<?php 

session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, user, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if(!empty($results)){
        $user = $results;
    }
}

if(!empty($user)){
    header('Location: /webapp/app/'); 
}else{

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
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
    <title>Login Webapp</title>

    <!-- Bootstrap core CSS -->
    <link href="resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="resources/css/styles.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin"  action="login/" method="post">

       <style>
       .tittle{
          font-family:  impact;
       }
       </style>
      <h1 class="tittle" >Time Smart</h1>

      <a href="login/" class="btn btn-lg btn-primary btn-block">Login</a>
            <p>or</p>
      <a href="signup/" class="btn btn-lg btn-primary btn-block">Signup</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form>
  </body>
</html>

