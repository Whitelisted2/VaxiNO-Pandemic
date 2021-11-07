<?php
session_start();
if(isset($_SESSION["login"]))
{
    session_destroy();
    unset($_SESSION['login']);
    session_unset();
    session_abort();
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/most-basic.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
    
    <title>Logging You In !</title>
</head>
<body>
    <div class="simple-box">
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

    $id_admin=$_POST["admin_id"];
    $password_admin=trim($_POST["pass"]);

    $command="CREATE TABLE IF NOT EXISTS admintable (
        name_admin VARCHAR(50) NOT NULL, 
        id_admin BIGINT(12) NOT NULL PRIMARY KEY, 
        password_admin VARCHAR(50) NOT NULL)";
    
    $result = mysqli_query($conn, $command);
    if(!$result){
        die("Table Not created ! error : ".mysqli_error($conn)."<br/>");
    }

    $command = "INSERT IGNORE INTO admintable values ('Nirmit', '200010034', '430010002')";
    $result = mysqli_query($conn, $command);
    if(!$result){
        die("Record Not added ! Please try again. error : ".mysqli_error($conn));
    }

    $command = "INSERT IGNORE INTO admintable values ('Ishika', '200010020', '020010002')";
    $result = mysqli_query($conn, $command);
    if(!$result){
        die("Record Not added ! Please try again. error : ".mysqli_error($conn));
    }

    $command = "INSERT IGNORE INTO admintable values ('Siddharth', '200010003', '300010002')";
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
        header("location: admin_loggedin.php");
    }
    else{
        // invalid credentials
        die("Please&nbsp;<a href='admin_login.php'>try again</a>&nbsp;and enter valid Admin ID and password !");
    }
    
    // header("location : admin_loggedin.html")
    // please un-comment the adove line later
    ?>
    </div>
</body>
</html>