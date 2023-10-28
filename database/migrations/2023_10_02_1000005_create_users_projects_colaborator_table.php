<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersProjectsColaboratorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_project_colaborator', function (Blueprint $table) {
            $table->id('id');
            $table->string('activity_rol', 32)->nullable();
            $table->date('date_start')->nullable()->default(null);
            $table->date('date_departure')->nullable()->default(null);
            $table->string('recommended', 64)->nullable();
            $table->string('boss_name', 64)->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null')
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
        Schema::dropIfExists('user_project_colaborator');
    }
}