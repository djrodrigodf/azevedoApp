<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('order_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_name');
            $table->integer('amount');
            $table->date('required_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
