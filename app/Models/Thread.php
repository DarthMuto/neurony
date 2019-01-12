<?php

namespace App\Models;

/**
 * App\Models\Thread
 *
 * @property int $id
 * @property string $title
 * @property string|null $content
 * @property int $author_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ThreadMessage[] $thread_messages
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Thread whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Thread extends \App\Models\Base\Thread
{
	protected $fillable = [
		'title',
		'content',
		'author_id'
	];

	public static function boot() {
		parent::boot();
		self::created(function(self $newThread) {
			$toDelete = max(0, $newThread->user->threads()->count() - User::MAX_THREADS_PER_USER);
			if ($toDelete) {
				self::whereAuthorId($newThread->author_id)
					->latest()
					->take($toDelete)
					->skip(User::MAX_THREADS_PER_USER)
					->get()
					->each(function (self $thread) {
						$thread->delete();
					});
			}
		});
	}

}
