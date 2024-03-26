<?php
//it allows any type of database.

define("serverName", "localhost:3306");
define("database", "net24yhuet_oefentoetsNetwerken");
define("username", "net24yhuet");
define("password", "}p@hCauYq{M0");
define("connectionString", "mysql:host=" . serverName . ";dbname=" . database);

function getConnection()
{
    try {
        $connection = new PDO(connectionString, username, password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (PDOException $exception) {
        echo "Connection failed: " . $exception->getMessage();
    }
}

function query($query, $connection)
{
    if (!isset($connection)) {
        throw new PDOException("Connection not established");
    }
    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt;
}

$connection = null; //Closing connection.