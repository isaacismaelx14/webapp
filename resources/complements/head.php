<?php
$host= $_SERVER["HTTP_HOST"];
$style =  '"http://' . $host .'/webapp/resources/bootstrap/css/bootstrap.css"'; 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">
    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="floating-labels.css" rel="stylesheet">
    <link rel="stylesheet" href=<?php echo $style?>>
</head>
