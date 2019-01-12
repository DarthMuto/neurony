<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 12 Jan 2019 14:23:41 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property \Illuminate\Database\Eloquent\Collection $thread_messages
 * @property \Illuminate\Database\Eloquent\Collection $threads
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\User wherePassword($value)
 * @mixin \Eloquent
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
