<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-04-25 16:54
 */
namespace Notadd\Mall\Handlers\Admin\Address;

use Notadd\Foundation\Passport\Abstracts\Handler;
use Notadd\Mall\Models\Address;

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
        $this->success()->withData(Address::query()->get())->withMessage('');
    }
}
