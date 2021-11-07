<?php
session_start();
if(!isset($_SESSION["login_admin"]))
{
    die("NOT Authenticated !");
}
if(isset($_SESSION["login"]))
{
    // die("Please Log out of the User Account !");
    session_destroy();
    unset($_SESSION['login']);
    session_unset();
    session_abort();
    // header("location: index.html");
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Logged in</title>
</head>
<body>
    <form action="admin_logout.php" method="POST"><button>Log-Out</button></form><br/>
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

        echo "Users to be approved for Dose 1 :-<br/><br/>";
        $command = "SELECT * FROM usertable WHERE app1_approval_user=0";
        $result = mysqli_query($conn, $command);
        echo "<table>";
        echo "<form action='update_app1.php' method='POST'>";
        echo "<th>check</th><th>Name</th><th>Age</th>";
        while($row=mysqli_fetch_assoc($result))
        {
            echo "<tr><input type='checkbox'></tr><tr>".$row['name_user']."</tr><tr>".$row['age_user']."</tr>";
        }
        echo "</form>";
        echo "</table>";
    ?>
</body>
</html>