<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->string('location')->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('theme')->nullable();
            $table->string('photo')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('chexk_digit')->unsigned()->nullable();
            $table->string('nacionality');
            $table->date('birthdate')->nullable()->default(null);
            $table->boolean('active')->default(true);

            $table->rememberToken();
            $table->timestamps();

            $table->unsignedBigInteger('rol_id')->nullable();
            $table->foreign('rol_id')
                ->references('id')
                ->on('rols')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->unsignedBigInteger('commerce_id')->nullable();
            $table->foreign('commerce_id')
                ->references('id')
                ->on('commerces')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
