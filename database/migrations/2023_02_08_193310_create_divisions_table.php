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
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('bn_name')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::table('divisions')->insert([

//            array('id' => '1','name' => 'Dhaka','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '2','name' => 'Chittagong','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '3','name' => 'Barishal','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '4','name' => 'Khulna','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '5','name' => 'Mymensingh','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '6','name' => 'Rajshahi','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '7','name' => 'Sylhet','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '8','name' => 'Rangpur','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38')

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisions');
    }
};
