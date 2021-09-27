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
            $table->uuid('id')->primary();
            $table->uuid('order_id');
            $table->uuid('reservation_type_id');
            $table->dateTime('date')->nullable();
            $table->integer('participants')->nullable();
            $table->integer('accompanists')->nullable();
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('reservation_type_id')->references('id')->on('reservation_types');
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
