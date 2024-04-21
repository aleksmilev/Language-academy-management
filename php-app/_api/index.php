<?php

require __DIR__ . '/modules/index.php';

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


Route::add('/api/auth/login', function() {
    require __DIR__ . '/api/auth/login.php';
});
Route::add('/api/auth/info', function() {
    require __DIR__ . '/api/auth/info.php';
});

Route::add('/api/courses', function() {
    require __DIR__ . '/api/courses/courses.php';
});
Route::add('/api/course', function() {
    require __DIR__ . '/api/courses/course.php';
});
Route::add('/api/course/sign', function() {
    require __DIR__ . '/api/courses/sign.php';
});

Route::submit();
?>