<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProductInfo', function (Blueprint $table) {
            $table->increments('ProductID');
            $table->string('ProductName', 25);
            $table->char('Genre', 2);
            $table->string('Maker', 20);
            $table->integer('SellingPrice');
            $table->string('ProductDetail', 200)->nullable();
            $table->string('ProductImg')->nullable();
            $table->char('DeleteFlg', 1)->default('0');
            $table->timestamp('InsertDate')->useCurrent();
            $table->timestamp('UpdateDate')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ProductInfo');
    }
}
