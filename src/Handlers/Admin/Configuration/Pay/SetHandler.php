<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-05-03 16:09
 */
namespace Notadd\Mall\Handlers\Admin\Configuration\Pay;

use Notadd\Foundation\Passport\Abstracts\SetHandler as AbstractSetHandler;

/**
 * Class SetHandler.
 */
class SetHandler extends AbstractSetHandler
{
    /**
     * Execute Handler.
     *
     * @throws \Exception
     */
    public function execute()
    {
        $this->withCode(200)->withMessage('');
    }
}
