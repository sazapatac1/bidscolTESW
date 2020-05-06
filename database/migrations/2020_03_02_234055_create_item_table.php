<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations item.
     *
     * @return void
     */
    public function up()
    {
        //Schema::enableForeignKeyConstraints();
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255);
            $table->string('description',255);
            $table->string('status',10);
            $table->integer('initial_bid');
            $table->integer('final_bid')->default(0);
            $table->integer('winner')->default(0);
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
