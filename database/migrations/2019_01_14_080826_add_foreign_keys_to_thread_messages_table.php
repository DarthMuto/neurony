<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToThreadMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('thread_messages', function(Blueprint $table)
		{
			$table->foreign('thread_id', 'thread_messages_threads_id_fk')->references('id')->on('threads')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('author_id', 'thread_messages_users_id_fk')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('thread_messages', function(Blueprint $table)
		{
			$table->dropForeign('thread_messages_threads_id_fk');
			$table->dropForeign('thread_messages_users_id_fk');
		});
	}

}
