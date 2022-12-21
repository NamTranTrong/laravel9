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
            $table->integer('pro_price')->default(0);
            $table->longText('pro_description')->nullable();
            $table->integer('pro_category_id')->default(0)->index();
            $table->integer('pro_auth_id')->default(0)->index();
            $table->tinyInteger('pro_sale')->default(0);
            $table->tinyInteger('pro_active')->default(0);
            $table->tinyInteger('pro_hot')->default(0);
            $table->integer('pro_view')->default(0);
            $table->string('pro_avatar')->nullable();
            $table->integer('pro_total_ratings')->default(0);
            $table->integer('pro_total_number')->default(0);
            $table->tinyInteger('pro_availability')->default(1);
            $table->string('pro_description_seo')->nullable();
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
