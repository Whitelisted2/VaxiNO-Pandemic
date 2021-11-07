<?php
session_start();
if(isset($_SESSION["login_admin"]))
{
    session_destroy();
    unset($_SESSION['login_admin']);
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
    if(!(isset($_POST["phnum"]) && isset($_POST["pass"])))
    {
        die("Please go <a href='user_login_signup.html'>back</a> and Login using Valid Credentials !!!");
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
        $_SESSION["age_user"]=$row["age_user"];
        $_SESSION["phnum_user"]=$row["phnum_user"];
        $_SESSION["email_user"]=$row["email_user"];
        $_SESSION["pincode_users"]=$row["pincode_users"];
        $_SESSION["app1_approval_user"]=$row["app1_approval_user"];
        $_SESSION["vac1_approval_user"]=$row["vac1_approval_user"];
        $_SESSION["app2_approval_user"]=$row["app2_approval_user"];
        $_SESSION["vac2_approval_user"]=$row["vac2_approval_user"];
        echo "You are Logged in !<br/>";
        header("location: loggedin.php");
    }
    else{
        // invalid credentials
        die("Please&nbsp;<a href='user_login_signup.html'>try again</a>,&nbsp;and enter correct credentials !");
    }
    ?>
    </div>
</body>
</html>