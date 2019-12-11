<?php 

session_start();

require '../../database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, name, lastname, user, email, password, fecha_creacion, first_time FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;
    

    if(!empty($results)){
        $user = $results;
        $username = $results['user'];
        $emaild = $results['email'];
        $name = $results['name'];
        $lastname = $results['lastname'];
        $fecha_created = $results['fecha_creacion'];
        $time_first = $results['first_time'];
        $
    }
}

if(empty($user)){
    header('Location: ../../');
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

    <title><?= $username?> information</title>

    <!-- Bootstrap core CSS -->
    <link href="../../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
      
      <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" href="../">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#"><?= $username?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../../logout.php">Logout</a>
  </li>

</ul>
<br>
      <br>
    <div class="container ">
      <div class="jumbotron mt-3">
        <h1>User information</h1>
        <p class="lead">
    <b class="text-success">Name: </b><?= $name?><br>
    <b class="text-success">Lastname: </b><?= $lastname?> <br>
    <b class="text-success">Username: </b><?= $username?><br>
    <b class="text-success">Email: </b><?= $emaild?></p>
    <br>
    <p class="lead"><b class="text-success">User creation date: </b> <?= $fecha_created?></p>
        <a class="btn btn-lg btn-primary" href="../../components/navbar/" role="button">View navbar docs &raquo;</a>
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
  </body>
</html>