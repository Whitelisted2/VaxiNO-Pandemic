<!DOCTYPE html>
<html>
    <head>
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
        // $database="allusers";
        // $conn=mysqli_connect($servername, $username, $password, $database);
        // echo "control is here !";

        $command = "use allusers";
        $result = mysqli_query($conn, $command);

        if($_POST["phnum"]<9999999 || $_POST["pincode"]<0 || $_POST["pincode"]>999999 || empty(trim($_POST["pass"])) || empty(trim($_POST["email"])) ||  empty(trim($_POST["name"]))){
            die("PLEASE ENTER VALID CREDENTIALS !");
        }

        if($_POST["pass"] !== $_POST["repass"]){
            die("Passwords were not same! please try again !");
        }

        $phnum_user=$_POST["phnum"];
        $password_user=trim($_POST["pass"]);
        $repassword_user=trim($_POST["repass"]);
        $email_user=trim($_POST["email"]);
        $pincode_user=$_POST["pincode"];
        $name_user=trim($_POST["name"]);

        $command="CREATE TABLE IF NOT EXISTS usertable (
            name_user VARCHAR(50) NOT NULL, 
            phnum_user BIGINT(12) NOT NULL PRIMARY KEY, 
            password_user VARCHAR(50) NOT NULL, 
            email_user VARCHAR(70) NOT NULL, 
            pincode_users INT(6) NOT NULL)";
        
        $result = mysqli_query($conn, $command);
        if(!$result){
            die("Table Not created ! error : ".mysqli_error($conn)."<br/>");
        }

        // also check for previous phnum which should not be same as the new added one !!!
        $phnumcheck=$_POST["phnum"];
        $sql="SELECT * FROM usertable WHERE phnum_user='$phnumcheck'";
        $result = mysqli_query($conn, $sql);
        if($row = mysqli_fetch_assoc($result)){
            die("This Phone number is already registered !");
        }

        $command = "INSERT INTO usertable values ('$name_user', '$phnum_user', '$password_user', '$email_user', '$pincode_user')";
        $result = mysqli_query($conn, $command);
        if(!$result){
            die("Record Not added ! Please try again. error : ".mysqli_error($conn));
        }
        
        header("location: registered.html");
        ?>
    </body>
</html>