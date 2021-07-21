<?php
function getConnection(): mysqli {
    $connection = mysqli_connect('localhost', 'admin', '12345678', 'test');
    if (!$connection) {
        die(mysqli_error($connection));
    }
    return $connection;
}

function getList(): array {
    $connection = getConnection();
    $result=$connection->query("SELECT * FROM login");
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

function deleteUser($id) {
    $connection = getConnection();
    $connection->real_escape_string($id);
    $mysqlQueryDelete = "DELETE FROM login ";
    $mysqlQueryDelete .= "WHERE id =$id";
    $connection->query($mysqlQueryDelete);
}

function addUser($username, $password) {
    $connection = getConnection();
    $connection->real_escape_string($username);
    $connection->real_escape_string($password);
    $mysqlQueryCreate = "INSERT INTO login(username, password) ";
    $mysqlQueryCreate .= "VALUES ('$username', '$password')";
    $connection->query($mysqlQueryCreate);
}

function updateUser($username, $password, $id) {
    $connection = getConnection();
    $connection->real_escape_string($username);
    $connection->real_escape_string($password);
    $connection->real_escape_string($id);
    $query = "UPDATE login SET ";
    $query .= "username='$username', ";
    $query .= "password='$password' ";
    $query .= "WHERE id=$id";
    $connection->query($query);
}
