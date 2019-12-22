<?php
/**
 * 基础权限
 */

namespace App\Http\Controllers;


use Validator;

class BaseAuth
{

  /**
   *  用于API获取用户身份信息
   */
  public static function getUserInfo($request)
  {
    $requdata   = $request->all();
    $head_token = $request->header('Access-Token');
    if ($head_token) {
      $token = $head_token;
    } else {
      $is_token = array_key_exists("token", $requdata);
      if ($is_token == false) {
        self::error(401, 'Token filed does not exit');
      }
      if (!$requdata['token']) {
        self::error(401, 'Token value does not exit');
      }
      $token = $requdata['token'];
    }
    $info = Account::where('api_token', '=', $token)->get()->first()->toArray();
    if (!$info) {
      self::error(401, 'Token error');
    }
    $expire_time = $info['expire_time'];
    if ($expire_time < time()) {
      self::error(401, 'Token expired');
    }
    unset($info['api_token']);
    unset($info['password']);
    $account_id = $info['id'];
    $path       = $request->path();
    //self::checkPermission($account_id, $path);
    return $info;
  }

  /**
   *  从 request 获取字段值并验证
   */
  public static function getValue($request, $field, $fieldName = '', $validateRule = '', $mode = 'json')
  {
    $fieldName = $fieldName ? $fieldName : $field;
    if ($validateRule) {
      $validator = Validator::make($request->all(), [$field => $validateRule], [], [$field => $fieldName]);
      if ($validator->fails()) {
        ($mode != 'json') ? error('404') : ejson($validator->errors()->first());
      }
    }
    return $request[$field];
  }

  public static function error($code, $msg = '')
  {
    header("HTTP/1.1 " . $code . " OK");
    $array['code']      = $code;
    $array['message']   = $msg;
    $array['result']    = 0;
    $array['timestamp'] = time();
    exit(json_encode($array, JSON_UNESCAPED_UNICODE));
  }

}
