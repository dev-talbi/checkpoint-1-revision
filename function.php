<?php
include 'connec.php';

function getConnection()
{
    return new PDO(DSN, USER, PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}

function getAll()
{
    $statement = getConnection()->query("SELECT * FROM bribe ORDER BY NAME");
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getTotal()
{
    $statement = getConnection()->query("SELECT SUM(payement) AS total FROM bribe;");
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}


// CREATE ARTICLE
function createArticle(array $data)
{
    $pdo = getConnection();
    $query = "INSERT INTO bribe (name, payement) VALUES (:name, :payement)";
 
        $sendRequest = $pdo->prepare($query);
        $sendRequest->bindValue(':name', $data['name'], PDO::PARAM_STR);
        $sendRequest->bindValue(':payement', $data['payement'], PDO::PARAM_STR);
        $sendRequest->execute();
        header('Location: http://localhost:8000/index.php');
} 
