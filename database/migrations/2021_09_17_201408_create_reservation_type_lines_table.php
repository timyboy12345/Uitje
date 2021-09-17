<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTypeLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_type_lines', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('reservation_type_id');
            $table->string('label');
            $table->string('description')->nullable();
            $table->string('placeholder')->nullable();
            $table->string('type')->default('text');
            $table->boolean('isRequired')->default(true);
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
        Schema::dropIfExists('reservation_type_lines');
    }
}
