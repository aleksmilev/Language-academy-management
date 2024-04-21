<?php
$client_id = json_decode($_COOKIE['user_id'])->id;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_first_name = $_POST['first_name'];
    $new_last_name = $_POST['last_name'];
    $new_password = $_POST['password'];

    try {
        $database = System_calls::database_connection();

        $sql = "UPDATE `client` SET `first_name` = '$new_first_name', `last_name` = '$new_last_name', `password` = '$new_password' WHERE `id` = '$id';";
        // $database->query($sql);

        $sql_account = "SELECT * FROM `client` WHERE `id` = '$client_id';";
        $accounts = $database->query($sql_account);
        setcookie("user_id", json_encode($accounts[0]), time() + 3600, "/");
        echo 'Вие успешно променихте вашия профил!';

    } catch (\Throwable $th) {
        echo 'Нещо се обърка.Моля опитайте по-късно.';
    }
}else if($_SERVER['REQUEST_METHOD'] === 'GET') {
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
            WHERE client.id = '$client_id';"; 

    echo json_encode($database->query($sql));
}

?>