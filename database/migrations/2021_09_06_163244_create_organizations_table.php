<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('subdomain')->unique();
            $table->string('domain')->nullable();
            $table->string('phonenumber')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->uuid('organization_id')->nullable();

            $table->dropUnique('users_email_unique');
            $table->unique(['organization_id', 'email']);

            $table->foreign('organization_id')->references('id')->on('organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('organization_id');
        });

        Schema::dropIfExists('organizations');
    }
}
