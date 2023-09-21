<?php

function connect() {
    $host = "mysql09.manitu.net";
    $dbname = "db90833";
    $user = "u90833";
    $pass = "dv4JBwym4KgkSpP6";

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        return $pdo;
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}

function select($query, $params = []) {
    $pdo = connect();
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $result = $stmt->fetchAll();
    return $result;
}

function execute($query, $params = []) {    
    $pdo = connect();
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $result = $stmt->rowCount();
    return $result;
}
