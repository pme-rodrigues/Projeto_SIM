<!DOCTYPE html>

<?php 
  session_start();
  include('server.php');
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
            <a class="nav-link" target="_blank" href="https://covid19.min-saude.pt/"> Notícias</a>
          </li>

          <?php if(isset($_SESSION['authuser']) AND $_SESSION['authuser']==TRUE): ?>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
            <img class="avatar" src="<?=  $_SESSION['fotosrc'] ?>" alt=""> <?= $_SESSION['username'] ?> <b class="caret"> </b>
            </a>
            <div class="dropdown-menu">
            <a href="index.php?page=profile&user_ID=<?= $_SESSION['user_ID'] ?>" class="dropdown-item"><i class="fas fa-user-circle mr-2"></i>Perfil </a>
            <a href="index.php?page=editprofile&user_ID=<?= $_SESSION['user_ID'] ?>" class="dropdown-item"><i class="fas fa-user-cog mr-2"></i>Definições </a>
            <?php if($_SESSION['type'] == 0): ?>
            <a href="index.php?page=dashboard" class="dropdown-item"><i class="fas fa-tools mr-2"></i>Administrador</a>
            <?php endif; ?>
            <?php if($_SESSION['type'] == 3): ?>
            <a href="index.php?page=researcher" class="dropdown-item"><i class="fas fa-microscope mr-2"></i>Investigador</a>
            <?php endif; ?>
            <div class="dropdown-divider"></div>
            <a href="index.php?page=signout" class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i>Sair </a>
            </div>
            </li>
          <?php endif; ?>

          <?php if(!isset($_SESSION['authuser'])): ?>
            <li class="nav-item">
              <a href="index.php?page=sign"><button>Login</button></a>
            </li>
          <?php endif; ?>
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

    case 'profile';
    include('profile.php');
    break;
    
    case 'editprofile';
    include('editprofile.php');
    break;

    case 'dashboard';
    include('dashboard.php');
    break;
    
    case 'formcovid':
    include('formcovid.php');
    break;
    
    case 'report':
    include('report.php');
    break;

    case 'researcher':
    include('researcher.php');
    break;

    case 'research_data':
    include('research_data.php');
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
     <div class="col-md-4 mx-auto mb-4 text-center">
       <img class="mr-3 img1" src="images/logo_nav.jpg" alt="">
       <a class="mx-3" href="https://www.fct.unl.pt/"><img class="img2"  src="images/fct_logo.gif" alt=""></a>
       <a class="ml-3" href="https://www.unl.pt/"><img class="img2" src="images/nova_logo.png" alt=""></a>
     
      </div>
     <div class="col-md-4 mx-auto mb-4">
       <h6 class="text-uppercase font-weight-bold">Links úteis</h6>
       <hr class="line-divider">
       <ul class="list-unstyled">
         <li class="my-2"><a class="text-decoration-none" href="index.php?page=homepage"><i class="fas fa-home mr-2"></i>Início </a></li>
         <li class="my-2"><a class="text-decoration-none" href="index.php?page=homepage#about"><i class="fas fa-user-friends mr-2"></i>Sobre Nós</a></li>
         <li class="my-2"><a class="text-decoration-none" href="https://covid19.min-saude.pt/"><i class="far fa-newspaper mr-2"></i>Notícias </a></li>
       </ul>
     </div>
     <div class="col-md-4 mx-auto mb-4">
       <h6 class="text-uppercase font-weight-bold">Contactos</h6>
       <hr class="line-divider">
       <ul class="list-unstyled">
         <li class="my-2"><i class="fas fa-phone mr-2"></i>+351-### ### ###</li>
         <li class="my-2"><i class="fas fa-envelope mr-2"></i>contact@covidsym.pt</li>
         <li class="my-2"><i class="fas fa-map-marker-alt mr-2"></i>Largo da Torre, 2825-149 Caparica, Portugal</li>
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
    <i><p>&copy; 2020 André Escoval, Marta Ferreira e Pedro Rodrigues todos os Direitos Reservados</p></i>
  </div>
</section>
</body>
</html>
