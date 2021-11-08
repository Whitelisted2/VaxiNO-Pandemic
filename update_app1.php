<?php
    session_start();
    if(!isset($_SESSION["login_admin"]))
    {
        die("NOT Authenticated! Go to <a href='admin_login.html'>admin login entrypoint</a>!");
    }
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
    
    <title>Updating User's Data</title>
</head>
<body>
    <div class="simple-box">
        <?php
        if(!isset($_POST['submit']))
        {
            die("Please Go&nbsp;<a href='admin_loggedin.php'>back</a>&nbsp;and choose the correct options !");
        }
        if(!isset($_POST['approve_users_1']))
        {
            die("No Options Chosen! Click&nbsp;<a href='admin_loggedin.php'>here</a>&nbsp;to go back to admin dashboard.");
        }

        $servername = $_SERVER['SERVER_NAME'];
        $username="root";
        $password="";
    
        $conn=mysqli_connect($servername, $username, $password);
        if(!$conn){
            die("Connection Failed !"+mysqli_connect_error()+"<br/>");
        }

        $command = "use allusers";
        $result = mysqli_query($conn, $command);

        foreach($_POST["approve_users_1"] as $each_phnum_user){
            $command = "UPDATE usertable SET vac1_approval_user=1 WHERE phnum_user=".$each_phnum_user ;
            $result = mysqli_query($conn, $command);
            $command = "UPDATE usertable SET vac1_date=".date("Y-m-d")." WHERE phnum_user=".$each_phnum_user ;
            $result = mysqli_query($conn, $command);
        }
        echo "All chosen users who applied for vaccination dose 1 are Updated !";
    ?>
    Click&nbsp;<a href='admin_loggedin.php'>here</a>&nbsp;to go back to admin dashboard.
    </div>
</body>
</html>