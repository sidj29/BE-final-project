<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        img {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<form action="PayBookPlan.php" method="GET">
    <div class="card">
        <?php 
        include('connection.php');
        $username=$_SESSION['uname'];
        $sql1="Select id from userlogin where username='$username'";
    $row=mysqli_query($connection, $sql1);
    while($row2 = mysqli_fetch_assoc($row)){
     $id=$row2['id'];
     $sql2="Select id,name from userdetail where userlogin_id='$id'";
     $row4=mysqli_query($connection, $sql2);
    while($row3 = mysqli_fetch_assoc($row4)){
     $id1=$row3['id'];
    $name=$row3['name'];
     ?>
    <input type='hidden' name='id' value='<?php echo $id; ?>'>
    <input type='hidden' name='name' value='<?php echo $name; ?>'>
        <img src='../images/success.png' alt='Success Image'>
        <h1>Success!</h1>
        <p>Your form has been submitted successfully.</p>
        <button name='bookp' value='Book'>Payment</button>
        <p><a href="file:///C:/xampp/htdocs/QGIS/index.html">Back to home</a></p>
    </div>
     <?php }  }?>
    <script>
        function redirectToPay() {
            window.location.href = "payBookPlan.php"; // Redirect to home or another page
        }
    </script>

</body>
</html>
