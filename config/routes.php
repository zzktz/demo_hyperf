<?php

declare(strict_types=1);
/**
 * 路由
 */

use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Http\Controllers\Console\HomeController@index');
