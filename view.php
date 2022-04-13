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
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-2"></div>
       <div class="col-lg-8">
            
            <table class="table ">
                <thead>
                       <tr>
                      
                        <th><h4> Account Number </h4></th>
                     </tr>
                </thead>
                <tbody>
                <?php
                      
                      $query = "SELECT Account_Number FROM customers";
                      $result = mysqli_query($conn, $query);
                      while($row=mysqli_fetch_array($result))
                      {
                          $id= $row['Account_Number'];
                         
                 ?>
                 <tr>
                    <td><?=$id; ?></td>
                    
                      <td>
                            <a href="view1.php?view=<?= $id; ?>" class="btn btn-primary">View</a>
                  </tr>
                <?php }; ?>
                      </tbody>
                </table> 
            
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
