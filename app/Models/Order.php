<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    public function services()
    {
        return $this->hasMany(OrderService::class);
    }

	protected $hidden = [
    ];

	protected $guarded = [];
}
