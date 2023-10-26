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

            $table->unsignedBigInteger('rol_id')->nullable();
            $table->unsignedBigInteger('option_id')->nullable();
            $table->foreign('rol_id')->references('id')->on('rols')->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('option_id')->references('id')->on('options')->onDelete('set null')
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