<?php

declare(strict_types=1);
/**
 * 首页
 */
namespace App\Http\Controllers\Console;

use App\Service\UserService;
use App\Http\Controllers\Controller;
class HomeController extends Controller
{
  public function index()
  {
    $user   = $this->request->input('user', 'Hyperf');
    $method = $this->request->getMethod();
    $data   = UserService::getUserData(1);
    return $data;
    //var_dump($this->request);
//    echo 'ssssssssss';
//    return [
//      'method'  => $method,
//      'message' => "Hello {$user}.",
//    ];
  }
}
