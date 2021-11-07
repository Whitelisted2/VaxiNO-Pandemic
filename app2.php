<?php
session_start();
if(!isset($_SESSION["login"]))
{
    die("Not Authenticated!!! Log in at <a href='user_login_signup.html'>entry point</a>.");
}
if(!isset($_POST['submit']))
{
    die("Please Try Again");
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
    <title>Booking Appointment 2</title>
</head>
<body>
    <div class="simple-box">
    <?php
        if($_SESSION["age_user"]<18)
        {
            die("You are Under Aged. You can NOT register now. Sorry for the inconvenience.");
        }
        else if($_SESSION["age_user"]>90)
        {
            die("You are Over Aged. You can NOT register. Sorry for the inconvenience.");
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

        $name_user=$_SESSION['name_user'];
        $phnum_user=$_SESSION["phnum_user"];

        $command = "SELECT * FROM usertable WHERE phnum_user='$phnum_user'";
        $result = mysqli_query($conn, $command);
        $row = mysqli_fetch_assoc($result);
        if($row["app2_approval_user"]==1)
        {
            echo "User already requested for an appointment for vaccination !";
        }
        else
        {
            $command = "UPDATE usertable SET app2_approval_user='1' WHERE phnum_user='$phnum_user'" ;
            $result = mysqli_query($conn, $command);
            if($result)
            {
                echo "Your request for appointment for vaccination dose 2 has been made.\n";
                echo "Please wait for Administrator to approve it.";
                $_SESSION["app2_approval_user"]=1;
            }
            else
            {
                echo "Please try again !";
            }
        }
    ?>
    Click&nbsp;<a href='loggedin.php'>here</a>&nbsp;to go back to your dashboard
    </div>
</body>
</html>