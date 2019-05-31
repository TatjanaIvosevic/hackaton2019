<?php
session_start();

include('db-config.php');
if(isset($_SESSION['username'])) {
    $user_check = $_SESSION['username'];

    $sql = "SELECT username from admin where username='$user_check'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    $login_session = $row['username'];
    if (!isset($login_session)) {
        mysqli_close($connection);
        header('Loaction: login.php');
    }
} else {
    header('Location: login.php');
}