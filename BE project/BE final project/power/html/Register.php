<?php
	// session_start();
  if(isset($_POST['register'])){
    include('connection.php');
    $query = "insert into user values(null,'$_POST[name]','$_POST[address]')";
  	$query_run = mysqli_query($connection,$query);
    if($query_run){
      echo "<script type='text/javascript'>
      	alert('User registered successfully....');
        window.location.href = 'login.php';  
      </script>";
    }
    else{
      echo "<script type='text/javascript'>
      	alert('Error...Plz try again.');
      	window.location.href = 'Register.php';
      </script>";
    }
  }
?>
<html>
    <head>
        <title>Register Page</title>
        <!-- Bootsrap Files -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"></link>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<!-- CSS Files -->
		<link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <!-- Header code starts here -->
    <!--<div class="row" id="header">
      <div class="col-md-4" >
        <h4 style="padding-left:15px;font-family:'Comic Sans MS';">Book online movie ticket</h4>
      </div>
      <div class="col-md-7" style="text-align: right;">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="movies.php">Movies</a></li>
          <li><a href="register.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </div>-->
    </div>
    <!-- Header code ends here -->

        <div class="row">
            <div class="col-md-4" id="login_form">
            <center><h3><u>Registration Form</u></h3></center>
            <form action="" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input class="form-control" type="text" name="name" placeholder="Enter your Name" pattern="[A-Za-z]+" title="Name contain alphabets" required>
                </div>
                <label for="address">Address:</label>
                <input class="form-control" type="text" name="address" placeholder="Enter your Name" pattern="[A-Za-z0-9\s]*" title="Address contain alphabets and number" required>
                </div>
                <!---<div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control" type="password" name="password" placeholder="Choose Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                   required>
                </div>
                <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input class="form-control" type="tel" name="mobile" placeholder="Enter Mobile No." maxlength=10 pattern="^\d{10}$" title="Enter right mobile number" required>
                </div>--->
                <button class="btn btn-danger" type="submit" name="register">Register</button><br>
            </form>
            </div>
        </div>
    </body>
</html>