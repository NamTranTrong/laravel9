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
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('a_name')->nullable()->unique();
            $table->string('a_slug')->index ();
            $table->longText('a_content')->nullable();
            $table->integer('a_view')->default(0);
            $table->tinyInteger('a_active')->default(1)->index();
            $table->integer('a_author_id')->default(0)->index();
            $table->text('a_description')->nullable();
            $table->string('a_avatar')->nullable();

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
        Schema::dropIfExists('articles');
    }
};
