<?php
session_start();
// $user_info_json = json_encode($_SESSION);
?>
<?php
if(!isset($_SESSION["login"]))
{
    die("Not Authenticated!!!");
}
if(isset($_SESSION["login_admin"]))
{
    // die("Please Log out of the Admin Account !");
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
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Profile/Account</title>
        <link rel="stylesheet" href="css/dashlayout_user.css">
    </head>
    <body>
        <div class="top" height="40px">
            <div id="heading">Profile Page</div>
            <div id="personal-header" width="20%" style="font-size: 50%;">Hi! <span class="user_name"><?php echo $_SESSION["name_user"] ?></span> <img src="" width="20px" height="20px">&nbsp;&nbsp;&nbsp;&nbsp;<form action="logging_out.php"><button value="Log-out">Log-out</button></form></div>
        </div>
        <br/>
        <div class="main">
            <div class="left">
                <hr>
                <h2><u>Vaccination Status</u></h2>
                <br/>
                <div class="details">
                    <div id="name">Name&nbsp;:&nbsp;<span class="user_name"><?php echo $_SESSION["name_user"] ?></span></div>
                    <div id="age">Age&nbsp;:&nbsp;<?php echo $_SESSION["age_user"]?></div>
                    <br/>
                    <div id="approved">Approved for appointment 1&nbsp;:&nbsp;<?php echo $_SESSION["vac1_approval_user"]==1?"Approved":"NOT Approved" ?></div>
                    <div id="approved">Approved for appointment 2&nbsp;:&nbsp;<?php echo $_SESSION["vac2_approval_user"]==1?"Approved":"NOT Approved" ?></div>
                </div>
                <br/>
                <hr>
                <br/>
                <br/>
                <div class="certificate">
                    <?php
                    if($_SESSION["vac1_approval_user"]==1)
                    {
                        echo "Download Certificate<br/>";
                        echo "<img src='' width='90%'' height='80%''><br/>";
                        echo "<button value='Download' id='download'>Download</button>";
                    }
                    else
                    {
                        echo "Please wait for administrator to Approve/Update your vaccination status.";
                    }
                    ?>
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
                    Age : <?php echo $_SESSION["age_user"] ?><br/>
                    Pincode : <?php echo $_SESSION["pincode_users"] ?><br/>
                    Ph. No. : <?php echo $_SESSION["phnum_user"] ?><br/>
                    E-Mail : <?php echo $_SESSION["email_user"] ?><br/>
                    <!-- <button value="Change Details">Change Details</button> -->
                    <!-- UPDATION OF DETAILS PAGE CAN BE MADE LATER IF TIME ALLOWS -->
                </div>
            </div>
            <!-- <button action="app1.php">Book Appointment 1</button><br/>
            <button action="app2.php">Book Appointment 2</button><br/> -->
            <?php
            if($_SESSION["app1_approval_user"]==0){
                echo "<form action='app1.php' method='POST'><button name='submit'>Book Appointment 1</button></form><br/>";
            }
            else if($_SESSION["app1_approval_user"]==1 && $_SESSION["vac1_approval_user"]==1){
                echo "<button action='app2.php'>Book Appointment 2</button><br/>";
            }
            else{
                echo "Please wait for administrator to update the status of your appointment/vaccination.";
            }
            ?>
            <footer>
            <div class="footer">
                &nbsp;<br/><br/>
                &copy;VaxiNo'pandemic<br/>
                <a href="mailto:vaxinopandemic@gmail.com">E-Mail Address</a><br/>
                <a href="tel:9999999999">Phone Number</a>
            </div>
            </footer>
        </div>
        <!-- <script>
            function check_approval(){
                if(<?php //echo ($_SESSION["init_app_approval_user"]==1)?"1":"0" ; ?>){document.getElementById("download").setAttribute("disabled", "disabled");}
            }
        </script> -->
    </body>
</html>