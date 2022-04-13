
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

	<div class="container">
        <h2 class="text-center pt-4" style="color : #6c757d;">Transaction</h2>
            <?php
                $sid=$_GET['Account_Number'];
                $sql = "SELECT * FROM  customers where Account_Number=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-hover table-sm table-striped table-condensed table-bordered table-primary">
                <tr style="color : dark;">
                    
                     <th scope="col" class=" py-2">Account Number</th>
                        <th scope="col" class=" py-2">Name</th>
                        <th scope="col" class=" py-2">Current Balance</th>
                        <th scope="col" class=" py-2">Gender</th>
                        <th scope="col" class=" py-2">Email</th>
                </tr>
                <tr style="color : primary;">
                    <td class="py-2"><?php echo $rows['Account_Number'] ?></td>
                    <td class="py-2"><?php echo $rows['Name'] ?></td>
                    <td class="py-2"><?php echo $rows['Email'] ?></td>
                    <td class="py-2"><?php echo $rows['Gender'] ?></td>
                    <td class="py-2">Rs. <?php echo $rows['Current_Balance'] ?></td>
                </tr>
            </table>
        </div>
        <hr><br>

        
        
        <div class="container-fluid">
        <div class="row">
        <div class="col-2">
        <img src="./images/image7.png" alt="..." height="140">
     </div>
            <div class="col-4">
            <div class="card ">
             <div class="card-body bg-dark text-white">
        <label style="color : white"><b>Transfer To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Select Account</option>
            <?php
                include 'connection.php';
                $sid=$_GET['Account_Number'];
                $sql = "SELECT * FROM customers where Account_Number!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['Account_Number'];?>" >
                
                    <?php echo $rows['Name'] ;?> (Balance: 
                    <?php echo $rows['Current_Balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>

            <div>
        </select>
            </div>
            </div>
        </div>


        <div class="col-4">
        <div class="card ">
             <div class="card-body bg-dark text-white">
            <label style="color : white"><b>Amount:</b></label>
            <input type="number" class="form-control" name="amount" required> 
        </div>
        
        </div>
        <div class="col-2"> </div>
              
            <br><br>
             
                <div class="text-center " >
            <button class="btn  ml-2" name="submit" type="submit" id="myBtn" >Transfer Amount</button>
           
            </div>
        </form>
    </div>
            </div>
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

<?php

if(isset($_POST['submit']))
{
    $from = $_GET['Account_Number'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where Account_Number=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customers where Account_Number=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['Current_Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Sorry, Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['Current_Balance'] - $amount;
                $sql = "UPDATE customers set Current_Balance=$newbalance where Account_Number=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['Current_Balance'] + $amount;
                $sql = "UPDATE customers set Current_Balance=$newbalance where Account_Number=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['Name'];
                $receiver = $sql2['Name'];
                $sql = "INSERT INTO transaction
                        VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Completed');
                                     window.location='transfer.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>