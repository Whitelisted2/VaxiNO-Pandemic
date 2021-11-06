<?php
session_start();
$user_info_json = json_encode($_SESSION);
?>
<?php
if(!isset($_SESSION["login"]))
{
    die("Not Authenticated!!!");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Profile/Account</title>
        <link rel="stylesheet" href="css/part1.css">
    </head>
    <body onload="check_approval()">
        <div class="top" height="40px">
            <div id="heading">Profile Page</div>
            <div id="personal-header" width="20%" style="font-size: 50%;">Hi! <span class="user_name">&lt;NAME&gt;!</span> <img src="" width="20px" height="20px">&nbsp;&nbsp;&nbsp;&nbsp;<form action="logging_out.php"><button value="Log-out">Log-out</button></form></div>
        </div>
        <br/>
        <div class="main">
            <div class="left">
                <hr>
                <h2><u>Vaccination Status</u></h2>
                <br/>
                <div class="details">
                    <div id="name">Name&nbsp;:&nbsp;<span class="user_name"><?php echo $_SESSION["name_user"] ?></span></div>
                    <div id="age">Age&nbsp;:&nbsp;<?php echo $_SESSION["age_user"]??"Not Known" ?></div>
                    <br/>
                    <div id="phnum">Ref. No.&nbsp;:&nbsp;<?php echo $_SESSION["phnum_user"] ?></div>
                    <div id="approved">Approved&nbsp;:&nbsp;<?php echo $_SESSION["init_app_approval_user"]??"NOT Approved" ?></div>
                </div>
                <br/>
                <hr>
                <br/>
                <br/>
                <div class="certificate">
                    Download Certificate<br/>
                    <img src="" width="90%" height="80%"><br/>
                    <button value="Download" id="download">Download</button>
                </div>
            </div>
            <div class="right">
                <hr>
                <div class="vacc-stat">
                    Vacc. Percentage<br/>
                    <img src="" width="18%" height="60px"><br/>
                </div>
                <hr>
                <div class="curr-details">
                    <center>Current Details</center>
                    Name : <?php echo $_SESSION["name_user"] ?><br/>
                    Age :<br/>
                    DOB :<br/>
                    ID No. :<br/>
                    Pincode : <?php echo $_SESSION["pincode_users"] ?><br/>
                    Ph. No. : <?php echo $_SESSION["phnum_user"] ?><br/>
                    E-Mail :<?php echo $_SESSION["email_user"] ?><br/>
                    Profile-Pic :<br/>
                    <button value="Change Details">Change Details</button>
                </div>
            </div>
            <footer>
            <div class="footer">
                &nbsp;<br/><br/>
                &copy;VaxiNo'pandemic<br/>
                <a href="mailto:vaxinopandemic@gmail.com">E-Mail Address</a><br/>
                <a href="tel:9999999999">Phone Number</a>
            </div>
            </footer>
        </div>
        <script>
            function check_approval(){
                if(<?php echo ($_SESSION["init_app_approval_user"]==1)?"1":"0" ; ?>){document.getElementById("download").setAttribute("disabled", "disabled");}
            }
        </script>
    </body>
</html>