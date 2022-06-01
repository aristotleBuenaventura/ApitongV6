<?php
include "connect_reservation.php";
$id=$_GET["id"];
mysqli_query($link, "delete from reservation where id=$id");
?>

<script type="text/javascript">
window.location="booklogs.php";
</script>