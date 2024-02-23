<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTransfersTable extends Migration
{
    public function up()
    {
        Schema::create('order_transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('item');
            $table->date('date_request');
            $table->datetime('date_processed')->nullable();
            $table->longText('cost_center')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
