<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateUserAuthorizeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perms', function (Blueprint $table) {
            $table->increments('perm_id');
            $table->enum('scope', ['private', 'public'])->default('private');
            $table->string('name')->unique();
            $table->text('desc');
            $table->timestamps();
        });

        /**
         * Table joined user with permissions
         */
        Schema::create('users_to_perms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id', false, true)->index();
            $table->integer('perm_id', false, true)->index();
            $table->timestamps();
            $table->unique(array('perm_id', 'user_id'));
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('perm_id')->references('perm_id')->on('perms');
        });

        Artisan::call('db:seed', [ '--class' => 'UserAuthorizeSeeder' ] );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('users_to_perms');
        Schema::drop('perms');

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
