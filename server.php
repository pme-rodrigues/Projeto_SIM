<?php
//server credentials
include('serv_credentials.php');
$errors_signin = array();
$errors_signup = array();

//User parameters
$user_ID; $fullname; $phone; $email; $status; $adress;

//Patient parameters
$firstname; $lastname; $cidade; $distrito; $birthdate; $gender; $nif; $seguro; $foto; $consultas;

//connect to DataBase
$connect = mysqli_connect($servername, $username, $password, $database)
or die('Error connecting to the server: '. mysqli_error($connect));

//Load User Profile Info
if(isset($_GET['page']) AND $_GET['page']=='profile'){
  if(isset($_GET['user_ID'])){
    
    //fetch profile info
    $statuslist = array(
      0  => "Administrador",
      1  => "Utente",
      2  => "Médico",
      3  => "Investigador",
    );
    
    $user_ID = $_GET['user_ID'];
    
    $query_credentials = "SELECT * FROM USER WHERE id_user ='$user_ID'";
    $result = mysqli_query($connect, $query_credentials);
    $fetch_credentials = mysqli_fetch_assoc($result);

    $fullname = $fetch_credentials["nome"];
    $adress = $fetch_credentials["morada"];
    $phone = $fetch_credentials["contacto"];
    $email = $fetch_credentials["email"];
    $type = $fetch_credentials["tipo"];
    $status = $statuslist[$type];

    if( $type == 1){
      $query_appointments = "SELECT COUNT(id_consulta) FROM CONSULTA WHERE USER.id_user ='$user_ID' 
                            AND USER.id_user = PACIENTE.id_user 
                              AND PACIENTE.id_paciente = CONSULTA.id_paciente";
      $result = mysqli_query($connect, $query_credentials);
      $row = mysqli_num_rows($result);
      if($row[0] == null) $consultas = 0;
      else $consultas = $row[0];
    }                      
  }
}

//Edit Profile Info
if(isset($_GET['page']) AND $_GET['page']=='editprofile'){
  if(isset($_GET['user_ID'])){
    
    //fetch user profile info
    $user_ID = $_GET['user_ID'];

    $query_user_credentials = "SELECT * FROM USER WHERE id_user ='$user_ID'";
    $result = mysqli_query($connect, $query_user_credentials);
    $fetch_credentials = mysqli_fetch_assoc($result);
    
    //Divide name into first and lastname
    $fullname = explode(" ", $fetch_credentials["nome"]);
    $firstname = $fullname[0];
    $lastname = $fullname[1]; 
    
    $phone = $fetch_credentials["contacto"]; 
    $email = $fetch_credentials["email"];
    $type = $fetch_credentials["tipo"]; 
    $adress = $fetch_credentials["morada"];; 

    if($type == 1){
      $query_patient_credentials = "SELECT * FROM PACIENTE WHERE PACIENTE.id_user ='$user_ID'"; 
      $result = mysqli_query($connect, $query_patient_credentials);
      $fetch_credentials = mysqli_fetch_assoc($result);
      $cidade = $fetch_credentials['cidade']; 
      $distrito = $fetch_credentials['distrito']; 
      $nif = $fetch_credentials['nif'];  
      $seguro = $fetch_credentials['seguro_saude'];
      $id_idade = $fetch_credentials['id_idade'];
      $id_genero = $fetch_credentials['id_genero'];  
      
      $query_patient_birthdate = "SELECT IDADE.idade FROM IDADE WHERE id_idade = '$id_idade'";
      $result = mysqli_query($connect, $query_patient_birthdate);
      $row = mysqli_fetch_row($result);
      $birthdate = $row[0]; 
      
      $query_patient_gender = "SELECT GENERO.genero FROM GENERO WHERE id_genero = '$id_genero'";
      $result = mysqli_query($connect, $query_patient_gender);
      $row = mysqli_fetch_row($result);
      $gender = $row[0]; 
    }
  }
}



