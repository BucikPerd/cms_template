<?php
function getConnection(): mysqli
{
    $connection = mysqli_connect('localhost', 'admin', '12345678', 'test');
    if (!$connection) {
        die(mysqli_error($connection));
    }
    return $connection;
}

function getList(): array
{
    $connection = getConnection();
    $result = $connection->query("SELECT * FROM login");
    $items = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $item = [
            'id' => $row['id'],
            'name' => $row['username']
        ];
        $items[] = $item;
    }
    return $items;
}

function deleteUser($id)
{
    $connection = getConnection();
    $connection->real_escape_string($id);
//    $mysqlQueryDelete = "DELETE FROM login ";
//    $mysqlQueryDelete .= "WHERE id =$id";
    $mysqlQueryDelete = sprintf("DELETE FROM login WHERE id=%d", $id);
    $connection->query($mysqlQueryDelete);
}

function addUser($username, $password)
{
    $connection = getConnection();
    $connection->real_escape_string($username);
    $connection->real_escape_string($password);
//    $mysqlQueryCreate = "INSERT INTO login(username, password) ";
//    $encryptedPassword=passwordEncryption($password);
//    $mysqlQueryCreate .= "VALUES ('$username', '$encryptedPassword')";
    $mysqlQueryCreate = sprintf("INSERT INTO login(username, password) VALUES ('%s', '%s')",
        $username,
        passwordEncryption($password)
    );

    $connection->query($mysqlQueryCreate);
}

function updateUser($username, $password, $id)
{
    $connection = getConnection();
    $connection->real_escape_string($username);
    $connection->real_escape_string($password);
    $connection->real_escape_string($id);
//    $encryptedPassword = passwordEncryption($password);
//    $query = "UPDATE login SET ";
//    $query .= "username='$username', ";
//    $query .= "password='$encryptedPassword' ";
//    $query .= "WHERE id=$id";
    $query = sprintf("UPDATE login SET username='%s', password='%s' WHERE id=%d",
        $username,
        passwordEncryption($password),
        $id
    );
    $connection->query($query);
}

function passwordEncryption($password): string
{
    $options = [
        'cost' => 11,
    ];
    return password_hash($password, PASSWORD_BCRYPT, $options);
}

function settingCookies()
{
    setcookie(
        "COCKie",
        "Podsos = clown",
        time() + 60 * 60 * 24 * 7
    );
    if (isset($_COOKIE['COCKie'])) {
        return $someOne = $_COOKIE['COCKie'];
    }
}
function sessionUse()
{
    session_start();
    $_SESSION['podsos']="Zhret kal";
}
