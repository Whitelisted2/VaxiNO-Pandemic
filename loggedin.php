<?php
session_start();
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
    <body>
        <div class="top" height="40px">
            <div id="heading">Profile Page</div>
            <div id="personal-header" width="20%" style="font-size: 50%;">Hi! &lt;NAME&gt;! <img src="" width="20px" height="20px">&nbsp;&nbsp;&nbsp;&nbsp;<button value="Log-out">Log-out</button></div>
        </div>
        <br/>
        <div class="main">
            <div class="left">
                <hr>
                <h2><u>Vaccination Status</u></h2>
                <br/>
                <div class="details">
                    <div id="name">Name&nbsp;:&nbsp;&lt;name&gt;</div>
                    <div id="age">Age&nbsp;:&nbsp;&lt;age&gt;</div>
                    <br/>
                    <div id="ref-no">Ref. No.&nbsp;:&nbsp;&lt;ref-no&gt;</div>
                    <div id="approved">Approved&nbsp;:&nbsp;&lt;approved&gt;</div>
                </div>
                <br/>
                <hr>
                <br/>
                <br/>
                <div class="certificate">
                    Download Certificate<br/>
                    <img src="" width="90%" height="80%"><br/>
                    <button value="Download">Download</button>
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
                    Name:<br/>
                    Age:<br/>
                    DOB:<br/>
                    ID No.:<br/>
                    Address:<br/>
                    Ph. No.:<br/>
                    E-Mail:<br/>
                    Profile-Pic:<br/>
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
    </body>
</html>