//User Registration
//Patient
if(isset($_POST['signUp_patient'])){
$fullname = trim($_POST['firstname'])." ".trim($_POST['lastname']);
$genero = (int)($_POST['gender']);
$data = $_POST['birthdate'];
$nif = $_POST['nif'];
$seguro = $_POST['seguro'];
$adress = trim($_POST['adress1']);
$distrit = $_POST['district'];
$city = $_POST['city'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pass = $_POST['password1'];
$pass_conf = $_POST['password2'];
$type = 1;

  //Verify password confirmation
  if($pass != $pass_conf){
  array_push($errors_signup, "Passwords inseridas são diferentes");
  }

  $check_user_query = "SELECT * FROM USER WHERE email ='$email'";
  $result = mysqli_query($connect, $check_user_query);
  $check_user_res = mysqli_fetch_assoc($result); //é mais prático que o fetch_row()

  if($check_user_res){
    if($check_user_res['EMAIL'] == $email) array_push($errors_signup, "O endereço já se encontra registado");
  }
  //If 0 errors occured, insert into DB
  if(count($errors_signup) == 0) {
     
    mysqli_begin_transaction($connect);
    $password = md5($pass);

    $insert_query = "INSERT INTO USER (email, password, nome, morada, contacto, tipo) VALUES( '$email', '$password', '$fullname', '$adress', '$phone', '$type')";
    if(! mysqli_query($connect, $insert_query)){echo("Error: ".mysqli_error($connect)." roolback: ". mysqli_rollback($connect));
      exit();
    }

    $user_id  = mysqli_insert_id($connect);

    $insert_query = "INSERT INTO GENERO (genero) VALUES( '$genero')";
    if(! mysqli_query($connect, $insert_query)){echo("Error: ".mysqli_error($connect)." roolback: ". mysqli_rollback($connect));
      exit();
    }

    $genero_id  = mysqli_insert_id($connect);

    $insert_query = "INSERT INTO IDADE (idade) VALUES( '$data')";
    if(! mysqli_query($connect, $insert_query)){echo("Error: ".mysqli_error($connect)." roolback: ". mysqli_rollback($connect));
      exit();
    }

    $idade_id  = mysqli_insert_id($connect);


    $insert_query = "INSERT INTO PACIENTE (id_user, cidade, distrito, id_idade, id_genero, nif, seguro_saude) VALUES( '$user_id', '$city', '$distrit', '$idade_id', '$genero_id', '$nif', '$seguro')";
    if(! mysqli_query($connect, $insert_query)){echo("Error: ".mysqli_error($connect)." roolback: ". mysqli_rollback($connect));
      exit();
    }

    mysqli_commit($connect);

    $_SESSION['username'] = trim($_POST['firstname']);
    $_SESSION['authuser'] = TRUE;
    $_SESSION['user_ID'] = $user_id;
    $_SESSION['type'] = $type;
    header('location: index.php?page=homepage');
  }
}

//Medic, Researcher and Admin
if(isset($_POST['signUp_pro'])){
  $fullname = trim($_POST['firstname'])." ".trim($_POST['lastname']);
  $adress = trim($_POST['adress1']);
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $pass = $_POST['password1'];
  $pass_conf = $_POST['password2'];
  $type = (int)$_POST['type'];;
  
    //Verify password confirmation
    if($pass != $pass_conf){
    array_push($errors_signup, "Passwords inseridas são diferentes");
    }
  
    $check_user_query = "SELECT * FROM USER WHERE email ='$email'";
    $result = mysqli_query($connect, $check_user_query);
    $check_user_res = mysqli_fetch_assoc($result);
  
    if($check_user_res){
      if($check_user_res['EMAIL'] == $email) array_push($errors_signup, "O endereço já se encontra registado");
    }
    //If 0 errors occured, insert into DB
    if(count($errors_signup) == 0) {
      
      $password = md5($pass);
  
      $insert_query = "INSERT INTO USER (email, password, nome, morada, contacto, tipo) VALUES( '$email', '$password', '$fullname', '$adress', '$phone', '$type')";
      mysqli_query($connect, $insert_query);
      header('location: index.php?page=sign&success=true');
    }
  }

//User Login
if(isset($_POST['signIn'])){

  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $check_login_query = "SELECT * FROM USER WHERE (email = '$email' AND password= '$password')";
  $result = mysqli_query($connect, $check_login_query);
  $check_login_res = mysqli_num_rows($result);
  if($check_login_res == 1){
    $fetch_credentials = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $name = explode(" ", $fetch_credentials["nome"]);
    $user_id = $fetch_credentials["id_user"];
    $type = $fetch_credentials["tipo"];
    $_SESSION['username'] = $name[0];
    $_SESSION['authuser'] = TRUE;
    $_SESSION['user_ID'] = $user_id;
    $_SESSION['type'] = $type;
    header('location: index.php?page=homepage');
  }
  else array_push($errors_signin, "Email ou password incorretos");
}

?>
