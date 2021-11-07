<?php
session_start();
if(!isset($_SESSION["login_admin"]))
{
    die("NOT Authenticated !");
}
if(isset($_SESSION["login"]))
{
    die("Please Log out of the User Account !");
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
        // 
    ?>
</body>
</html>