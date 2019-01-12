<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 12 Jan 2019 09:50:00 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Thread
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $author_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $thread_messages
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Thread newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Thread newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Thread query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Thread whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Thread whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Thread whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Thread whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Thread whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Thread whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Thread extends Eloquent
{
	protected $casts = [
		'author_id' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'author_id');
	}

	public function thread_messages()
	{
		return $this->hasMany(\App\Models\ThreadMessage::class);
	}
}
