<?php

require __DIR__ . '/connection.php';

class System_Calls{
    public static function Database_Connection(){ // connection.php            
        return new connection();
    }
}

?>