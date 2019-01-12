<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 12 Jan 2019 09:50:00 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ThreadMessage
 * 
 * @property int $id
 * @property string $content
 * @property int $author_id
 * @property int $thread_id
 * @property \Carbon\Carbon $created_at
 * 
 * @property \App\Models\Thread $thread
 * @property \App\Models\User $user
 *
 * @package App\Models\Base
 */
class ThreadMessage extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'author_id' => 'int',
		'thread_id' => 'int'
	];

	public function thread()
	{
		return $this->belongsTo(\App\Models\Thread::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'author_id');
	}
}
