<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 12 Jan 2019 14:23:40 +0000.
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
 * @property \Carbon\Carbon $updated_at
 * @property \App\Models\Thread $thread
 * @property \App\Models\User $user
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\ThreadMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\ThreadMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\ThreadMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\ThreadMessage whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\ThreadMessage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\ThreadMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\ThreadMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\ThreadMessage whereThreadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\ThreadMessage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ThreadMessage extends Eloquent
{
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
