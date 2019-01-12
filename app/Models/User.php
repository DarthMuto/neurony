<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends \App\Models\Base\User implements AuthenticatableContract, AuthorizableContract {

	use Authenticatable;
	use Authorizable;

	protected $hidden = ['password'];

	protected $fillable = ['email', 'password'];
}
