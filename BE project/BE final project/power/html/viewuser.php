<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard </title>
  <link rel="stylesheet" href="#" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="../images/circle.png" alt="">
          <span class="nav-item">DashBoard</span>
        </a></li>
        <li><a href="dashboard.php">
          <i class="fas fa-home"></i>
          <span class="nav-item">Home</span>
        </a></li>
<div class="dropdown">
<button class="dropdown-btn">Users</button>
<div class="dropdown-content">
<a href="viewuser.php">View User</a>
 </div>
</div>
        <li><a href="logout.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>

    <section class="main">
</body>
</html>
<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700");
*{
  margin: 0;
  padding: 0;
  outline: none;
  border: none;
  text-decoration: none;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
.container{
  display: flex;
  color: violet;
  font-size: 12px;
}
.main-top h1{
  font-size: 150px;
  color: cyan;
}
.main{

width: 82%;
background: url(../images/bg4.png);
background-size: 120%;
}
nav{
  height: 120vh;
  left: 0;
  top: 0;
  background:url(../images/bg4.png);
  background-size: 480%;
  box-shadow: 0 5px 15px blueviolet;
  width: 280px;
  overflow: hidden;
}
.logo{
  text-align: center;
  display: flex;
  margin: 10px 0 0 10px;
}
.logo img{
  width: 45px;
  height: 45px;
  border-radius: 50%;
}
.logo span{
  font-weight: bold;
  padding-left: 15px;
  font-size: 18px;
  text-transform: uppercase;
}
a{
  position: relative;
  font-size: 16px;
  display: table;
  width: 280px;
  padding: 10px;
  color: violet;
}
nav .fas{
  position: relative;
  width: 70px;
  height: 40px;
  top: 14px;
  font-size: 20px;
  text-align: center;
}
.nav-item{
  position: relative;
  top: 12px;
  margin-left: 10px;
}
a:hover{
  background: cornflowerblue;
  color: rgb(4, 53, 48);
  background-size: 150%;
  border-radius: 35px;
}
.logout{
  position: absolute;
  bottom: 10;
}
.html{
  color: rgb(25, 94, 54);
}
.css{
  color: rgb(104, 179, 35);
}
.js{
  color: rgb(28, 98, 179);
}
.dropdown {
  position: relative;
  display: inline-block;
  margin-top: 4vh;
}


.dropdown-btn {
background-color: cornflowerblue;
color: black;
padding: 8px;
border-radius: 25px;
width: 250px;
cursor: pointer;
margin-left: 2vh;
font-size: 2vh;
}

.dropdown-btn:hover{
background-color: violet;
color: black;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: cyan;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  border-radius: 25px;
  margin-left: 50px;
}


.dropdown-content a {
  color: #333;
  text-decoration: none;
  display: block;
  font-size: 2vh;
  width: 180px;
  margin: auto;
}


.dropdown-content a:hover {
  background-color: black;
  color: cyan;
}


.dropdown:hover .dropdown-content {
  display: block;
  border-radius: 20px;
  text-align: center;
}

.dropdown:hover .dropdown-content a{
display: block;
border-radius: 20px;
text-align: center;
}



</style>
<?php
include('connection.php');
  $query = "select * from userdetail";
  $query_run = mysqli_query($connection, $query);
  $sn = 0;
  echo "<form  method='GET'>
  <center><h4><u>List of users</u></h4></center><br>";
  echo "<div class='table-container'>
          <table class='table'>
            <tr>
              <th>S.No</th>
              <th>Name</th>
              <th>Address</th>
              <th>Email</th>
              <th>Phone No</th>
              <th>Document</th>
              <th>Power Detail</th>
              <th>Show Receipt</th>
            </tr>";
  while ($row = mysqli_fetch_assoc($query_run)) {
    $docPath = $row["doc"];
    $sn = $sn + 1;
    $id = $row['id'];

    echo "
            <tr>
              <td>$sn</td>
              <td>$row[name]</td>
              <td>$row[address]</td>
              <td>$row[email]</td>
              <td>$row[phno]</td>
              <td><a href='$row[doc]' download>Download</a>
              <td><a href='index.php?id=$id'>Power Detail</a></td>
              <td><a href='payment_receipt.php?fee_payment_id=$id'>Show Receipt</a></td>

            </tr>
          ";
  }
  echo "</table></div>";
?>

<style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    
  }

  .table-container {
    width: 80%;
    margin: auto;
    margin-top: 20px;
    max-height: 400px;
    overflow: auto;
    border: 1px solid #ddd;
    border-radius: 5px;
  }

  .table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
  }

  th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
  }

  tr:hover {
    background-color: #f5f5f5;
  }

  h4 {
    color: #333;
  }

  a {
    text-decoration: none;
    color: #007bff;
  }

  a:hover {
    text-decoration: underline;
  }
</style>
