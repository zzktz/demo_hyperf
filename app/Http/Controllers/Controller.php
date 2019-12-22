<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Http\Controllers;

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Container\ContainerInterface;

abstract class Controller
{
  /**
   * @Inject
   * @var ContainerInterface
   */
  protected $container;

  /**
   * @Inject
   * @var RequestInterface
   */
  protected $request;

  /**
   * @Inject
   * @var ResponseInterface
   */
  protected $response;
}
