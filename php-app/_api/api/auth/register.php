<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
        
    $database = System_calls::database_connection();
    
    $exists = "SELECT * FROM `client` WHERE `email` = '$username' AND `password` = '$password';";
    $exists_result = $database->query($exists);
    
    if(empty($exists_result)){
        $sql = "INSERT INTO `client` (`email`, `password`, `first_name`, `last_name`, ` courses_taken`) VALUES ('$email', '$password', '$first_name', '$last_name', '[]');";
        $database->query($sql);
        echo 'accepted';
    }else{
        echo 'rejected';
    }    
}


?>