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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <title>Certificate Dose 1</title>
    <style>
        body{
            padding:2%;
            font-family: 'Rubik', sans-serif;
        }
        .row{
            width:100%;
            margin-top:1px;
            padding:1%;
        }
        *:after{
            clear:both;
            content:"";
            display:table;
        }
        .left{
            width:50%;
            float:left;
            min-height:50%;
            display:block;
            text-align:left;
        }
        .right{
            width:40%;
            float:right;
            min-height:50%;
            display:block;
            text-align:right;
            padding:5%;
        }
        legend{
            margin:0 auto;
            font-family: 'Roboto', sans-serif;
            font-size:larger;
        }
        .logo{
            text-align:center;
        }
        td{
            padding:0.5%;
        }
    </style>
</head>
<body>
    <?php
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

    $command = "SELECT * FROM usertable WHERE phnum_user='$phnum_user'";
    $result = mysqli_query($conn, $command);
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="logo">
        <img src="images/light_logo.png" width="50%">
    </div>
    <fieldset>
    <legend><h2><center><strong>Certificate of Vaccination (Dose 1)</strong></center></h2></legend>
    <div class="row">
        
            It is to hereby certify that <b><em><?php echo $_SESSION["name_user"]; ?></em></b> has been vaccinated against COVID-19 (Dose 1).
        
    </div>
    <br/>
    <div class="row">
        <div class="left">
            <table>
                <tr><td colspan="3"><h3>Details of Vaccinee</h3></td></tr>
                <tr><td width="50%">Name </td><td width="5%">:</td><td> <?php echo $_SESSION["name_user"]; ?></td></tr>
                <tr><td>Age </td><td>:</td><td> <?php echo $_SESSION["age_user"]; ?></td></tr>
                <tr><td>Phone No. </td><td>:</td><td> <?php echo $_SESSION["phnum_user"]; ?></td></tr>
                <tr><td>Pincode </td><td>:</td><td> <?php echo $_SESSION["pincode_users"]; ?></td></tr>
                <tr><td>Email </td><td>:</td><td> <?php echo $_SESSION["email_user"]; ?></td></tr>
                <tr><td>Date of Vaccination dose 1 </td><td>:</td><td> <?php echo $row['vac1_date'] ; ?></td></tr>
            </table>
        </div>
        <div class="right">
            <img src="images/sample_profile.png" width="20%"><br>
            Vaccinee
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="left">
            Thank you for getting vaccinated!
        </div>
        <div class="right" style="margin-bottom:0; margin-right:2%;">
            <p style="text-align: right;">
            <b><em> VaxiNO'Pandemic </em></b><br/>
            Verified on : <?php echo $row['vac1_date'] ; ?>
            </p>
        </div>
    </div>
    </fieldset>
    <a href="#" onclick="window.print()">Click here to Print</a>
    <br>
    <a href="loggedin.php">Back to Dashboard</a>
</body>
</html>