<?php
require 'C:\Users\lenovo\Desktop\blog2\vendor\autoload.php';
define("DEBUB_TIME",microtime(true));
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
$router = new AltoRouter();
$router = new App\Router(dirname(__DIR__) . '/views');
$router 
    ->get('/', 'post/index' ,'home')
    ->get('/blog/{[*:slug]-[i:id] = }', 'post/show','post')
    ->get('/blog/category' , 'category/show' , 'category')
    ->run();
