<?php



if($_SERVER['REQUEST_METHOD'] === 'GET'){

    $database = System_calls::database_connection();
    $id = $_GET["id"];
    $sql = "SELECT 
                c.id AS course_id,
                c.title AS course_title,
                c.date AS course_date,
                c.description AS course_description,
                c.price AS course_price,
                c.level AS course_level,
                u.email AS lecturer_email,
                u.first_name AS lecturer_first_name,
                u.last_name AS lecturer_last_name
            FROM 
                courses AS c
            INNER JOIN 
                user AS u ON c.lecturer = u.id
            WHERE 
                c.id = '$id';";
    echo json_encode($database->query($sql));

}

?>