<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-05-03 12:18
 */
namespace Notadd\Mall\Handlers\Admin\Configuration\Advertisement\Position;

use Notadd\Foundation\Passport\Abstracts\Handler;
use Notadd\Mall\Models\AdvertisementPosition;

/**
 * Class RemoveHandler.
 */
class RemoveHandler extends Handler
{
    /**
     * Execute Handler.
     *
     * @throws \Exception
     */
    public function execute()
    {
        $id = $this->request->input('id');
        $position = AdvertisementPosition::query()->find($id);
        if ($position) {
            $position->delete();
            $this->success()->withMessage('');
        } else {
            $this->withCode(500)->withError('');
        }
    }
}
