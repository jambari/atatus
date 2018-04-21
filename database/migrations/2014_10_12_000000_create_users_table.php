<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
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
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['name' => 'admin', 'email' => 'admin@atatus.com', 'password' => bcrypt('adminatatus')],
            ['name' => 'pejabat', 'email' => 'pejabat@atatus.com', 'password' => bcrypt('pejabatatatus')],
            ['name' => 'staff', 'email' => 'staff@atatus.com', 'password' => bcrypt('staffatatus')],
        ]);
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
}
