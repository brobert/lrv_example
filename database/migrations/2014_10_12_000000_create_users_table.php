<?php

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
            $table->string('secondName')->default('');
            $table->string('surName');
            $table->enum('role', ['developer', 'admin', 'agency', 'parent'])->default('parent');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
            $table->index(['role', 'surName'], 'users_type_surname');

        });

        DB::table('users')->insert([
            'name'          => 'Robert',
            'secondName'    => 'Paweł',
            'surName'       => 'Błoński',
            'role'        => 1,
            'email'         => 'robert.blonski@gmail.com',
            'password' => bcrypt('Digital17'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
