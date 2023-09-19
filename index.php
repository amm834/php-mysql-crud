<?php


function databaseConnection()
{
    $username = "root";
    $password = "";
    $db_host = "localhost:3306";
    $db_name = "some";
    try {
        return mysqli_connect($db_host, $username, $password, $db_name);
    } catch (Exception $e) {
        echo $e->getMessage();
        die(1);
    }
}


function getAllUsers()
{
    $connection = databaseConnection();
    $result = mysqli_query($connection, "SELECT * FROM users");
    $rows = $result->fetch_all();


    foreach ($rows as $row) {
        echo "<pre>";
        print_r($row);
    }
}


function insertUser($name)
{
    $connection = databaseConnection();
    $query = "INSERT INTO users (name) VALUES ('$name')";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "User inserted successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}
insertUser("John Doe");