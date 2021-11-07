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

        echo "<hr>";

        echo "Users to be approved for Dose 1 :-<br/><br/>";
        $command = "SELECT * FROM usertable WHERE app1_approval_user=1 && vac1_approval_user=0";
        $result = mysqli_query($conn, $command);
        echo "<form action='update_app1.php' method='POST'>";
        echo "<table>";
        echo "<tr><th>check</th><th>Name</th><th>Age</th></tr>";
        $row=mysqli_fetch_assoc($result);
        while($row)
        {
            echo "<tr><td><input type='checkbox'></td><td>".$row['name_user']."</td><td>".$row['age_user']."</td></tr>";
            $row=mysqli_fetch_assoc($result);
        }
        echo "</table>";
        echo "<br/><input type='button' name='submit' value='Approve as Vaccinated Dose 1'>";
        echo "</form>";

        echo "<hr>";

        echo "Users to be approved for Dose 2 :-<br/><br/>";
        $command = "SELECT * FROM usertable WHERE app2_approval_user=1 && vac2_approval_user=0";
        $result = mysqli_query($conn, $command);
        echo "<form action='update_app2.php' method='POST'>";
        echo "<table>";
        echo "<tr><th>check</th><th>Name</th><th>Age</th></tr>";
        $row=mysqli_fetch_assoc($result);
        while($row)
        {
            echo "<tr><td><input type='checkbox'></td><td>".$row['name_user']."</td><td>".$row['age_user']."</td></tr>";
            $row=mysqli_fetch_assoc($result);
        }
        echo "</table>";
        echo "<br/><input type='button' name='submit' value='Approve as Vaccinated Dose 1'>";
        echo "</form>";
    ?>
</body>
</html>