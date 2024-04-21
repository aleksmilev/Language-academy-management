<?php

if($_SERVER['REQUEST_METHOD'] === 'GET'){

    $database = System_calls::database_connection();
    $sql = "SELECT * FROM `courses`;";
    echo json_encode($database->query($sql));

}


?>