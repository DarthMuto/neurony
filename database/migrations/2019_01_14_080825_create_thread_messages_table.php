<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateThreadMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('thread_messages', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('content', 1000);
			$table->integer('author_id')->index('thread_messages_users_id_fk');
			$table->integer('thread_id')->index('thread_messages_threads_id_fk');
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
		Schema::drop('thread_messages');
	}

}
