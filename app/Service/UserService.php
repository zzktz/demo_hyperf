<?php
/**
 * Date: 2019/10/21 0021
 * Time: 10:54
 */
namespace App\Service;


use App\Model\User;

use Hyperf\DbConnection\Db;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Utils\ApplicationContext;

class UserService extends Service
{


  /**
   * 获取系统用户信息
   * @param $userId
   * @return mixed
   */
  public static function getUserData($userId)
  {
    $model = User::query()->where('id', $userId)->first();
    return $model;
  }





}