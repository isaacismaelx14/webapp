<?php 

session_start();

require '../database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, name, lastname, user, email, password, first_time FROM users WHERE id = :id');
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
        $time_first = $results['first_time'];
    }
}

if(empty($user)){
    header('Location: ../');
}

?>

 <?php if($time_first == 0):?>
<!-- Usuarios logeados por primera vez -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Welcome</title>

    <!-- Bootstrap core CSS -->
    <link href="../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>


  <body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">WebApp Agenda</h3>
    <ul class="nav justify-content-end">
      <li class="nav-item">
      <a class="nav-link disabled" href="../">Home</a>
      </li>
      <li class="nav-item">
      <a class="nav-link " href="user_information/">Hi, <?= $username?></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="../logout.php">Logout</a>
       </li>
    </ul> 
        </div>
      </header>

      <main role="main" class="inner cover">
        <h1 class="cover-heading">Hi <?= $name?> <?= $lastname?>, is good look you </h1>
        <p class="lead">Bienvenido a tu agenda personal. WebApp Agenda te ayudara a organizar tu tiempo</p>
        <p class="lead">
          <a href="set.php" class="btn btn-lg btn-secondary">Start</a>
        </p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>sitio creado by Isaac Martinez.</p>
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../resources/bootstrap/js/bootstrap.min.js"></script>
  </body>
  </html>


  <?php else:?>

    
    <!-- Usuarios logeados por mas de primera vez -->

  <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>TasksBoards</title>

    <!-- Bootstrap core CSS -->
    <link href="../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/reloj.css">
  </head>

  <body>
      
      <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link disabled" href="../">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="user_information/"><?= $username?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../logout.php">Logout</a>
  </li>

</ul>
<br>
      <br>
    <div class="container ">
      <div class="jumbotron mt-3">
        <h1>Welcome <?= $name?> <?= $lastname?> to your TasksBoards ;)</h1>
        <p class="lead">
    <b class="">It's good to see you here. Now you can add and see your tasks.</p>
        <a class="btn btn-lg btn-primary" href="../../components/navbar/" role="button">View my tasks &raquo;</a>
      </div>
      <div class="container d-flex  flex-row-reverse">
        <div class="widget">
          <div class="date lead jumbotron p-1">
            <p id="weekDay" class="weekDay"></p>
            <p id="day" class="day"></p>
            <p>de</p>
            <p id="month" class="month"></p>
            <p>del</p>
            <p id="year" class="year"></p>
          </div>
          <div class="reloj ">
            <p id="hours" class="hours"></p>
            <p>:</p>
            <p id="minute" class="minute"></p>
            <p>:</p>
            <div class="second_box">
              <p id="ampm" class="ampm"></p>
              <p id="seconds" class="seconds"></p>
            </div>

          </div>
        </div>
      </div>

    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../resources/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/fuctions.js"></script>

  </body>
</html>

<?php endif?>