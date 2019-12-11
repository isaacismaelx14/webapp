<?php 
   
    session_start();
    
    require '../database.php';
  
        $time = 1;
        $records = $conn->prepare('UPDATE users set first_time = :first_time WHERE id=:id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->bindParam(':first_time', $time);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
      
        if ($records->execute()) {
    
            header('Location: ../app/');
                }else{
            echo($_SESSION['user_id']);
        }
    
?>