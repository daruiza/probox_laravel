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
            
            $table->unsignedBigInteger('tag_id')->nullable();            
            $table->unsignedBigInteger('project_id')->nullable();
            $table->timestamps();


            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('set null')
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
        Schema::dropIfExists('projects_tags');
    }
}