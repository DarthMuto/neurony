<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Support\Collection;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ThreadMessage[] $thread_messages
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Thread[] $threads
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @mixin \Eloquent
 */
class User extends \App\Models\Base\User implements AuthenticatableContract, AuthorizableContract {

	use Authenticatable;
	use Authorizable;

	const MAX_THREADS_PER_USER = 5;

	protected $hidden = ['password'];

	protected $fillable = ['email', 'password', 'remember_token'];

	public static function search($searchString): Collection {
		$searchWords = collect(preg_split('#[,; ]+#', $searchString))->map('trim')->filter();
		$query = self::select(['id']);
		foreach ($searchWords as $searchWord) {
			$query->orWhere('email', 'LIKE', '%' . $searchWord . '%');
		}
		return $query->get()->pluck('id');
	}

}
