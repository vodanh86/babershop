<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'users';

	protected $hidden = [
    ];

	protected $guarded = [];
}
