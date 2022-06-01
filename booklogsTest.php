<!DOCTYPE html>
<?php
include "connect_reservation.php";
?>

<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<title>Book Logs</title>

<meta charset ="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="main.css">

</head>

<body>

<!-- Navbar  -->  
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top ">
  <div class="container">
    <img src ="apitonglogo.png" class="img-responsive logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse container" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item nav-a">
          <a class="nav-link" href="../HomePage/index.html">Home</a>
      </li>

      <li class="nav-item nav-a">
          <a class="nav-link" href="../Packages/Packages.html">Packages</a>
      </li>

      <li class="nav-item nav-a">
        <a class="nav-link" href="../Inquiry/Inquiry.html">Inquiry</a>
    </li>

      <li class="nav-item nav-a">
          <a class="nav-link" href="../About/About.html">About Us</a>
      </li>

      <li class="nav-item nav-a">
        <a class="nav-link" href="../Profile/profile.html">User Profile</a>
      </li>

      <li class="nav-item nav-a">
        <a class="nav-link" href="../Login/login.html">Log in</a>
      </li>


      <!-- <ul class="nav navbar-nav flex-row justify-content-center flex-nowrap">
        <div class="input-group mr-0"> 
          <a href="../Logout.html"><button name="submit" class="btn">Logout</button></a>
        </div>
      </ul> -->
    </div>
  </div>
</nav>

<h1 class="h2 text-center addContent"> Book Logs </h1>
<div class="col-lg-12 addContent ">
 <table class="table table-bordered">
    <thead>
      <tr>
	    <th>Id</th>
        <th>Event</th>
        <th>Date</th>
        <th>Package</th>
		<th>Guests</th>
		<th>Price Per Head</th>
		<th>Total</th>
		<th>Cancel Reservation</th>

      </tr>
    </thead>
    <tbody>
    
      <?php
	  $res=mysqli_query($link,"select * from reservation where email = 'aris'");
	  while($row=mysqli_fetch_array($res))
	  {
          echo '<div class="addContent">';
		  echo "<tr>";
		  echo "<td>"; echo $row["id"]; echo"</td>";
		  echo "<td>"; echo $row["event"]; echo"</td>";
		  echo "<td>"; echo $row["date"]; echo"</td>";
		  echo "<td>"; echo $row["packages"]; echo"</td>";
		  echo "<td>"; echo $row["guests"]; echo"</td>";
		  echo "<td>"; echo $row["pHead"]; echo"</td>";
		  echo "<td>"; echo $row["price"]; echo"</td>";
		  echo "<td>"; ?> <a href="delete_reservation.php?id=<?php echo $row["id"]; ?> "> <button type="button" class="btn btn-danger">Cancel</button></a> <?php echo"</td>";

		  echo "</tr>";
          echo"</div>";
	  }
      
	  ?>
      
      
    </tbody>
  </table>
  
</div>

<?php

if(isset($_POST["delete"]))
{
	mysqli_query($link, "delete from reservation where firstName='$_POST[firstName]'")or die(mysqli_error($link));
	?>
	<script type="text/javascript">
	window.location.href=window.location.href;
	</script>
	<?php

}

		
?>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>
</html>