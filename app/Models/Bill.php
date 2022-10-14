<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bill';

    public function order()
    {
        return $this->hasOne(Order::class);
    }

	protected $hidden = [
    ];

	protected $guarded = [];
}
