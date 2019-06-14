<?php
include 'db-config.php';

$id_booking=$_GET["id"];
mysqli_query($connection,"delete from booking where id_booking=$id_booking");
?>

<script type="text/javascript">
    window.location="../appointments.php";
</script>
