<?php

namespace App\Models;

/**
 * App\Models\ThreadMessage
 *
 * @property int $id
 * @property string $content
 * @property int $author_id
 * @property int $thread_id
 * @property string $created_at
 * @property-read \App\Models\Thread $thread
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadMessage whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadMessage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadMessage whereThreadId($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ThreadMessage whereUpdatedAt($value)
 */
class ThreadMessage extends \App\Models\Base\ThreadMessage
{
	protected $fillable = [
		'content',
		'author_id',
		'thread_id'
	];
}
