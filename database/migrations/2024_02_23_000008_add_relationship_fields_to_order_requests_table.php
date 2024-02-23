<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrderRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('order_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('requester_id')->nullable();
            $table->foreign('requester_id', 'requester_fk_9526850')->references('id')->on('users');
        });
    }
}
