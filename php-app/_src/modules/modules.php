<?php
    require __DIR__ . '/image/module.php';
    require __DIR__ . '/auth/module.php';

    class Modules
    {
        public static function ImageModule(){
            return new ImageModule();
        }

        public static function AuthModule(){
            return new AuthModule();
        }
    }
?>