
<?php
   include('connection.php');
    session_start();
    if(isset($_POST['login'])){
    
        $uname = mysqli_real_escape_string($connection,$_POST['username']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);
    
        if ($uname != "" && $password != ""){
    
            $sql_query = "select count(*) as cntUser from admin where username='".$uname."' and password='".$password."'";
            $result = mysqli_query($connection,$sql_query);
            $row = mysqli_fetch_array($result);
    
            $count = $row['cntUser'];
    
            if($count > 0){
                $_SESSION['uname'] = $uname;
                header('Location: admindashboard.php');
            }else{
                echo "Invalid username and password";
            }
    
        }
    
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MSEB</title>
    <link rel="stylesheet" href="../css/adminlogin.css">
    
  </head>
  <body>

    <div class="wrapper">
    </div>
    <div class="center">
      <h1>Employee Login</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>Employee Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
            <span></span>
          <label>Password</label>
        </div>
        <div class="pass"></div>
        <input type="submit" onclick="window.location.href ='home.php'" class="pass" name="login">
        
      </form>
    </div>

  </body>
</html>
  

<style>
  .wrapper{
	background: url(../images/login.jpg) no-repeat;
	background-size: cover;
	height: 100vh;
}
.center{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 500px;
  height: 300px;
  background:none;
  border-radius: 15px;
  box-shadow: 0px 5px 40px whitesmoke;
}
.center h1{
  text-align: center;
  color: cyan;
  padding: 50px -50px;
  border-bottom: 1px solid cyan;
}
.center form{
  padding: 0 40px;
  box-sizing: border-box;
}
form .txt_field{
  position: relative;
  border-bottom: 2px solid whitesmoke;
  margin: 30px 0;
}
.txt_field input{
  width: 100%;
  color: #fff;
  padding: 0 5px;
  height: 40px;
  font-size: 16px;
  border: none;
  background: none;
  outline: none;
}
.txt_field label{
  position: absolute;
  top: 50%;
  left: 5px;
  color: #fff;
  transform: translateY(-50%);
  font-size: 16px;
  pointer-events: none;
  transition: .5s;
}
.txt_field span::before{
  content: '';
  position: absolute;
  top: 40px;
  left: 0;
  width: 0%;
  height: 2px;
  background: cyan;
  transition: .5s;
  color: cyan;
}
.txt_field span::after{
  content: '';
  position: absolute;
  top: 40px;
  left: 0;
  width: 0%;
  height: 2px;
  background: rgb(144, 157, 157);
  transition: .5s;
  color: rgb(61, 5, 5);
}
.txt_field input:focus ~ label,
.txt_field input:valid ~ label{
  top: -5px;
  color:cyan;
}
.txt_field input:focus ~ span::before,
.txt_field input:valid ~ span::before{
  width: 100%;
  color: black;
}
.pass{
  margin: -5px 0 20px 5px;
  color:cyan;
  cursor: pointer;
}
.pass:hover{
  text-decoration: underline;
  color: rgb(0, 0, 0);
}
input[type="submit"]{
  width: 100%;
  height: 50px;
  border: 1px solid;
  background: cyan;
  border-radius: 25px;
  font-size: 18px;
  color:black;
  font-weight: 700;
  cursor: pointer;
  outline: none;
}
input[type="submit"]:hover{
  border-color:rgb(23, 204, 207);
  transition: .5s;
}
.signup_link{
  margin: 30px 0;
  text-align: center;
  font-size: 16px;
  color: #fff;
}
.signup_link a{
  color: #fff;
  text-decoration: none;
}
.signup_link a:hover{
  text-decoration: underline;
}

</style>