<?php
session_start();
if(!isset($_SESSION["login_admin"]))
{
    die("NOT Authenticated !");
}
if(isset($_SESSION["login"]))
{
    session_destroy();
    unset($_SESSION['login']);
    session_unset();
    session_abort();
    session_start();
}
if(!isset($_POST['submit']))
{
    die("Please Go Back and choose the correct options !");
}
if(!isset($_POST['approve_users_2']))
{
    die("No Options Chosen !");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating User's Data</title>
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

        $command = "use allusers";
        $result = mysqli_query($conn, $command);

        foreach($_POST["approve_users_2"] as $each_phnum_user){
            $command = "UPDATE usertable SET vac2_approval_user=1 WHERE phnum_user=".$each_phnum_user ;
            $result = mysqli_query($conn, $command);
        }
        echo "All users who applied for vaccination dose 2 are Updated !";
    ?>
</body>
</html>