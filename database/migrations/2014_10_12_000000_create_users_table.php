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
            $table->bigIncrements('id');
            $table->text('lastName')->nullable();
            $table->text('name')->nullable();
            $table->text('patronimicName')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('city')->nullable();
            $table->dateTime('registrationDate')->nullable();
            $table->text('code')->nullable();
            $table->boolean('active')->default(0);
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
