<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/most-basic.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
    
        <title>Signing You UP !</title>
        <style>
            body
            {
                background-color: white;
                text-align: left;
                font-family: serif;
                color: black;
                font-size: 20px;
            }
        </style>
    </head>
    <body>
    <div class="simple-box">
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

        if($_POST["phnum"]<9999999 || $_POST["pincode"]<0 || $_POST["pincode"]>999999 || empty(trim($_POST["pass"])) || empty(trim($_POST["email"])) ||  empty(trim($_POST["name"]))){
            die("PLEASE ENTER VALID CREDENTIALS, &nbsp;<a href='user_login_signup.html'>try again</a>,&nbsp; !");
        }

        if($_POST["pass"] !== $_POST["repass"]){
            die("Passwords were not same! please &nbsp;<a href='user_login_signup.html'>try again</a>,&nbsp;!");
        }

        $phnum_user=$_POST["phnum"];
        $password_user=trim($_POST["pass"]);
        $repassword_user=trim($_POST["repass"]);
        $email_user=trim($_POST["email"]);
        $pincode_user=$_POST["pincode"];
        $name_user=trim($_POST["name"]);
        $age=$_POST["age"];

        $command="CREATE TABLE IF NOT EXISTS usertable (
            name_user VARCHAR(50) NOT NULL, 
            age_user INT(3) NOT NULL, 
            phnum_user BIGINT(12) NOT NULL PRIMARY KEY, 
            password_user VARCHAR(50) NOT NULL, 
            email_user VARCHAR(70) NOT NULL, 
            pincode_users INT(6) NOT NULL, 
            app1_approval_user INT(3) DEFAULT '0', 
            vac1_approval_user INT(3) DEFAULT '0', 
            app2_approval_user INT(3) DEFAULT '0', 
            vac2_approval_user INT(3) DEFAULT '0', 
            vac1_date DATE DEFAULT '0001-01-01', 
            vac2_date DATE DEFAULT '0001-01-01')";
        
        $result = mysqli_query($conn, $command);
        if(!$result){
            die("Table Not created ! error : ".mysqli_error($conn)."<br/>");
        }

        // DONE LATER - also check for previous phnum which should not be same as the new added one !!!
        $phnumcheck=$_POST["phnum"];
        $sql="SELECT * FROM usertable WHERE phnum_user='$phnumcheck'";
        $result = mysqli_query($conn, $sql);
        if($row = mysqli_fetch_assoc($result)){
            die("This Phone number is already registered. &nbsp;<a href='user_login_signup.html'>Try again</a>,&nbsp;!");
        }

        $command = "INSERT INTO usertable values ('$name_user', '$age', '$phnum_user', '$password_user', '$email_user', '$pincode_user', 0, 0, 0, 0, 0001-01-01, 0001-01-01)";
        $result = mysqli_query($conn, $command);
        if(!$result){
            die("Record Not added ! &nbsp;<a href='user_login_signup.html'>try again</a>,&nbsp; error : ".mysqli_error($conn));
        }
        
        header("location: registered.html");
        ?>

    </div>
    </body>
</html>