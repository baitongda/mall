<?php
/**
 * This file is part of Notadd.
 *
 * @datetime 2017-05-09 13:55:59
 */

use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

/**
 * Class CreateMallShopDynamicsTable.
 */
class CreateMallShopDynamicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('mall_shop_dynamics', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content')->nullable();
            $table->integer('shop_id');
            $table->tinyInteger('show')->default(0);
            $table->string('title');
            $table->integer('user_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->drop('mall_shop_dynamics');
    }
}
