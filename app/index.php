<?php 

session_start();

require '../database.php';

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

if(empty($user)){
    header('Location: ../');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Soooo</h1>

    <a href="../logout.php">Cerrar sesion</a>
</body>
</html>

   