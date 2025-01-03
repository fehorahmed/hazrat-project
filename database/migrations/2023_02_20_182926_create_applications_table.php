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
            $table->foreignId('trainee_id');
            $table->foreign('trainee_id')->on('trainees')->references('id');
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('address');
            $table->string('image')->nullable();
            $table->foreignId('division_id');
            //            $table->foreign('division_id')->on('divisions')->references('id');
            $table->foreignId('district_id');
            //            $table->foreign('district_id')->on('districts')->references('id');
            $table->foreignId('upazila_id');
            //            $table->foreign('upazila_id')->on('upazilas')->references('id');
            $table->foreignId('present_division_id');
            $table->foreignId('present_district_id');
            $table->foreignId('present_upazila_id');
            $table->string('present_address');
            $table->foreignId('course_id');
            $table->foreign('course_id')->on('courses')->references('id');
            $table->string('mobile');
            $table->string('blood_group');

            $table->foreignId('versity_id');
            $table->string('session');
            $table->foreignId('department_id');
            $table->foreignId('semester');


            $table->unsignedTinyInteger('status')->default(1)->comment('0=Canceled, 1=Applied, 2= Approved, 3=Enroll, 4= Rejected, 5=Passed, 6= Failed');
            $table->foreignId('created_by')->comment('trainee ID');
            $table->foreign('created_by')->on('trainees')->references('id');
            $table->foreignId('updated_by')->nullable()->comment('Admin ID');
            $table->foreignId('confirmed_by')->nullable()->comment('Admin ID');
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
