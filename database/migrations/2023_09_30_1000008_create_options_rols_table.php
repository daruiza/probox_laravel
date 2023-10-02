<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options_rols', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 32)->nullable();
            $table->string('description')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->unsignedBigInteger('id_rol')->nullable();
            $table->unsignedBigInteger('id_option')->nullable();
            $table->foreign('id_rol')->references('id')->on('rols')->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('id_option')->references('id')->on('options')->onDelete('set null')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options_rols');
    }
}