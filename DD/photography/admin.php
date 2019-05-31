<?php
if(isset($_POST['submit'])){
    require "./php/db-config.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = password_hash ($password,PASSWORD_DEFAULT);
    $sql = "INSERT INTO admin(username,password) VALUES ('$username','$hashedPassword');";
    $query = mysqli_query ($connection,$sql);
}
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-2" >
                <h1> Admin page</h1>
            </div>
        </div>
    </div>

    <!--<div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><a href="appointments.php">Zakazani termini</a></li>
        </ul>
    </div>-->

<form action="admin.php" method="post">
<label>Username</label>
<input type="text" name="username">
<label>Password</label>
<input type="text" name="password">
<button type="submit" name="submit">SEND</button>
</form>
