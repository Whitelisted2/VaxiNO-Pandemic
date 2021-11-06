<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging You In !</title>
</head>
<body>
    <?php
    if(!(isset($_POST["phnum"]) && isset($_POST["pass"])))
    {
        die("Please go back and Login Valid Credentials !!!");
    }

    $servername = $_SERVER['SERVER_NAME'];
    $username="root";
    $password="";

    $conn=mysqli_connect($servername, $username, $password);
    if(!$conn){
        die("Connection Failed !"+mysqli_connect_error()+"<br/>");
    }

    $command="CREATE DATABASE IF NOT EXISTS allusers";
    $result=mysqli_query($conn, $command);
    if(!$result)
    {
        die("Database allusers NOT created ! error : ".mysqli_error($conn)."<br/>");
    }

    $command = "use allusers";
    $result = mysqli_query($conn, $command);

    $phnum_user=$_POST["phnum"];
    $password_user=trim($_POST["pass"]);

    $command = "SELECT * FROM usertable WHERE phnum_user='$phnum_user'";
    $result = mysqli_query($conn, $command);
    $row = mysqli_fetch_assoc($result);
    if($row && $row["password_user"]==$password_user){
        // user logged in
        $_SESSION["login"]=1;
        $_SESSION["name_user"]=$row["name_user"];
        $_SESSION["phnum_user"]=$row["phnum_user"];
        $_SESSION["email_user"]=$row["email_user"];
        $_SESSION["pincode_users"]=$row["pincode_users"];
        echo "You are Logged in !<br/>";
        echo '<a href="loggedin.php">Click here</a> to go to your dashboard to book a vaccine slot !';
    }
    else{
        // invalid credentials
        die("Please enter valid Ph. No. and password !");
    }
    ?>
</body>
</html>