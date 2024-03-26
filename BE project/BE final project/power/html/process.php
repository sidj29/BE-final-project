<?php
session_start();
include('connection.php');

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username=$_SESSION['uname'];

    $sql1="Select id from userlogin where username='$username'";
    $row=mysqli_query($connection, $sql1);
    while($row2 = mysqli_fetch_assoc($row)){
     $id=$row2['id'];
     echo $id;

    // Upload and store the PDF file
    $pdfFileName = $_FILES['electricity_bill']['name'];
    $pdfTempName = $_FILES['electricity_bill']['tmp_name'];
    $pdfPath = "uploads/" . $pdfFileName;
    move_uploaded_file($pdfTempName, $pdfPath);

    // Insert data into the database
    $sql = "INSERT INTO userdetail (name, address, email, phno, doc, userlogin_id) 
            VALUES ('$name', '$address', '$email','$phone','$pdfPath',$id)";

    if (mysqli_query($connection, $sql)) {
        echo "<script type='text/javascript'>
                    window.location.href = 'success.php';  
                    </script>";
    } else {
        "<script type='text/javascript'>
                  alert('Try Again !!!');
                window.location.href = 'adduser.php';  
              </script>";
    }
}
}
// Close the database connection
mysqli_close($connection);
?>
