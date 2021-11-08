<?php
session_start();
if(!isset($_SESSION["login"]))
{
    die("NOT Authenticated! Go to <a href='user_login_signup.html'>login entrypoint</a>!");
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
    <title>SLOTS</title>
</head>
<body>
    <?php
    $res = shell_exec("python sending.py ".$_SESSION['pincode_users']);
    echo $res;
    ?>
</body>
</html>
