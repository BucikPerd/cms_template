<?php include 'functions.php';?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document_1</title>
</head>
<body>
        <?php
        global $connection;
        $mysqlQueryRead="SELECT * FROM login";
        $QueryReadResult=mysqli_query($connection, $mysqlQueryRead);
        while($row=mysqli_fetch_assoc($QueryReadResult))
        { ?>
        <pre><?php
            print_r($row);?></pre>

        <?php
        }
        ?>
</body>
</html>
