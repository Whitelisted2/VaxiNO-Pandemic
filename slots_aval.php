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
    <link rel="stylesheet" href="css/dashlayout_user.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
        
    <title>SLOTS</title>
    <style>
        .left{
            background-image:linear-gradient(to bottom right, rgb(0, 140, 255, 0.8), rgb(8, 8, 160, 0.8));
            margin-top:1%;
            width:94%;
            margin-bottom:1%;
        }
        h1{
            font-family: 'Roboto', sans-serif;
            color:ivory;
        }
        ol li::marker{
            font-size:xx-large;
        }
        ul li::marker{
            font-size:small;
        }
        button{
            float:right;
            font-family: 'Montserrat', sans-serif;
        }
        body{
            font-family: 'Merriweather', sans-serif;
        }
        .vaccslot{
            border-color:ivory;
            border-width:2px;
            border-style:solid;
            margin-bottom:1%;
            padding:2%;
        }
    </style>
</head>
<body>
    <center>
    <h1>Slots Near You</h1>
    </center>
    <div class="left">
    <a href="javascript:history.back()"><button>Back to Dashboard</button></a>
    <br/>
    <?php
    $res = shell_exec("python sending.py ".$_SESSION['pincode_users']);
    echo $res;
    ?>
    </div>
</body>
</html>
