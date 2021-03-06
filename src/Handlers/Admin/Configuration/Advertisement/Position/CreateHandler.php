<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-05-03 12:15
 */
namespace Notadd\Mall\Handlers\Admin\Configuration\Advertisement\Position;

use Notadd\Foundation\Passport\Abstracts\Handler;
use Notadd\Mall\Models\AdvertisementPosition;

/**
 * Class CreateHandler.
 */
class CreateHandler extends Handler
{
    /**
     * Execute Handler.
     *
     * @throws \Exception
     */
    public function execute()
    {
        if (AdvertisementPosition::query()->create($this->request->all())) {
            $this->success()->withMessage('');
        } else {
            $this->withCode(500)->withError('');
        }
    }
}
