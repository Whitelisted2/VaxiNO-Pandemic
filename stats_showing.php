<?php
    shell_exec("python stat_graph_generator2.py");
    header("location: stats.html");
?>