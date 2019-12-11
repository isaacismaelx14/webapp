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
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<body class="has-navbar-fixed-top">
       <nav class="navbar is-fixed-top box-shadow-y">
         <div class="navbar-brand">
           <a
             role="button"
             class="navbar-burger toggler"
             aria-label="menu"
             aria-expanded="false"
           >
             <span aria-hidden="true"></span>
             <span aria-hidden="true"></span>
             <span aria-hidden="true"></span>
           </a>
           <a href="#" class="navbar-item has-text-weight-bold has-text-black">
             FrontEndFunn
           </a>
           <a
             role="button"
             class="navbar-burger nav-toggler"
             aria-label="menu"
             aria-expanded="false"
           >
             <span aria-hidden="true"></span>
             <span aria-hidden="true"></span>
             <span aria-hidden="true"></span>
           </a>
         </div>
         <div class="navbar-menu has-background-white">
           <div class="navbar-start">
             <a href="#" class="navbar-item">
               <i class="fas fa-home icon"></i> Home
             </a>
             <a href="#" class="navbar-item">
               About
             </a>
             <a href="#" class="navbar-item">
               Features
             </a>
             <a href="#" class="navbar-item">Pricing</a>
           </div>
           <div class="navbar-end">
             <a href="#" class="navbar-item">
               Notifications
             </a>
             <div class="navbar-item has-dropdown is-hoverable">
               <a href="#" class="navbar-link">
                 Admin
               </a>
               <div class="navbar-dropdown is-right">
                 <a href="#" class="navbar-item">
                   Profile
                 </a>
                 <a href="#" class="navbar-item">Settings</a>
                 <hr class="navbar-divider" />
                 <a href="../logout.php" class="navbar-item">Log Out</a>
               </div>
             </div>
           </div>
         </div>
       </nav>
       <div class="columns is-variable is-0">
         <div>
           <div class="menu-container px-1 has-background-white">
             <div class="menu-wrapper py-1">
               <aside class="menu">
                 <p class="menu-label has-text-lighter">General</p>
                 <ul class="menu-list">
                   <li>
                     <a href="#" class="has-text-black">
                       <i class="fas fa-tachometer-alt icon"></i>
                       Dashboard</a
                     >
                   </li>
                 </ul>
                 <p class="menu-label has-text-lighter">Administration</p>
                 <ul class="menu-list">
                   <li>
                     <a href="#" class="is-active has-background-primary">
                       <i class="fas fa-cogs icon"></i>
                       Settings</a
                     >
                   </li>
                   <li>
                     <a href="#" class="has-text-black">
                       <i class="fas fa-users-cog icon"></i>
                       Manage Team</a
                     >
                     <ul>
                       <li>
                         <a href="#" class="has-text-black">
                           <i class="fas fa-users icon"></i>
                           Members</a
                         >
                       </li>
                       <li>
                         <a href="#" class="has-text-black">
                           <i class="fas fa-user-plus icon"></i>
                           Add New</a
                         >
                       </li>
                     </ul>
                   </li>
                 </ul>
                 <p class="menu-label has-text-lighter">Other</p>
                 <ul class="menu-list">
                   <li>
                     <a href="#" class="has-text-black">
                       <i class="fas fa-comments icon"></i>
                       Chats</a
                     >
                   </li>
                   <li>
                     <a href="#" class="has-text-black">
                       <i class="fas fa-info-circle icon"></i>
                       Extras</a
                     >
                   </li>
                 </ul>
               </aside>
             </div>
           </div>
         </div>
         <div
           class="column is-10-desktop is-offset-2-desktop is-9-tablet is-offset-3-tablet is-12-mobile"
         >
           <div class="p-1">
             <div class="columns is-variable is-desktop">
               <div class="column">
                 <h1 class="title">
                   Dashboard
                 </h1>
               </div>
             </div>
             <div class="columns  is-variable is-desktop">
               <div class="column">
                 <div class="card has-background-primary has-text-white">
                   <div class="card-header">
                     <div class="card-header-title has-text-white">
                       Top Seller Total
                     </div>
                   </div>
                   <div class="card-content">
                     <p class="is-size-3">56,590</p>
                   </div>
                 </div>
               </div>
               <div class="column">
                 <div class="card has-background-warning has-text-black">
                   <div class="card-header">
                     <div class="card-header-title has-text-black is-uppercase">
                       Revenue
                     </div>
                   </div>
                   <div class="card-content">
                     <p class="is-size-3">55%</p>
                   </div>
                 </div>
               </div>
               <div class="column">
                 <div class="card has-background-info has-text-white">
                   <div class="card-header">
                     <div class="card-header-title has-text-white is-uppercase">
                       Feedback
                     </div>
                   </div>
                   <div class="card-content">
                     <p class="is-size-3">78 %</p>
                   </div>
                 </div>
               </div>
               <div class="column">
                 <div class="card has-background-danger has-text-white">
                   <div class="card-header">
                     <div class="card-header-title has-text-white">Orders</div>
                   </div>
                   <div class="card-content">
                     <p class="is-size-3">425k</p>
                   </div>
                 </div>
               </div>
             </div>
             <div class="columns is-variable">
               <div class="column is-4-desktop is-6-tablet">
                 <article class="message is-info">
                   <div class="message-header">
                     <p>Info</p>
                     <button class="delete" aria-label="delete"></button>
                   </div>
                   <div class="message-body">
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                     <strong>Pellentesque risus mi</strong>, tempus quis placerat
                     ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet
                     fringilla. Nullam gravida purus diam, et dictum
                     <a>felis venenatis</a> efficitur. Aenean ac
                     <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu
                     et sollicitudin porttitor, tortor urna tempor ligula, id
                     porttitor mi magna a neque. Donec dui urna, vehicula et sem
                     eget, facilisis sodales sem.
                   </div>
                 </article>
               </div>
               <div class="column is-4-desktop is-6-tablet">
                 <article class="message is-success">
                   <div class="message-header">
                     <p>Info</p>
                     <button class="delete" aria-label="delete"></button>
                   </div>
                   <div class="message-body">
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                     <strong>Pellentesque risus mi</strong>, tempus quis placerat
                     ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet
                     fringilla. Nullam gravida purus diam, et dictum
                     <a>felis venenatis</a> efficitur. Aenean ac
                     <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu
                     et sollicitudin porttitor, tortor urna tempor ligula, id
                     porttitor mi magna a neque. Donec dui urna, vehicula et sem
                     eget, facilisis sodales sem.
                   </div>
                 </article>
               </div>
             </div>
           </div>
         </div>
       </div>
     </body>


    <script src="js/main.js"></script>
</body>
</html>

   