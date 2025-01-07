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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_no')->unique();
            $table->unsignedTinyInteger('application_type')->default(1)->comment('1=Development Course,2=Course');
            $table->foreignId('trainee_id');
            $table->foreign('trainee_id')->on('trainees')->references('id');

            $table->foreignId('development_course_id')->nullable();
            $table->foreign('development_course_id')->on('development_courses')->references('id');

            $table->foreignId('batch_id')->nullable();

            $table->foreignId('versity_id');
            $table->string('session');
            $table->foreignId('department_id');
            $table->foreignId('semester');
            $table->unsignedTinyInteger('status')->default(1)->comment('0=Canceled, 1=Applied, 2= Approved, 3=Enroll, 4= Rejected, 5=Passed, 6= Failed');

            $table->foreignId('created_by')->comment('trainee ID');
            $table->foreign('created_by')->on('trainees')->references('id');
            $table->softDeletes();
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
        Schema::dropIfExists('applications');
    }
};
