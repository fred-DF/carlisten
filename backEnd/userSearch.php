<?php

require_once __DIR__.'/../bootstrap.php';
Auth::auth();

$pdo = connect();

if (isset($_POST['query'])) {
    $query = '%' . $_POST['query'] . '%';
    $stmt = $pdo->prepare('SELECT * FROM user WHERE 
        `ID` LIKE "'.$query.'" OR 
        `title` LIKE "'.$query.'" OR 
        `first name` LIKE "'.$query.'" OR 
        `last name` LIKE "'.$query.'" OR 
        `second title` LIKE "'.$query.'" OR 
        CONCAT(`title`, " ", `first name`, " ", `last name`) LIKE "'.$query.'" OR
        CONCAT(`title`, " ", `first name`, " ") LIKE "'.$query.'" OR
        CONCAT(`first name`, " ", `last name`) LIKE "'.$query.'" OR
        `name day` LIKE "'.$query.'" OR 
        `profile pic url` LIKE "'.$query.'" OR 
        `private_street` LIKE "'.$query.'" OR 
        `private_house_number` LIKE "'.$query.'" OR 
        `private_plz` LIKE "'.$query.'" OR 
        `private_city` LIKE "'.$query.'" OR 
        `private_country` LIKE "'.$query.'" OR 
        `private_telephone` LIKE "'.$query.'" OR 
        `private_mobile` LIKE "'.$query.'" OR 
        `private_web` LIKE "'.$query.'" OR 
        `private_email` LIKE "'.$query.'" OR 
        `professional_company` LIKE "'.$query.'" OR 
        `professional_job` LIKE "'.$query.'" OR 
        `professional_street` LIKE "'.$query.'" OR 
        `professional_housenumber` LIKE "'.$query.'" OR 
        `professional_plz` LIKE "'.$query.'" OR 
        `professional_city` LIKE "'.$query.'" OR 
        `professional_country` LIKE "'.$query.'" OR 
        `professional_telephone` LIKE "'.$query.'" OR 
        `professional_mobile` LIKE "'.$query.'" OR 
        `professional_web` LIKE "'.$query.'" OR 
        `professional_email` LIKE "'.$query.'"');
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);
}
