<?php

namespace App\Models;

class User extends \App\Models\Base\User
{
	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'email',
		'password'
	];
}
