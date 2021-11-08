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
    <link rel="stylesheet" href="css/navigationBar.css">
    <link rel="stylesheet" href="css/dashlayout_user.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <title>Admin Dashboard</title>
    <style>
        fieldset{
            min-height:300px;
        }
        legend{
            font-family: 'Roboto', sans-serif;
            color:ivory;
            font-size:larger;
        }
        body{
            background-image: url(images/admin-wallpaper.jpg);
        }
        button{
            margin:0;
        }
        table, th, td{
            border-style:solid;
            border-collapse:collapse;
            border-color:ivory;
        }
        table{
            min-width:80%;
        }
        th, td{
            font-family: 'Rubik', sans-serif;
            padding:2px;
        }
        footer{
            bottom: 0;
            display:block;
            position:absolute;
            text-align:center;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logosmall">
            <a href="index.html">
                <img class="nav-logo" src="images/logo_short2.jpg" alt="dark_logo">
            </a>
        </div>
        <div class="cloumn-flexing">
            <span><a class="nav-list"><b>Admin Dashboard</b></a></span> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <span><a class="nav-list" href="index.html">Home</a></span>
            <span><a class="nav-list" href="awareness.html">Awareness</a></span>
            <span><a class="nav-list" href="update_stat.php">Statistics</a></span>
            <span><form action="admin_logout.php" method="POST"><button>Log-Out</button></form></span>
            &emsp;&emsp;
        </div>
    </div>
    <br> <br> <br> <br>
    
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

        echo "<br><br><div class='left-half'><fieldset><legend>Users to be approved for Dose 1</legend><br>";
        $command = "SELECT * FROM usertable WHERE app1_approval_user=1 && vac1_approval_user=0";
        $result = mysqli_query($conn, $command);
        echo "<form action='update_app1.php' method='POST'>";
        echo "<table>";
        echo "<tr><th width='50px'>Check</th><th>Name</th><th>Age</th></tr>";
        $row=mysqli_fetch_assoc($result);
        while($row)
        {
            echo "<tr><td><center><input type='checkbox' name='approve_users_1[]' value=".$row['phnum_user']."></td><td>".$row['name_user']."</center></td><td>".$row['age_user']."</td></tr>";
            $row=mysqli_fetch_assoc($result);
        }
        echo "</table>";
        echo "<br/><button name='submit'>Approve as Vaccinated Dose 1</button>";
        echo "</form>";

        echo "</fieldset></div>";

        echo "<div class='right-half'><fieldset><legend>Users to be approved for Dose 2</legend><br>";
        $command = "SELECT * FROM usertable WHERE app2_approval_user=1 && vac2_approval_user=0";
        $result = mysqli_query($conn, $command);
        echo "<form action='update_app2.php' method='POST'>";
        echo "<table>";
        echo "<tr><th width='50px'>Check</th><th>Name</th><th>Age</th></tr>";
        $row=mysqli_fetch_assoc($result);
        while($row)
        {
            echo "<tr><td><center><input type='checkbox' name='approve_users_2[]' value=".$row['phnum_user']."></td><td>".$row['name_user']."</center></td><td>".$row['age_user']."</td></tr>";
            $row=mysqli_fetch_assoc($result);
        }
        echo "</table>";
        echo "<br/><button name='submit'>Approve as Vaccinated Dose 2</button>";
        echo "</form>";
        echo "</fieldset></div>";
    ?>
    <footer>
		&copy;2021 VaxiNO'Pandemic (A step towards faster vaccination)
	</footer>
</body>
</html>