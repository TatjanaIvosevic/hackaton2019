<?php
include_once('php/session.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">ADMIN PANEL</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class=" nav navbar-nav navbar-right">
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>

    <!-- Main component for a primary marketing message or call to action -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-3 col-sm-offset-2">
                <h1>Zakazani termini</h1>

                <?php
                $SQL = "SELECT * FROM booking";
                $result = mysqli_query($connection, $SQL);
                ?>

                <form action="php-assets/delete_device.php" method="post" >
                            <table class="table table-bordered table-striped table-responsive">
                                <tr>
                                    <th>Ime:</th>
                                    <th>Prezime:</th>
                                    <th>Broj telefona:</th>
                                    <th>Email:</th>
                                    <th>Datum:</th>
                                    <th>Vreme:</th>
                                    <th>Poruka:</th>
                                </tr>
                                <?php
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo "<tr>
                                    <td> " . $row['name'] . "</td>
                                    <td> " . $row['surname'] . "</td>
                                    <td> " . $row['phone_number'] . "</td>
                                    <td> " . $row['email'] . "</td>
                                    <td> " . $row['date'] . "</td>
                                    <td> " . $row['time'] . "</td>
                                    <td> " . $row['message'] . "</td>
                                    </tr>";
                                }
                                ?>
                            </table>
                </form>
            </div>
        </div>
    </div>

</div>