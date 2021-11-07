<?php
session_start();
session_destroy();
unset($_SESSION['login_admin']);
session_unset();
session_abort();
header("location: index.html")
?>