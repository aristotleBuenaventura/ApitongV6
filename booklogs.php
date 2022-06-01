<?php 
  include "connectionRegistration.php";
  include "connect_reservation.php";
  session_start();
  if (isset($_SESSION['email'])){
    $email = $_SESSION['email'];
  } else {
    $email = "";
  }
  $result = mysqli_query($conn,"SELECT * FROM registration WHERE email='$email'");
  $resultCheck = mysqli_num_rows($result);

  if($resultCheck > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $userDB = $row['username'];
      $emailDB = $row['email'];
      $firstnameDB = $row['firstname'];
      $lastnameDB = $row['lastname'];
    }
  }
?>
<!DOCTYPE html>
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
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"> -->

<title>Inquiry</title>

<meta charset ="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="mainAbout.css">

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
          <a class="nav-link" href="index.php">Home</a>
      </li>

      <li class="nav-item nav-a">
          <a class="nav-link" href="Packages.php">Packages</a>
      </li>

      <li class="nav-item nav-a">
        <a class="nav-link" href="Inquiry.php">Inquiry</a>
    </li>

      <li class="nav-item nav-a">
          <a class="nav-link" href="About.php">About Us</a>
      </li>

      <?php if(isset($emailDB))
      {
      ?>
      <li class="nav-item nav-a">
        <a class="nav-link" href="profile.php">User Profile</a>
      </li>
        <li class="nav-item nav-a">
          <a class="nav-link" href="Logout.php">Log out</a>
        </li>
      <?php }else{ ?>
        

      <li class="nav-item nav-a">
        <a class="nav-link" href="loginBackEnd.php">Log in</a>
      </li>
      <?php } ?>
      
    </div>
  </div>
</nav>

<div class="container bg-light mt-5 mb-5">

<h1 class="h2 text-center addContent"> Book Logs </h1>

<div class="col-lg-12 addContent ">
<p>Hi! 
  <?php
   echo $firstnameDB
  ?>

  <?php
   echo $lastnameDB
  ?>
</p>
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
	  $res=mysqli_query($link,"select * from reservation where email = '$emailDB'");
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
</div>




<!-- Footer  -->
<div class="global">
  <div class="container">
    <div class="row ">
      <div class="col col-12 col-md-6 col-xl-6 mt-5">
        <h6>Legal</h6>
        <ul class="nav flex-column">
          <li><a href="../TermsConditions/TermsCondition.html">Terms & Conditions</a></li>
          <li><a href="../PrivacyPolicy/PrivacyPolicy.html">Privacy Policy</a></li>
          <li><a href="../Forum/Forum.html">Forums</a></li>
        </ul>
      </div>
      <div class="col col-12 col-md-6 col-xl-6 mt-5 mb-5">
        <h6>Support</h6>
        <ul class="nav flex-column">
          <li>Phone Number: +639178883334</li>
          <li>Landline: 394-7896<li>
          <li>Email: apitongscatering@business.com</li>
        </ul>
      </div>
      <div class="social">
        <div class="mt-5 mb-4">
            <a href="https://www.facebook.com/Dirtysoda11"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/RAVEN75754452?s=09"><i class="fa fa-twitter"></i></a>
            <a href="https://www.instagram.com/algeralddelapaz/"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-snapchat-ghost"></i></a>
        </div>
      </div>
      <p class="copyright mb-5"> &copy; Apitongs Food & Catering Services. All Rights Reserved</p>
    </div>
</div>
</div>
      </div>



<!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" 
crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.6.0.js"
integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
crossorigin="anonymous"></script>

<!-- <script src="mainAbout.js"></script> -->

</body>

</html>