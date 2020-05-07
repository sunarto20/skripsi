<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyReturnItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('return_items', function(Blueprint $table){
            $table->foreign('borrow_item_id')->references('id')->on('borrow_items')->onDelete('cascade');
            $table->foreign('reciever')->references('id')->on('students')->onDelete('cascade');
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
