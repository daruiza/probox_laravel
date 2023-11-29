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
            $table->string('address', 512)->nullable();
            $table->string('location', 128)->nullable()->default(null);
            $table->string('quotation', 512)->nullable();
            $table->string('goal', 1024)->nullable();
            $table->string('logo')->nullable();
            $table->string('photo')->nullable();
            $table->string('description',1024)->nullable();
            $table->boolean('focus')->default(false);
            $table->boolean('active')->default(false);
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