<?php
    shell_exec("python stat_graph_generator.py");
    shell_exec("python stat_graph_generator2.py");
    shell_exec("python stat_graph_generator3.py");
    header("location: stats.html");
?>