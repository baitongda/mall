<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-05-03 11:55
 */
namespace Notadd\Mall\Handlers\Admin\Configuration\Advertisement;

use Notadd\Foundation\Passport\Abstracts\Handler;
use Notadd\Mall\Models\Advertisement;

/**
 * Class ListHandler.
 */
class ListHandler extends Handler
{
    /**
     * Execute Handler.
     *
     * @throws \Exception
     */
    protected function execute()
    {
        $builder = Advertisement::query();
        $this->success()->withData($builder->get())->withMessage('');
    }
}
