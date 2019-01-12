<?php

namespace App\Models;

class Thread extends \App\Models\Base\Thread
{
	protected $fillable = [
		'title',
		'content',
		'author_id'
	];
}
