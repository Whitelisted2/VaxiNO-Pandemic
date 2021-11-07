<?php
session_start();
?>
<?php
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
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>User Dashboard</title>
        <link rel="stylesheet" href="css/dashlayout_user.css">
        <link rel="stylesheet" href="css/navigationBar.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
        <style>
            h2{
                font-family: 'Roboto', sans-serif;
                color:ivory;
            }
            body{
                font-family: 'Nunito', sans-serif;
            }
            
        </style>
    </head>
    <body>
        <div class="navbar" style="z-index:0;">
            <div class="logosmall">
                <a href="index.html">
                    <img class="nav-logo" src="images/logo_short2.jpg" alt="dark_logo">
                </a>
            </div>
            <div class="cloumn-flexing">
                <span><a class="nav-list"><b>User Dashboard</b></a></span> &emsp;&emsp;&emsp;&emsp;
                <span><a class="nav-list" href="index.html">Home</a></span>
                <span><a class="nav-list" href="team_members.html">Members</a></span>
                <span><a class="nav-list" href="proj_overview.html">Overview</a></span>
                <span><a class="nav-list" href="awareness.html">Awareness</a></span>
                <span><a class="nav-list" href="update_stat.php">Statistics</a></span>
            </div>
        </div>
        <br><br><br><br>
        <div class="main">
            <div class="left">
                <h2>Vaccination Status</h2>
                <hr>
                <div class="details">
                    <div id="name">Name :&nbsp;<span class="user_name"><?php echo $_SESSION["name_user"] ?></span></div>
                    <div id="age">Age&emsp;:&nbsp;<span><?php echo $_SESSION["age_user"]?></span></div>
                    <br/>
                    <div id="approved">Approved for appointment 1&nbsp;:&nbsp;<?php echo $_SESSION["vac1_approval_user"]==1?"Approved":"NOT Approved" ?></div>
                    <div id="approved">Approved for appointment 2&nbsp;:&nbsp;<?php echo $_SESSION["vac2_approval_user"]==1?"Approved":"NOT Approved" ?></div>
                </div>
                <br/>
                <hr>
                
            </div>
            <div class="right">
                <div class="greeting">
                    Hi, <span class="user_name">
                    <?php
                    echo $_SESSION["name_user"] 
                    ?>
                    </span> !
                    <br>
                    <form action="logging_out.php">
                        <button value="Log-out">Log-out</button>
                    </form>
                </div>
                <div id="personal-header" class="personal-header">
                    <img src="images/sample_profile.png" width="70px">
                </div>
                
                <div class="curr-details">
                    <fieldset>
                        <legend> <h2>Current Details</h2> </legend>
                        <table>
                            <tr>
                                <td> Name </td>
                                <td> : </td>
                                <td> <?php echo $_SESSION["name_user"] ?> </td>
                            </tr>
                            <tr>
                                <td> Age </td>
                                <td> : </td>
                                <td> <?php echo $_SESSION["age_user"] ?> </td>
                            </tr>
                            <tr>
                                <td> Pincode </td>
                                <td> : </td>
                                <td> <?php echo $_SESSION["pincode_users"] ?> </td>
                            </tr>
                            <tr>
                                <td> Ph. No. </td>
                                <td> : </td>
                                <td> <?php echo $_SESSION["phnum_user"] ?> </td>
                            </tr>
                            <tr>
                                <td> E-Mail </td>
                                <td> : </td>
                                <td> <?php echo $_SESSION["email_user"] ?> </td>
                            </tr>
                        </table>
                    </fieldset>
                    <!-- <button value="Change Details">Change Details</button> -->
                    <!-- UPDATION OF DETAILS PAGE CAN BE MADE LATER IF TIME ALLOWS -->
                </div>
            </div>
            
        </div>
        <div class="cert-block">
            <h2> Vaccine Certificate Status </h2>
            <?php
            if($_SESSION["app1_approval_user"]==0){
                echo "<form action='app1.php' method='POST'><button name='submit'>Book Appointment 1</button></form><br/>";
            }
            else if($_SESSION["app1_approval_user"]==1 && $_SESSION["vac1_approval_user"]==1 && $_SESSION["app2_approval_user"]==0){
                echo "<form action='app2.php' method='POST'><button name='submit'>Book Appointment 2</button></form><br/>";
            }
            else if($_SESSION["vac1_approval_user"]==1 && $_SESSION["vac2_approval_user"]==1){
                echo "You are all set to download both of your vaccine certificates!<br/>";
                echo "Thank You for getting Vaccinated.";
            }
            else{
                echo "Please wait for administrator to update the status of your appointment/vaccination.";
            }
            ?>
            <hr>
            <h2> Certificate Download </h2>
            <div class="certificate">
                <?php
                if($_SESSION["vac1_approval_user"]==0)
                {
                    echo "Please wait for administrator to Approve/Update your vaccination status.";
                }
                else if($_SESSION["vac2_approval_user"]==1)
                {
                    echo "<a href='download1.php'><button value='Download' id='download1'>Download Certificate for Dose 1</button></a><br/><br/>";
                    echo "<a href='download2.php'><button value='Download' id='download2'>Download Certificate for Dose 2</button></a>";
                }
                else if($_SESSION["vac1_approval_user"]==1)
                {
                    echo "<a href='download1.php'><button value='Download' id='download'>Download</button></a>";
                }
                ?>
            </div>
        </div>
        <div class="squareright">
            <img src="images/get-vacc.jpg" width="80%">
        </div>
        <footer>
            <p>&copy;2021 VaxiNO'Pandemic (A step towards faster vaccination)</p>
        </footer>
    </body>
</html>