<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pois', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('shortname')->nullable();
            $table->string('description')->nullable();
            $table->string('content')->nullable();
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->float('entrance_lat')->nullable();
            $table->float('entrance_lng')->nullable();
            $table->boolean('is_enabled')->default(true);

            $table->uuid('organization_id');
            $table->foreign('organization_id')->references('id')->on('organizations');

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
        Schema::dropIfExists('pois');
    }
}
