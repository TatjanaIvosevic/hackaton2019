<?php
include_once('db-config.php');
session_start();

$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

if (!empty($username) && !empty($password)){

    //gets the password if the user is present
    $sql = "SELECT * FROM admin WHERE username = '$username';";
    $query = mysqli_query ($connection,$sql);
    $result = mysqli_fetch_assoc ($query);
    //verifies if the passwords match
    $hashedPassword = password_verify($password,$result['password']);
    //if not redirects with an error
    if(!$hashedPassword){
        header("Location: ../login.php?login=error");
        exit();
        //if they match starts the session
    }elseif ($hashedPassword){
        $_SESSION['username'] = $username;
        header("Location: ../appointments.php");
        exit();
    }

} else {
    header('Location: ../login.php');
}