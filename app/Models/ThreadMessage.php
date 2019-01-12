<?php

namespace App\Models;

class ThreadMessage extends \App\Models\Base\ThreadMessage
{
	protected $fillable = [
		'content',
		'author_id',
		'thread_id'
	];
}
