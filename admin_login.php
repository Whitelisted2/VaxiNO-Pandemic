<?php
session_start();
if(isset($_SESSION["login"]))
{
    // die("Please Log out of the User Account !");
    session_destroy();
    unset($_SESSION['login']);
    session_unset();
    session_abort();
    session_start();
    // header("location: index.html");
}
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
        echo $_SESSION["name_admin"]." is Logged in as an Administrator!<br/>";
        echo 'Here you get Admin Privilages ! <a href="admin_loggedin.php">Click here</a>';
    }
    else{
        // invalid credentials
        die("Please enter valid Admin ID and password !");
    }

    // header("location : admin_loggedin.html")
    // please un-comment the adove line later
    ?>
</body>
</html>