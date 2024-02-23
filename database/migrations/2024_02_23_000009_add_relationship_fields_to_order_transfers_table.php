<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrderTransfersTable extends Migration
{
    public function up()
    {
        Schema::table('order_transfers', function (Blueprint $table) {
            $table->unsignedBigInteger('request_by_id')->nullable();
            $table->foreign('request_by_id', 'request_by_fk_9526859')->references('id')->on('users');
            $table->unsignedBigInteger('approver_by_id')->nullable();
            $table->foreign('approver_by_id', 'approver_by_fk_9526860')->references('id')->on('users');
        });
    }
}
