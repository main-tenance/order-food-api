<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('restrict');
            $table->unsignedBigInteger('dish_id');
            $table->foreign('dish_id')
                ->references('id')
                ->on('dishes')
                ->onDelete('restrict');
            $table->unsignedInteger('quantity');
            $table->unsignedFloat('price', 7, 2);
            $table->timestamps();
            $table->unique(['order_id', 'dish_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_lines');
    }
}
