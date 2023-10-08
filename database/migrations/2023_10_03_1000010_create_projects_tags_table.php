<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_tags', function (Blueprint $table) {
            $table->id('id');
            
            $table->unsignedBigInteger('id_tag')->nullable();
            $table->unsignedBigInteger('id_project')->nullable();
            $table->foreign('id_tag')->references('id')->on('tags')->onDelete('set null')
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
        Schema::dropIfExists('projects_tags');
    }
}