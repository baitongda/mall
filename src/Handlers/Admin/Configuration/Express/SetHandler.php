<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-05-08 17:42
 */
namespace Notadd\Mall\Handlers\Admin\Configuration\Express;

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
