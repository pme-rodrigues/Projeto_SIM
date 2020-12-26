<?php
//server credentials
include('serv_credentials.php');

$fullname = '';
$email = '';
$errors_signin = array();
$errors_signup = array();

//connect to DataBase
$connect = mysqli_connect($servername, $username, $password, $database)
or die('Error connecting to the server: '. mysqli_error($connect));


//User Registration
//Patient

if(isset($_POST['signUp'])){

$fullname = trim($_POST['firstname'])." ".trim($_POST['lastname']);
$email = $_POST['email'];
$pass = $_POST['password1'];
$pass_conf = $_POST['password2'];


  //Verify password confirmation
  if($pass != $pass_conf){
  array_push($errors_signup, "Passwords inseridas são diferentes");
  }

  $check_user_query = "SELECT * FROM USERS WHERE email ='$email'";
  $result = mysqli_query($connect, $check_user_query);
  $check_user_res = mysqli_fetch_assoc($result); //é mais prático que o fetch_row()

  if($check_user_res){
    if($check_user_res['EMAIL'] == $email) array_push($errors_signup, "O endereço já se encontra registado");
  }
  //If 0 errors occured, insert into DB
  if(count($errors_signup) == 0) {
    $password = md5($pass);
    $insert_query = "INSERT INTO USERS (email, password, name) VALUES( '$email', '$password', '$fullname')";
    mysqli_query($connect, $insert_query);
    $_SESSION['user'] = trim($_POST['firstname']);
    $_SESSION['authuser'] = TRUE;
    header('location: index.php?page=homepage');
  }
}

//Professional

if(isset($_POST['signUp-pro'])){

  $fullname = trim($_POST['name']);
  $email = $_POST['email'];
  $pass = $_POST['password1'];
  $pass_conf = $_POST['password2'];
  
    //Verify password confirmation
    if($pass != $pass_conf){
    array_push($errors_signup, "Passwords inseridas são diferentes");
    }
  
    $check_user_query = "SELECT * FROM USERS WHERE email ='$email'";
    $result = mysqli_query($connect, $check_user_query);
    $check_user_res = mysqli_fetch_assoc($result); //é mais prático que o fetch_row()
  
    if($check_user_res){
      if($check_user_res['EMAIL'] == $email) array_push($errors_signup, "O endereço já se encontra registado");
    }
    //If 0 errors occured, insert into DB
    if(count($errors_signup) == 0) {
      $password = md5($pass);
      $insert_query = "INSERT INTO USERS (email, password, name) VALUES( '$email', '$password', '$fullname')";
      mysqli_query($connect, $insert_query);
      $name = explode(" ", $fullname);
      $_SESSION['user'] = $name[0];
      $_SESSION['authuser'] = TRUE;
      header('location: index.php?page=homepage');
    }
  }



//User Login
if(isset($_POST['signIn'])){

  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $check_login_query = "SELECT * FROM USERS WHERE (email = '$email' AND password= '$password')";
  $result = mysqli_query($connect, $check_login_query);
  $check_login_res = mysqli_num_rows($result);
  if($check_login_res == 1){
    $fetch_user_name = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $name = explode(" ", $fetch_user_name["NAME"]);
    $_SESSION['user'] = $name[0];
    $_SESSION['authuser'] = TRUE;
    header('location: index.php?page=homepage');
  }
  else array_push($errors_signin, "Email ou password incorretos");
}

?>
