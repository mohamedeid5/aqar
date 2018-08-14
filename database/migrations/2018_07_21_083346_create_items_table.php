<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->string('city');
            $table->string('location');
            $table->string('space')->nullable();
            $table->string('rooms')->nullable();
            $table->string('pathroom')->nullable();
            $table->string('flat')->nullable();
            $table->string('takseet')->nullable();
            $table->string('tashteeb')->nullable();
            $table->string('tajeer')->nullable();
            $table->integer('sttaus')->default(0);
            $table->integer('code');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
