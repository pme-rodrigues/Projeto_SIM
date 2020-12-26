<!DOCTYPE html>

<?php 
  session_start();
?>

<html lang="en">
<head>
  <title>COVIDSYM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.2.0/css/ionicons.min.css" 
    integrity="sha256-F3Xeb7IIFr1QsWD113kV2JXaEbjhsfpgrKkwZFGIA4E=" crossorigin="anonymous" />
  <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>

<!-- Barra de navegação -->
<section id=header>
  <nav class="navbar navbar-expand-lg shadow fixed-top">
    <div class="container">
      <a class="navbar-brand text-center" href="index.php?page=homepage"><img src="images/logo_nav.jpg">COVIDSYM</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" 
      aria-controls="navbarResponsive" aria-expanded="true" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
          </button>
      <div class="collapse navbar-collapse justify-content-start" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">     
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=homepage#about">Sobre Nós</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Serviços</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=faq">FAQ</a>
          </li>

          <?php
          if(isset($_SESSION['authuser']) AND $_SESSION['authuser']==TRUE){
            echo '<li class="nav-item dropdown">';
            echo '<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">';
            echo '<img class="avatar" src="images/profile.png" alt="">' .$_SESSION['user'] .'<b class="caret"> </b>';
            echo '</a>';
            echo '<div class="dropdown-menu">';
            echo '<a href="" class="dropdown-item"><i class="fas fa-user-circle mr-2"></i>Perfil </a>';
            echo '<a href="" class="dropdown-item"><i class="fas fa-user-cog mr-2"></i>Definições </a>';
            echo '<div class="dropdown-divider"></div>';
            echo '<a href="index.php?page=signout" class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i>Sair </a>';
            echo '</div>';
            echo '</li>';
          }
          else {
            echo '<li class="nav-item">';
            echo '<a href="index.php?page=sign"><button>Login</button></a>';
            echo '</li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</section>

<?php
if(isset($_GET['page'])){
  $page = $_GET['page'];
  switch($page){
    case 'homepage':
    include('homepage.php');
    break;

    case 'sign':
    include('sign.php');
    break;

    case 'signout':
    include('signOut.php');
    break;

    case 'faq';
    include('faq.php');
    break;

    case 'services';
    include('index.html');
    break;
  }
}
else include('homepage.php');
?>

<!--O design tem de passar para formato CSS explicito e reformular a estrutura e contéudo!-->
<!-- Rodapé -->
<section class="page-footer footer">
 <div class="container-fluid text-center text-md-left mt-5">
   <div class="row">
     <div class="col-md-4 mx-auto mb-4">
       <img src="images/logo_nav.jpg" alt="">
       <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo.</p>
     </div>
     <div class="col-md-4 mx-auto mb-4">
       <h6 class="text-uppercase font-weight-bold">Links úteis</h6>
       <hr class="line-divider">
       <ul class="list-unstyled">
         <li class="my-2">Inicio</li>
         <li class="my-2">Sobre Nós</li>
         <li class="my-2">Serviços</li>
         <li class="my-2">Contacto</li>
         <li class="my-2">FAQ</li>
       </ul>
     </div>
     <div class="col-md-4 mx-auto mb-4">
       <h6 class="text-uppercase font-weight-bold">Contactos</h6>
       <hr class="line-divider">
       <ul class="list-unstyled">
         <li class="my-2"><i class="fas fa-phone mr-2"></i>+351-### ### ###</li>
         <li class="my-2"><i class="fas fa-envelope mr-2"></i>contact@COVIDSYM.pt</li>
         <li class="my-2"><i class="fas fa-map-marker-alt mr-2"></i>Endereço, Cidade Código-Postal, Portugal</li>
       </ul>
     </div>
   </div>
 </div>
  <div class="bg-secondary">
    <div class="container">
      <div class="row py-4 d-flex align-items-center">
        <div class="col-md-12 text-center">
          <a class="social-icon" href="#"><i class="fab fa-facebook-f text-white"></i></a>
          <a class="social-icon" href="#"><i class="fab fa-google-plus-g text-white"></i></a>
          <a class="social-icon" href="#"><i class="fab fa-linkedin-in text-white"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-copyright text-center py-1">
    <p>&copy; Copyright</p>
  </div>
</section>
</body>
</html>
