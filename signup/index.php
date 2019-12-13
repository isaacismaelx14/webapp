<?php 
   require '../database.php'; 
   require '../resources/complements/var.php';
   
   $message = '';
   $messageError = '';
   $fechaActualHora = date('d-m-Y H:i:s');
   $fechaActual = date('d-m-Y');
 
      if(!empty($_POST['user']) && !empty($_POST['email']) && !empty($_POST['password'])){
        $sql = "INSERT INTO users (name,lastname,user, email, password) VALUES (:name,:lastname,:user,:email,:password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':lastname', $_POST['lastname']);
        $stmt->bindParam(':user', $_POST['user']);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password); 

        if ($stmt->execute()) {
            $message = 'Successfully created new user';
        }else{
            $messageError = 'Sorry there must have been an issue creating  your account, try later'; 
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

    <title>Checkout example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <h2>Signup</h2>
        <p class="lead">.</p>
      </div>

      <?php if (!empty($message)):?>
        <div class="alert alert-success text-center" role="alert">
        <?php echo $message?>
        <a class="btn btn-success" href="../login/" role="button">Iniciar sesión</a>
        </div>
       <?php endif?>

       <?php if (!empty($messageError)):?>
        <div class="col-md-4 alert alert-danger text-center" role="alert">
        <?php echo $messageError?>
        </div>
       <?php endif?>
      
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">User Information</h4>
         
          <form class="needs-validation " action="index.php" method="post">
            <div class="row">
              <div class="col-md-6 mb-3 form-group">
                <label for="firstName" >First name</label>
                <input type="text" name="name" class="form-control" id="firstName" placeholder="John" value="" required>
                <div class="alertNamer">
                </div>
              </div>
              <div class="col-md-6 mb-3 form-group form-check">
                <label for="lastName">Last name</label>
                <input type="text" name="lastname" class="form-control" id="lastName" placeholder="Newton" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="user" name="user" class="form-control" id="username" placeholder="Username" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted"></span></label>
              <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Please enter a valid e-mail address.
              </div>
            </div>

            <div class="mb-3">
              <label for="password">password</label>
              <input type="password" name="password" class="form-control" id="password"  required>
              <div class="invalid-feedback">
                Please enter a password
              </div>
            </div>

            <div class="mb-3">
              <label for="password">repeat password</label>
              <input type="password" class="form-control" id="repeat_password"  required>
              <div class="invalid-feedback">
                Please repeat the password
              </div>
            </div> 


           
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="button" action="signup.php">Continue to signup</button>
            <span class="mb-3">*I already have an account and I want <a href="../login/">login</a></spanp>
          </form>

        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019-2020 Isaac's Code</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>

<script language="JavaScript">
function spc(){
if (document.form1.user.value.split(' ').length>=2) confirm("username must not contain blank spaces");
}
</script> 
  </body>
</html>
