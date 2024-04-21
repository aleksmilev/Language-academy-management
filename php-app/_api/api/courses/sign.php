<?php

$course_id = 0;
$client_id = json_decode($_COOKIE['user_id'])->id;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $course_id = $_POST['course_id'];

    try {        
        $database = System_calls::database_connection();
        $sql = "INSERT INTO `sign` (`course_id`, `client_id`) VALUES ('$course_id', '$client_id');";
        $database->query($sql);

        echo 'success';
    } catch (\Throwable $th) {
        echo 'failed';
    }
}else if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $course_id = $_GET["course_id"];

    $database = System_calls::database_connection();
    $sql = "SELECT
                sign.id AS sign_id,
                client.id AS client_id,
                client.email AS client_email,
                client.first_name AS client_first_name,
                client.last_name AS client_last_name,
                courses.id AS course_id,
                courses.title AS course_title,
                courses.date AS course_date,
                courses.lecturer AS course_lecturer,
                courses.price AS course_price,
                courses.level AS course_level,
                courses.status AS course_status
            FROM
                sign
            INNER JOIN client ON sign.client_id = client.id
            INNER JOIN courses ON sign.course_id = courses.id
            INNER JOIN user ON courses.lecturer = user.id
            WHERE client.id = '$client_id' AND courses.id = '$course_id';"; 

    echo json_encode($database->query($sql));
}

?>