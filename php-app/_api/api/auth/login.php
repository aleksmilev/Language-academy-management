<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['email'];
    $password = $_POST['password'];

    $database = System_Calls::Database_Connection();

    $client_sql = "SELECT * FROM `client` WHERE `email` = '$username' AND `password` = '$password';";
    $user_sql = "SELECT * FROM `user` WHERE `email` = '$username' AND `password` = '$password';";

    $accounts = array();

    foreach ($database->query($client_sql) as &$row) { $accounts[] = $row; }
    foreach ($database->query($user_sql) as &$row) { $accounts[] = $row; }

    if(empty($accounts)){
        echo 'rejected';
    }else{
        setcookie("user_id", json_encode($accounts[0]), time() + 3600, "/");

        echo 'success';
    }
}
?>