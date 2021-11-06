<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating Stats</title>
</head>
<body>
    Updating Stats !!!
    <?php
    shell_exec("python stat_graph_generator.py");
    shell_exec("python stat_graph_generator2.py");
    shell_exec("python stat_graph_generator3.py");
    header("location: stats.html");
    ?>
</body>
</html>