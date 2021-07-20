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
    $result = mysqli_query($connection, "SELECT * FROM login");
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
    $mysqlQueryDelete = "DELETE FROM login ";
    $mysqlQueryDelete .= "WHERE id =$id";
    mysqli_query($connection, $mysqlQueryDelete);
}

function addUser($username, $password)
{
    $connection = getConnection();
    $mysqlQueryCreate = "INSERT INTO login(username, password) ";
    $mysqlQueryCreate .= "VALUES ('$username', '$password')";
    mysqli_query($connection, $mysqlQueryCreate);
}

function updateUser($username, $password, $id)
{
    $connection = getConnection();
    $query = "UPDATE login SET ";
    $query .= "username='$username', ";
    $query .= "password='$password' ";
    $query .= "WHERE id=$id";
    mysqli_query($connection, $query);
}
