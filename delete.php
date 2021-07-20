<?php include 'functions.php';?>
<?php
    if(isset($_POST['delete'])) {
        $id=$_POST['id'];
        deleteUser($id);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="col-xs-6">
        <form action="delete.php" method="post">
            <div class="form-group">
                <select name="id">

                <?php
                foreach(getList() as $item) {
                    echo "<option value='{$item['id']}'>{$item['name']}</option>";
                }
                ?>

                </select>

            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Delete" name="delete">
            </div>



        </form>
    </div>

</div>
</body>
</html>
