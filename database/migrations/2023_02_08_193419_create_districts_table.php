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
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_id');
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->string('name')->unique();
            $table->string('bn_name')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::table('districts')->insert([

//            array('id' => '1','division_id' => '1','name' => 'Dhaka','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '2','division_id' => '1','name' => 'Kishoreganj','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '3','division_id' => '1','name' => 'Narayanganj','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '4','division_id' => '1','name' => 'Munshiganj','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '5','division_id' => '1','name' => 'Narsingdi','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '6','division_id' => '1','name' => 'Gazipur','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '7','division_id' => '1','name' => 'Rajbari','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '8','division_id' => '1','name' => 'Faridpur','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '9','division_id' => '1','name' => 'Madaripur','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '10','division_id' => '1','name' => 'Shariatpur','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '11','division_id' => '1','name' => 'Gopalganj','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '12','division_id' => '1','name' => 'Manikganj','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '13','division_id' => '1','name' => 'Tangail','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '14','division_id' => '2','name' => 'Bandarban','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '15','division_id' => '2','name' => 'Brahmanbaria','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '16','division_id' => '2','name' => 'Chandpur','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '17','division_id' => '2','name' => 'Chattogram','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '18','division_id' => '2','name' => 'Comilla','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '19','division_id' => '2','name' => 'Cox\'s Bazar','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '20','division_id' => '2','name' => 'Feni','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '21','division_id' => '2','name' => 'Noakhali','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '22','division_id' => '2','name' => 'Khagrachari','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '23','division_id' => '2','name' => 'Lakshmipur','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '24','division_id' => '2','name' => 'Rangamati','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '25','division_id' => '3','name' => 'Barguna','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '26','division_id' => '3','name' => 'Barishal','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '27','division_id' => '3','name' => 'Bhola','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '28','division_id' => '3','name' => 'Jhalokati','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '29','division_id' => '3','name' => 'Patuakhali','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '30','division_id' => '3','name' => 'Pirojpur','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '31','division_id' => '4','name' => 'Bagerhat','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '32','division_id' => '4','name' => 'Chuadanga','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '33','division_id' => '4','name' => 'Jashore','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '34','division_id' => '4','name' => 'Jhenaidah','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '35','division_id' => '4','name' => 'Khulna','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '36','division_id' => '4','name' => 'Kushtia','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '37','division_id' => '4','name' => 'Magura','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '38','division_id' => '4','name' => 'Meherpur','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '39','division_id' => '4','name' => 'Narail','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '40','division_id' => '4','name' => 'Satkhira','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '41','division_id' => '5','name' => 'Jamalpur','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '42','division_id' => '5','name' => 'Mymensingh','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '43','division_id' => '5','name' => 'Netrakona','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '44','division_id' => '5','name' => 'Sherpur','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '45','division_id' => '6','name' => 'Bogura','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '46','division_id' => '6','name' => 'Chapai Nawabganj','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '47','division_id' => '6','name' => 'Joypurhat','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '48','division_id' => '6','name' => 'Naogaon','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '49','division_id' => '6','name' => 'Natore','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '50','division_id' => '6','name' => 'Pabna','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '51','division_id' => '6','name' => 'Rajshahi','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '52','division_id' => '6','name' => 'Sirajganj','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '53','division_id' => '7','name' => 'Habiganj','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '54','division_id' => '7','name' => 'Moulvibazar','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '55','division_id' => '7','name' => 'Sunamganj','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '56','division_id' => '7','name' => 'Sylhet','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '57','division_id' => '8','name' => 'Dinajpur','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '58','division_id' => '8','name' => 'Gaibandha','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '59','division_id' => '8','name' => 'Kurigram','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '60','division_id' => '8','name' => 'Lalmonirhat','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '61','division_id' => '8','name' => 'Nilphamari','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '62','division_id' => '8','name' => 'Rangpur','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '63','division_id' => '8','name' => 'Thakurgaon','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '64','division_id' => '8','name' => 'Panchagarh','created_at' => '2022-02-23 02:28:38','updated_at' => '2022-02-23 02:28:38'),
//            array('id' => '65','division_id' => '1','name' => 'Dhaka City','created_at' => '2022-03-22 22:04:42','updated_at' => '2022-03-22 22:04:42')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
};
