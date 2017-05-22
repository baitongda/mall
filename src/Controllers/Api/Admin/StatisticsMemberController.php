<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-05-22 17:10
 */
namespace Notadd\Mall\Controllers\Api\Admin;

use Notadd\Foundation\Routing\Abstracts\Controller;
use Notadd\Mall\Handlers\Admin\Statistics\Member\MemberHandler;

/**
 * Class StatisticsMemberController.
 */
class StatisticsMemberController extends Controller
{
    /**
     * @param \Notadd\Mall\Handlers\Admin\Statistics\Member\MemberHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     * @throws \Exception
     */
    public function member(MemberHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }
}
