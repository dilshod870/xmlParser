<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->string('mark', 300);
            $table->string('model', 1024);
            $table->string('generation', 100);
            $table->year('year');
            $table->unsignedInteger('run');
            $table->string('color', 50);
            $table->string('body_type', 100);
            $table->string('engine_type', 100);
            $table->string('transmission', 100);
            $table->string('gear_type', 100);
            $table->unsignedBigInteger('generation_id');
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
        Schema::dropIfExists('catalogs');
    }
};