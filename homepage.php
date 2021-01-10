
<div class="jumbtron text-center">
  <div class="intro">
    <img src="images/logo.png" alt="">
  </div>
</div>

<section id="welcome">
  <div class="container">
    <div class="welcome text-center">
      <h1>Bem-vindo ao <span style="letter-spacing:3px">COVIDSYM</span></h1>
      <br>

      <?php if(!isset($_SESSION['authuser'])): ?>
      <a roll="button"  href="index.php?page=sign" class="btn check-up mx-3">
      <i class="fas fa-sign-in-alt mx-2"></i>Iniciar Sessão</a>
      <?php endif; ?>

      <?php if(isset($_SESSION['authuser']) AND $_SESSION['type'] == 1): ?>
      <a roll="button"  href="index.php?page=profile&user_ID=<?= $_SESSION['user_ID'] ?>" class="btn check-up mx-3">
        <i class="fas fa-user-md mx-2"></i>Marcar Consulta</a>
      <?php endif; ?>

      <?php if(isset($_SESSION['authuser']) AND $_SESSION['type'] != 1): ?>
      <a roll="button"  href="index.php?page=profile&user_ID=<?= $_SESSION['user_ID'] ?>" class="btn check-up mx-3">
      <i class="fas fa-user mx-2"></i>Área Pessoal</a>
      <?php endif; ?>

      <a roll="button"  href="mailto:contact@covidsym.com" class="btn read-more mx-3">
      <i class="fas fa-paper-plane mx-2"></i>Fale Connosco</a>
    </div>
  </div>
</section>

<section id="info">
  <div class="container-fluid">
    <div class="row info-background">
      <div class="col-md-5 info-article"></div>
      <div class="col-md-7 info-content">
        <h3>O <span style="letter-spacing:3px">COVIDSYM</span> - Como Proceder</h3>
        <ul>
          <li><i class="fas fa-clipboard-list mr-2"></i>Crie uma conta</li>
          <li><i class="fas fa-file-medical mr-2"></i>Marque a consulta com um profissional à sua escolha.</li>
          <li><i class="fas fa-user-md mr-2"></i>Feito! Agora é só aguardar pelo contacto de um dos nossos profissionais de saúde.</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section id="statistics">
 <div class="container-fluid">
  <div class="card-deck">
    <div class="card bg-white">
      <div class="card-body text-center">
      <p class="card-text widget"><i class="fas fa-users"></i></p>
      <p class="card-text">Número de Utentes do COVIDSYM</p>
      <h3 class="card-text text-primary"><?= $number_pacients; ?></h3>
      </div>
    </div>
    <div class="card bg-white">
      <div class="card-body text-center">
      <p class="card-text widget"><i class="fas fa-user-tie"></i></p>
      <p class="card-text">Número de Profissionais do COVIDSYM</p>
      <h3 class="card-text text-primary"><?= $number_pro; ?></h3>
      </div>
    </div>
    <div class="card bg-white">
      <div class="card-body text-center">
      <p class="card-text widget"><i class="fas fa-clipboard-list"></i></i></p>
      <p class="card-text">Número de Consultas Realizadas </p>
      <h3 class="card-text text-primary"><?= $number_appoit; ?></h3>
      </div>
    </div>
  </div>
 </div>
</section>

<section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch">
            <a href="#about" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-xl-7 col-lg-6 d-flex flex-column align-items-stretch text-justify justify-content-center py-5 px-lg-5">
            <h3>Sobre nós</h3>
            <p>O COVIDSYM é uma plataforma de apoio à decisão, desenhada por três alunos de Engenharia Biomédica da FCT-UNL e destina-se a auxiliar os profissionais de saúde no processo de triagem dos casos com maior risco de infeção pela COVID-19. A nossa ambição é dinamizar um ambiente mais rápido, seguro e eficiente nos hospitais, onde um paciente seja orientado e, testado caso necessário, da forma mais célere e assertiva possível. Deste modo consideramos que a simbiose entre profissionais altamente capacitados e o nosso sistema levará qualquer unidade hospitalar ao seu expoente máximo de eficácia, prevenindo-se assim a perda de muitas vidas.</p>
            <br>
          </div>
        </div>
      </div>
</section>

<section class="team">
  <div class="container">
    <div class="col-12 d-flex flex-column align-items-stretch justify-content-center">
      <div class="text-center"> <h3>A Equipa</h3> <img class="rounded" src="images/Apresentação3.png" alt="" width="90%"> </div>
    </div>
  </div>
</section>