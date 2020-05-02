<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::enableForeignKeyConstraints();
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('description');
            $table->text('status');
            $table->integer('initial_bid');
            $table->integer('current_bid');
            $table->date('start_date');
            $table->date('final_date');
            $table->timestamps();
            //foreign
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
}
