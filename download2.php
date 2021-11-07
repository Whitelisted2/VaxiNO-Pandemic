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
    <title>Certificate Dose 2</title>
</head>
<body>
<h2><center><strong>Certificate of <emp>Vaccination(Dose 2)</emp></strong></center></h2><br/>
    <center>
        It is to hereby certify that <?php echo $_SESSION["name_user"]; ?> has been vaccinated(dose 2).
    </center></br>
    <br/>
    <p style="text-align: left;">
    Name : <?php echo $_SESSION["name_user"]; ?><br/>
    Age : <?php echo $_SESSION["age_user"]; ?><br/>
    Phone No. : <?php echo $_SESSION["phnum_user"]; ?><br/>
    Pincode : <?php echo $_SESSION["pincode_users"]; ?><br/>
    Email : <?php echo $_SESSION["email_user"]; ?><br/>
    </p>
    <br/>
    <p style="text-align: right;">
    VaxiNO'Pandemic<br/>
    Signature
    </p>
    <a href="#" onclick="window.print()"> click here to Print</a>
</body>
</html>