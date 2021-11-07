<?php
session_start();
?>
<?php
if(!isset($_SESSION["login"]))
{
    die("Not Authenticated!!!");
}
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
    <title>Certificate Dose 1</title>
</head>
<body>
    Hello World !!!<br/>
    <a href="#" onclick="window.print()"> click here to Print</a>
</body>
</html>