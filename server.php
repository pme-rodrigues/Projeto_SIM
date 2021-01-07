<?php
//server credentials
include('serv_credentials.php');
$errors_signin = array();
$errors_signup = array();

//User parameters
$user_ID; $fullname; $phone; $email; $status; $adress; $type; $fotosrc;

//Patient parameters
$firstname; $lastname; $cidade; $distrito; $birthdate; $gender; $nif; $seguro; $appointments;

//Lists
$doctors_list;
$appointments_list;

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
    $fotosrc = $fetch_credentials["foto"];

    if($type == 1){
  
      $query_active_appointments = "SELECT COUNT(id_consulta) FROM CONSULTA, USER, PACIENTE WHERE USER.id_user ='$user_ID'
                                  AND USER.id_user = PACIENTE.id_user 
                                    AND PACIENTE.id_paciente = CONSULTA.id_paciente
                                     AND CONSULTA.estado = '0'";
      $result = mysqli_query($connect, $query_active_appointments);
      $row = mysqli_fetch_row($result);
      $appointments = $row[0];
      $fetch_patient_id = "SELECT PACIENTE.id_paciente FROM PACIENTE WHERE PACIENTE.id_user = '$user_ID'";
      $result = mysqli_query($connect, $fetch_patient_id);
      $row = mysqli_fetch_row($result);
      $paciente_ID = $row[0];

      //Mark an appointment
      if($appointments == 0 AND isset($_GET['medic_id'])){
        $medico_ID = $_GET['medic_id'];

        $insert_appointment = "INSERT INTO CONSULTA (id_paciente, id_medico) VALUES( '$paciente_ID', '$medico_ID')";
        $result = mysqli_query($connect, $insert_appointment);
        header("location: index.php?page=profile&user_ID=".$user_ID."&success=true&op=mar");
      }

      if(isset($_GET['desmarcar'])){
        $query_desmarcar = "DELETE FROM CONSULTA WHERE id_paciente = '$paciente_ID'";
        $result = mysqli_query($connect, $query_desmarcar);
        $appointments = 0;
      }

      if($appointments == 0){
        $query_active_doctors = "SELECT USER.nome, USER.id_user, COUNT(id_consulta) AS Total FROM USER LEFT JOIN CONSULTA ON USER.id_user = CONSULTA.id_medico 
                                  AND CONSULTA.estado = '0' WHERE USER.tipo = '2' GROUP BY USER.nome, USER.id_user ORDER BY Total ASC";
        $result = mysqli_query($connect, $query_active_doctors);
        $doctors_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if(isset($_GET['desmarcar'])){header("location: index.php?page=profile&user_ID=".$user_ID."&success=true&op=des");}                
      } 
    }
    if($type == 2){

      $fetch_appointments = "SELECT USER.id_user, USER.nome, CONSULTA.data FROM USER, PACIENTE, CONSULTA WHERE USER.id_user = PACIENTE.id_user 
                              AND PACIENTE.id_paciente = CONSULTA.id_paciente AND CONSULTA.estado = '0' 
                                AND CONSULTA.id_medico ='$user_ID' ORDER BY CONSULTA.data ASC ";
      $result = mysqli_query($connect, $fetch_appointments);
      $appointments_list = mysqli_fetch_all($result, MYSQLI_ASSOC);                        
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
    $adress = $fetch_credentials["morada"];
    $fotosrc = $fetch_credentials["foto"];

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

//Delete Profile 
if(isset($_GET['page']) AND $_GET['page']=='editprofile'){
  if(isset($_GET['delete_id'])){
    
    $user_ID = $_GET['delete_id'];

    $delete_user_query = "DELETE FROM USER WHERE id_user=' $user_ID'";
    $result = mysqli_query($connect, $delete_user_query); 

    header("location: index.php?page=dashboard&success=true&op=del"); 
  }
}

//User profile update
if(isset($_POST['updateprofile'])){

  $fotofile = $_FILES['foto']['tmp_name'];
  $fotoname = $_FILES['foto']['name'];
  
  /* check input file_upload on error */
  if(is_uploaded_file($fotofile)){
    
    //Move photo
    $folder = "C:/wamp64/www/SIM_Projeto/images/";
    move_uploaded_file($fotofile, "$folder".$fotoname);
    
    //DB photo path
    $path = "images/";
    $fotosrc = $path.$fotoname;
    if($_SESSION['user_ID'] == $_POST['user_ID']) 
    $_SESSION['fotosrc'] = $fotosrc;
  }
  else{
    //If no photo was uploaded
    $fotosrc = $_POST['currentfoto']; 
  }

  $user_ID = $_POST['user_ID'];
  $type = $_POST['tipo'];
  $fullname = trim($_POST['firstname'])." ".trim($_POST['lastname']);
  $adress = trim($_POST['adress1']);
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  
  $update_user_query = "UPDATE USER SET email = '$email', nome = '$fullname', morada = '$adress', contacto ='$phone', foto = '$fotosrc' 
                                    WHERE id_user = '$user_ID'";
  $result = mysqli_query($connect, $update_user_query);

  //If Patient
  if($type == 1){

    $genero = (int)($_POST['gender']);
    $data = $_POST['birthdate'];
    $nif = $_POST['nif'];
    $seguro = $_POST['seguro'];
    $distrit = $_POST['district'];
    $city = $_POST['city'];

    $id_query = "SELECT PACIENTE.id_genero, PACIENTE.id_idade FROM PACIENTE WHERE PACIENTE.id_user = '$user_ID' ";
    $result = mysqli_query($connect, $id_query);
    $fetch_id = mysqli_fetch_assoc($result);

    $idade_id = $fetch_id['id_idade'];
    $genero_id = $fetch_id['id_genero'];

    mysqli_begin_transaction($connect);

    $update_patient_query = "UPDATE PACIENTE SET nif = '$nif', seguro_saude = '$seguro', distrito = '$distrit', cidade ='$city' 
                              WHERE id_user = '$user_ID'";
    if(! mysqli_query($connect, $update_patient_query)){echo("Error: ".mysqli_error($connect)." roolback: ". mysqli_rollback($connect));
      exit();
    }                          

    $update_birthdate_query = "UPDATE IDADE SET idade = '$data' WHERE id_idade = '$idade_id'";
    if(! mysqli_query($connect, $update_birthdate_query)){echo("Error: ".mysqli_error($connect)." roolback: ". mysqli_rollback($connect));
      exit();
    }

    $update_gender_query = "UPDATE GENERO SET genero = '$genero' WHERE id_genero = '$genero_id'";
    if(! mysqli_query($connect, $update_gender_query)){echo("Error: ".mysqli_error($connect)." roolback: ". mysqli_rollback($connect));
      exit();
    }

    mysqli_commit($connect);
  }

  header("location: index.php?page=editprofile&success=true&user_ID=$user_ID");
}

//User Registration
//Patient
if(isset($_POST['signUp_patient'])){
$fullname = trim($_POST['firstname'])." ".trim($_POST['lastname']);
$fotosrc = "images/profile.png";
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

    $insert_query = "INSERT INTO USER (email, password, nome, morada, contacto, tipo, foto) VALUES( '$email', '$password', '$fullname', '$adress', '$phone', '$type', '$fotosrc')";
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
    //check if the account was created by the system admin
    if(isset($_SESSION['authuser']) AND $_SESSION['type'] == 0 ){
      header('location: index.php?page=dashboard&success=true&op=reg');
    }
    else{
      $_SESSION['fotosrc'] = $fotosrc;
      $_SESSION['username'] = trim($_POST['firstname']);
      $_SESSION['authuser'] = TRUE;
      $_SESSION['user_ID'] = $user_id;
      $_SESSION['type'] = $type;
      header('location: index.php?page=homepage');
    }
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
  
  //Default user profile photo
  $fotosrc = "images/profile.png";

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
  
      $insert_query = "INSERT INTO USER (email, password, nome, morada, contacto, tipo, foto) VALUES( '$email', '$password', '$fullname', '$adress', '$phone', '$type', '$fotosrc')";
      mysqli_query($connect, $insert_query);
      header('location: index.php?page=dashboard&success=true&op=reg');
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
    $foto = $fetch_credentials["foto"];
    $_SESSION['username'] = $name[0];
    $_SESSION['authuser'] = TRUE;
    $_SESSION['user_ID'] = $user_id;
    $_SESSION['type'] = $type;
    $_SESSION['fotosrc'] = $foto;
    $path;
    switch($type){
      case 0:
        $path = 'dashboard';
        break;
      case 1:
        $path = 'homepage';
        break;
      case 2:
        $path = 'profile&user_ID='.$_SESSION['user_ID'];
        break; 
      case 3:
        $path = 'homepage';
    }
    header('location: index.php?page='.$path);
  }
  else array_push($errors_signin, "Email ou password incorretos");
}

//List Users
if($_GET['page'] =='dashboard'){

//LIST PATIENTS
$all_patient_query = "SELECT USER.id_user, USER.nome, PACIENTE.nif, IDADE.idade FROM USER, PACIENTE, IDADE WHERE USER.id_user = PACIENTE.id_user 
                            AND PACIENTE.id_idade = IDADE.id_idade";

$result = mysqli_query($connect ,$all_patient_query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

$all_pro_query = "SELECT USER.id_user, USER.nome, USER.email, USER.tipo FROM USER WHERE USER.tipo !='1'";
$result = mysqli_query($connect ,$all_pro_query);
$users_pro = mysqli_fetch_all($result, MYSQLI_ASSOC);
}


?>
