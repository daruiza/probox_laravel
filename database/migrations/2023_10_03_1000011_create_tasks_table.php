<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 32)->unique();
            $table->string('description')->nullable();
            $table->date('date_init')->nullable()->default(null);
            $table->date('date_closed')->nullable()->default(null);
            $table->boolean('focus')->default(true);
            $table->timestamps();

            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('task_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('set null')
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
        Schema::dropIfExists('tasks');
    }
}