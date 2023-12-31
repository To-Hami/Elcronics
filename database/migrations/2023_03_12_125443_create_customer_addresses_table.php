<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressesTable extends Migration
{

    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('type',45);
            $table->string('address1',255);
            $table->string('address2',255);
            $table->string('city',255 )->nullable();
            $table->string('zipcode',45);
            $table->string('country_code',3);
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->foreign('country_code')->references('code')->on('countries');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('custommer_addresses');
    }
}
