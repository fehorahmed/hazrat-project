<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bn_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('bn_father_name');
            $table->string('bn_mother_name');

            $table->string('trainee_code')->unique();
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('nid')->nullable();
            $table->string('password');

            $table->string('photo')->nullable();
            $table->string('signature')->nullable();
            $table->foreignId('versity_id');
            $table->string('session');
            $table->foreignId('department_id');
            $table->foreignId('semester');

            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('trainees');
    }
};
