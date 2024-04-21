<?php

class Route {
    private static $routes = [];

    public static function add($uri, $callback) {
        self::$routes[$uri] = $callback;
    }

    public static function submit() {
        $requestedUri = explode('?', $_SERVER['REQUEST_URI'])[0];
        
        if (isset(self::$routes[$requestedUri])) {
            $callback = self::$routes[$requestedUri];
            call_user_func($callback);
        } else {
            echo '<script>window.location.href = "/"</script>'; 
        }
    }
}

Route::add('/', function() {
    require __DIR__ . '/home/home.php';
});

Route::add('/about_us', function() {
    require __DIR__ . '/info/about_us.html';
});

Route::add('/courses/list', function() {
    require __DIR__ . '/courses/list.html';
});
Route::add('/courses/single', function() {
    require __DIR__ . '/courses/single.html';
});
Route::add('/courses/invoice', function() {
    require __DIR__ . '/courses/invoice.html';
});

Route::add('/profile/logout', function() {
    echo '<script>document.cookie = "user_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";</script>';
    echo '<script>window.location.href = "/"</script>';
});
Route::add('/profile/info', function() {
    require __DIR__ . '/account/info.php';
});
Route::add('/profile/login', function() {
    require __DIR__ . '/auth/login/login.html';
});
Route::add('/profile/register', function() {
    require __DIR__ . '/auth/register/register.html';
});

// about_us



Route::submit();
?>