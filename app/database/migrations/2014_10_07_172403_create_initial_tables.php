<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('posts', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->longText('post_content');
            $table->text('post_title');
            $table->text('post_excerpt');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
        });

		Schema::create('comments', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('post_id')->unsigned()->index();
            $table->text('content');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')
                ->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('users');
        Schema::drop('posts');
		Schema::drop('comments');
	}

}
