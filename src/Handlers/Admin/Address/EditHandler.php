<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-04-25 17:00
 */
namespace Notadd\Mall\Handlers\Admin\Address;

use Notadd\Foundation\Passport\Abstracts\Handler;
use Notadd\Mall\Models\Address;

/**
 * Class EditHandler.
 */
class EditHandler extends Handler
{
    /**
     * Execute Handler.
     *
     * @throws \Exception
     */
    public function execute()
    {
        $id = $this->request->input('id');
        $address = Address::query()->find($id);
        if ($address) {
            $address->update($this->request->all());
            $this->success()->withMessage('');
        } else {
            $this->withCode(500)->withMessage('');
        }
    }
}
