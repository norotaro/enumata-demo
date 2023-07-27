<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Norotaro\Enumata\Traits\HasStateMachines;

class Order extends Model
{
    use HasStateMachines;

    protected $casts = [
        'status' => OrderStatus::class,
    ];
}