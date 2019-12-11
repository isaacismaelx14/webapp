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
    header('Location: /webapp/login/');
}

?>
