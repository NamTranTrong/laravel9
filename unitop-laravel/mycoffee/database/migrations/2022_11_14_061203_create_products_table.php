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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pro_name')->nullable();
            $table->string('pro_slug')->index();
            $table ->integer('pro_category_id')->index()->default(0);
            $table->integer('pro_price')->default(0);
            $table->integer('pro_author_id')->default(0)->index();
            $table->tinyInteger('pro_sale')->default(0);
            $table->integer('pro_view')->default(0);
            $table->string('avatar')->nullable();
            $table->tinyInteger('pro_active')->default(1)->index();
            $table->tinyInteger('pro_hot')->default(0)->index();
            $table ->string('pro_description')->nullable();
            $table->tinyInteger('pro_pay')->default(0);
            $table->tinyInteger('pro_number')->default(0);

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
        Schema::dropIfExists('products');
    }
};
