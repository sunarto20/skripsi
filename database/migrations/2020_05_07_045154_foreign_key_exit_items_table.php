<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyExitItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exit_items', function(Blueprint $table){
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('incoming_item_id')->references('id')->on('incoming_items')->onDelete('cascade');
            $table->foreign('giver')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
