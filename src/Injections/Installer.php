<?php
/**
 * This file is part of Notadd.
 *
 * @author        Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime      2017-03-22 16:10
 */

namespace Notadd\Shop\Injections;

use Illuminate\Container\Container;
use Notadd\Foundation\Module\Abstracts\Installer as AbstractInstaller;

class Installer extends AbstractInstaller
{
    public function __construct(Container $container)
    {
        parent::__construct($container);

        $this->info->put('errors', '安装商城模块失败！');
        $this->info->put('messages', '安装商城模块成功！');
    }
    /**
     * @return bool
     */
    public function handle()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function require()
    {
        return [];
    }
}
