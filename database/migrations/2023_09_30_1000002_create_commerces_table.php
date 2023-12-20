<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commerces', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 60)->unique();
            $table->string('phone', 16)->nullable()->default(null);
            $table->string('address', 255)->nullable()->default(null);
            $table->string('description', 1024)->nullable()->default(null);
            $table->string('logo', 255)->nullable()->default(null);
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
        Schema::dropIfExists('commerces');
    }
}
