<?php


$link = mysqli_connect("localhost", "root", "", "testdb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


if(isset($_GET["id"])){
    //echo $_GET["id"];
    // Prepare a select statement
    $sql = "SELECT * FROM customers WHERE id=?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $id);
        
        // Set parameters
        $id = $_GET["id"];
        //echo $id;
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $fname = $row['firstname'];
                    $lname = $row['lastname'];
                    $email = $row['email'];
                    $address = $row['address'];
                    $phone = $row['phone'];
                }
            } else{
                echo "<p>Profile Not Found!</p>";
                //$profile=false;
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP Live MySQL Database Search</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>

.profile-body{
        margin:0;
        width:100%;
        margin-left:30%;
        margin-right:20%;
    }
    img{
        width:60px;
        height:190px;
    }

</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 profile-body mt-5">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="images/avatar.png" alt="user-image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $fname;?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Firstname: <?php echo $fname;?></li>
                        <li class="list-group-item">Lastname: <?php echo $lname;?></li>
                        <li class="list-group-item">Email: <?php echo $email;?></li>
                        <li class="list-group-item">Address: <?php echo $address;?></li>
                        <li class="list-group-item">Phone: <?php echo $phone;?></li>
                    </ul>
                
                </div>
            </div>
        </div>
    </div>
</body>
</html>