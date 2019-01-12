<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 12 Jan 2019 15:32:15 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Admin
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\Admin whereRememberToken($value)
 * @mixin \Eloquent
 */
class Admin extends Eloquent
{
	public $timestamps = false;
}
