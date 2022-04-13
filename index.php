<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mybankingsystem";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if(!$conn)
	{
		die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <script src="https://kit.fontawesome.com/44497aa09b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    
    <title> SPARKS BANKING SYSTEM</title>
</head>
<body>
    

<nav class="navbar navbar-expand-md  bg-dark">
      <a class="navbar-brand" href="index.php">
      <img src="image1.png" alt="Logo" width="90" > <b>SPARKS BANK </b></a>
     
      <div class="collapse navbar-collapse bg-dark" >
            <ul class="navbar-nav ml-auto">
              <li class="nav-item text-light">
                <a class="nav-link text-light" href="index.php" ><i class="fas fa-home text-light"></i><b>Home</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="view.php" ><i class="fas fa-eye"></i><b> View Customers </b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="transfer.php" ><i class="fas fa-comment-dollar"></i><b> Transfer Money </b></a>
              </li>
              
          </div>
</nav>
<div class="row m-o p-0">
    <div class="col-lg-12 m-0 p-0">
       <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-interval="500">
     <div class="carousel-inner">
       <div class="carousel-item active">
         <img src="image2.jpg" class="d-block w-100" alt="..." height="500">
      </div>
    <div class="carousel-item">
      <img src="image3.jpeg" class="d-block w-100" alt="..." height="500">
    </div>
    <div class="carousel-item">
      <img src="image4.png" class="d-block w-100" alt="..." height="500">
    </div>
  </div>
</div>
</div>
</div>

<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-4">
        <div class="card mt-5">
            <div class="card-header text-center bg-primary text-dark"></div>
            <div class="card-body bg-grey">
            <a class="navbar-brand text-light" href="view.php">
            <img src="image5.png" alt="..." height="200"> <button  style="background-color : #2785C4;">VIEW ALL CUSTOMERS </button></a>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
    <div class="card mt-5">
            <div class="card-header text-center bg-primary text-dark"></div>
            <div class="card-body bg-grey">
            <a class="navbar-brand" href="transfer.php">
            <img src="image6.png" alt="..." height="200"> <button style="background-color : #2785C4;">TRANSFER MONEY </button></a>
            </div>
        </div>
    </div>
    <div class="col-lg-2"></div>
    </div>
</div>
</body>
<div class="row m-0 p-0 text-center bg-light">
   <div class="col-lg-3"></div>
   <div class="col-lg-6">
       <p class="text-center mt-5 text-dark">Copyright &copy;2022, All rights are reserved by site admin.</p>
   </div>
   <div class="col-lg-3"></div>
</div>
</div>
</html>