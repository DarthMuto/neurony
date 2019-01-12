<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 12 Jan 2019 09:50:00 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $email
 * @property string $password
 * 
 * @property \Illuminate\Database\Eloquent\Collection $thread_messages
 * @property \Illuminate\Database\Eloquent\Collection $threads
 *
 * @package App\Models\Base
 */
class User extends Eloquent
{
	public $timestamps = false;

	public function thread_messages()
	{
		return $this->hasMany(\App\Models\ThreadMessage::class, 'author_id');
	}

	public function threads()
	{
		return $this->hasMany(\App\Models\Thread::class, 'author_id');
	}
}
