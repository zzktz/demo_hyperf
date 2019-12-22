<?php

declare(strict_types=1);

namespace App\Model;
/**
 * @property int $user_id
 * @property string $username
 */
use Hyperf\DbConnection\Model\Model as BaseModel;
class User extends BaseModel
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'user';
  protected $guarded = []; //不可以注入的数据字段

}
