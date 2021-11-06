<?php
session_unset();
session_abort();
header("location: index.html")
?>