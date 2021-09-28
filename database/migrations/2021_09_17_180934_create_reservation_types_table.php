<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('description');
            $table->string('type')->default('reservation');
            $table->text('slug');
            $table->string('date_type')->nullable();
            $table->boolean('has_participants')->default(false);
            $table->boolean('has_accompanists')->default(false);
            $table->double('price')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });

        Schema::create('reservation_type_reservation_type', function(Blueprint $table) {
            $table->uuid('parent_id');
            $table->uuid('child_id');

            $table->primary(['parent_id', 'child_id']);

            $table->foreign('parent_id')->references('id')->on('reservation_types');
            $table->foreign('child_id')->references('id')->on('reservation_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_type_reservation_type');
        Schema::dropIfExists('reservation_types');
    }
}
