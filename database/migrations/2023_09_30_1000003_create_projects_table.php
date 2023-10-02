<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 256)->nullable();
            $table->unsignedBigInteger('price')->unsigned()->nullable();
            $table->date('date_init')->nullable()->default(null);
            $table->date('date_closed')->nullable()->default(null);
            $table->string('address')->unique();
            $table->string('quotion', 512)->nullable();
            $table->string('goal')->nullable();
            $table->string('description')->nullable();
            $table->boolean('focus')->default(true);
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('projects');
    }
}