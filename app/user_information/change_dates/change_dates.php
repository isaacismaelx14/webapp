<?php
   require '../../../database.php'; 
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