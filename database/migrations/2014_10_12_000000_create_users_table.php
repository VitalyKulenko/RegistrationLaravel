<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('userID')->autoIncrement();
            $table->text('firstName');
            $table->text('lastName');
            $table->text('phone');
            $table->string('email')->unique();
            $table->text('country');
            $table->text('title');
            $table->text('description');
            $table->date('date')->default('2022-12-01');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE users ADD photo MEDIUMBLOB");
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
};
