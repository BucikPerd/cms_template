<?php include 'functions.php'; ?>
<?php
session_start();
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    updateUser($username, $password, $id);

}
//echo $_SESSION['podsos'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="col-xs-6">
        <form action="update.php" method="post">
            <div class="form-group">
                <label for="username">Username</label><br>
                <input type="text" name="username" placeholder="Enter Username" class="form-group">
            </div>
            <div class="form-group">
                <label for="password">Password</label><br>
                <input type="password" name="password" placeholder="Enter Password" class="from-group"><br>
            </div>
            <div class="from-group">
                <select name="id" id="">
                    <?php
                    foreach (getList() as $item) {
                        echo "<option value='{$item['id']}'>{$item['name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="update" value="Update" class="btn btn-primary">
            </div>

        </form>
    </div>

</div>

</body>
</html>
