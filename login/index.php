<?php 

session_start();

require '../database.php';

if(!empty($_POST['user']) &&  !empty($_POST['password'])){
  $records = $conn->prepare('SELECT id, user, email, password FROM users WHERE user = :user');
  $records->bindParam(':user', $_POST['user']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

      if (!empty($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header('Location: ../app');
       } else {
        $message = 'Sorry, Those credentials do not match.';
        }
 
}

if (isset($_SESSION['user_id'])) {
  $recordsW = $conn->prepare('SELECT id, user, email, password FROM users WHERE id = :id');
  $recordsW->bindParam(':id', $_SESSION['user_id']);
  $recordsW->execute();
  $resultsW = $recordsW->fetch(PDO::FETCH_ASSOC);

  $user = null;

  if(!empty($resultsW)){
      $user = $resultsW;
  }

  if(!empty($user)){
    header('Location: ../app/');
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
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
    <title>Login Webapp</title>

    <!-- Bootstrap core CSS -->
    <link href="../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../resources/css/styles.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin"  action="index.php" method="post">

    <?php if (!empty($message)):?>
        <div class="alert alert-danger" role="alert">
        <?php echo $message?>
        </div>
       <?php endif?>

       <style>
       .tittle{
          font-family:  impact;
       }
       </style>
      <h1 class="tittle" >Time Smart</h1>
      <h1 class="h3 mb-3 font-weight-normal">Please login</h1>
      <label for="inputEmail" class="sr-only">User</label>
      <input type="text" id="inputEmail" name="user" class="form-control" placeholder="user" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" value="Send">Login</button>
      <p>*I do no have account I want to <a href="../signup/">signup</a></p> 
      <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form>
  </body>
</html>
