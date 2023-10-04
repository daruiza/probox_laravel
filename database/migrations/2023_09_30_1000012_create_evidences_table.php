<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidences', function (Blueprint $table) {
            $table->id();
            $table->string('name', 32)->unique();
            $table->string('file')->nullable();
            $table->string('type')->nullable();
            $table->string('description')->nullable();
            $table->boolean('approved')->default(false);
            $table->boolean('focus')->default(true);
            $table->timestamps();

            $table->unsignedBigInteger('id_task')->nullable();
                $table->foreign('id_task')->references('id')->on('tasks')->onDelete('set null')
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
        Schema::dropIfExists('evidences');
    }
}