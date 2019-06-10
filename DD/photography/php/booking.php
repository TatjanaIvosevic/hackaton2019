<?php
$name = $_POST['name'];
$surname = $_POST['surname'];
$number = $_POST['number'];
$email = $_POST['email'];
$date = $_POST['date'];
$time = date('H:i:s',strtotime($_POST['time']));
$subject = $_POST['subject'];
//var_dump($name,$surname,$number,$email,$date,$time,$subject);

if(!empty($name) || !empty($surname) || !empty($number) || !empty($email) || !empty($date) || !empty($time) || !empty($subject)){
    $host = "localhost";
    $dbUsername = "root";
    $dbPasword = "";
    $dbName = "ddphotography";

    $conn =  mysqli_connect($host, $dbUsername, $dbPasword, $dbName);

    if(mysqli_connect_error()){
        die('Connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    } else{
        $INSERT = "INSERT INTO booking (name, surname, phone_number, email, date, time, message) values('$name','$surname','$number','$email','$date','$time','$subject')";
        $query = mysqli_query($conn,$INSERT);
        if($query) {
            echo "Uspesno uneto u bazu";
            die;
        }
        echo "Doslo je do greske...";die;
    }
} else {
    echo "Sva polja su obavezna. Molim Vas, popunite ih!";die;
}