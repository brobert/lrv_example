<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_perms', function (Blueprint $table) {
            $table->increments('perm_id');
            $table->string('name', 25)->index();
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('user_perm_groups', function (Blueprint $table) {
            $table->increments('perm_group_id');
            $table->string('name', 50)->index();
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('user_to_user_perms', function (Blueprint $table) {
            $table->increments('user_perm_id');
            $table->integer( 'user_id' )->index();
            $table->integer( 'perm_id' )->index();
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
        Schema::drop('user_perms');//
        Schema::drop('user_perm_groups');//
        Schema::drop('user_to_user_perms');//
    }
}
