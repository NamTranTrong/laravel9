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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();//duy nhất
            $table->char('phone')->nullable();//có thể điền hoặc không
            $table->string('avatar')->nullable();
            $table->tinyInteger('active')->default(1)->index();//vd: nếu bạn không muốn cho 1 người login vào nhưng không xóa tài khoản của họ thì chuyển default sang 0
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
