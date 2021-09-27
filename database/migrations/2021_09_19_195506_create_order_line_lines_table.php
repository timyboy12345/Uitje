<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLineLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_line_lines', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('order_line_id');
            $table->uuid('reservation_type_line_id');
            $table->text('value')->nullable();
            $table->json('data')->nullable();
            $table->timestamps();

            $table->foreign('order_line_id')->references('id')->on('order_lines');
            $table->foreign('reservation_type_line_id')->references('id')->on('reservation_type_lines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_line_lines');
    }
}
