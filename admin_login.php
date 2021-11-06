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
    $servername = $_SERVER['SERVER_NAME'];
    $username="root";
    $password="";

    $conn=mysqli_connect($servername, $username, $password);
    if(!$conn){
        die("Connection Failed !"+mysqli_connect_error()+"<br/>");
    }

    $command="CREATE DATABASE IF NOT EXISTS admins";
    $result=mysqli_query($conn, $command);
    if(!$result)
    {
        die("Database allusers NOT created ! error : ".mysqli_error($conn)."<br/>");
    }

    $command = "use admins";
    $result = mysqli_query($conn, $command);

    $id_admin=$_POST["adminid"];
    $password_admin=trim($_POST["pass"]);

    $command="CREATE TABLE IF NOT EXISTS admintable (
        name_admin VARCHAR(50) NOT NULL, 
        id_admin BIGINT(12) NOT NULL PRIMARY KEY, 
        password_admin VARCHAR(50) NOT NULL)";
    
    $result = mysqli_query($conn, $command);
    if(!$result){
        die("Table Not created ! error : ".mysqli_error($conn)."<br/>");
    }

    $command = "INSERT INTO usertable values ('Nirmit', '200010034', '430010002')";
    $result = mysqli_query($conn, $command);
    if(!$result){
        die("Record Not added ! Please try again. error : ".mysqli_error($conn));
    }

    $command = "INSERT INTO usertable values ('Ishika', '200010020', '020010002')";
    $result = mysqli_query($conn, $command);
    if(!$result){
        die("Record Not added ! Please try again. error : ".mysqli_error($conn));
    }

    $command = "INSERT INTO usertable values ('Siddharth', '200010003', '300010002')";
    $result = mysqli_query($conn, $command);
    if(!$result){
        die("Record Not added ! Please try again. error : ".mysqli_error($conn));
    }







    $command = "SELECT * FROM admintable WHERE id_admin='$id_admin'";
    $result = mysqli_query($conn, $command);
    $row = mysqli_fetch_assoc($result);
    if($row && $row["password_admin"]==$password_admin){
        // user logged in
        $_SESSION["login_admin"]=1;
        $_SESSION["name_admin"]=$row["name_admin"];
        $_SESSION["id_admin"]=$row["id_admin"];
        echo "You are Logged in !<br/>";
        echo '<a href="loggedin.html">Click here</a> to go to your dashboard to book a vaccine slot !';
    }
    else{
        // invalid credentials
        die("Please enter valid Ph. No. and password !");
    }
    ?>
</body>
</html>