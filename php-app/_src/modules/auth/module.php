<?php


    class AuthModule {

        public function Login_Chack() {
            if (isset($_COOKIE['user_id'])) {
                return true;
            }

            return false;
        }
    }

?>