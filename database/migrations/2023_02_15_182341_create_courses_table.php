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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedTinyInteger('course_type')->default(1)->comment('1=General Course, 2=Development Course');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('course_code')->unique();
            $table->unsignedInteger('course_fee')->nullable();
            $table->unsignedInteger('first_installment')->nullable();
            $table->string('slug')->unique();
            $table->longText('text')->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedTinyInteger('serial')->default(1);
            $table->foreignId('created_by');
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
        Schema::dropIfExists('courses');
    }
};
