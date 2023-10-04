<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersProjectsCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_project_customer', function (Blueprint $table) {
            $table->id('id');
            $table->boolean('is_owner')->default(true);
            $table->timestamps();

            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_project')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('id_project')->references('id')->on('projects')->onDelete('set null')
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
        Schema::dropIfExists('user_project_customer');
    }
}