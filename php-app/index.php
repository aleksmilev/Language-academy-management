<?php 

    $request_path = $_SERVER['REQUEST_URI'];
    $path_parts = explode('/', $request_path);
    $first_part = isset($path_parts[1]) ? $path_parts[1] : '';

    if($first_part == 'api'){
        require __DIR__ . '/_api/index.php';
    }else{
        require __DIR__ . '/_src/index.php';
    }

?>