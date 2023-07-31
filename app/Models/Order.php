<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Norotaro\Enumata\Traits\HasStateMachines;

class Order extends Model
{
    use HasStateMachines;

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    protected $appends = ['transitions'];

    protected function transitions(): Attribute
    {
        return Attribute::get(
            fn (): Collection => collect($this->status->transitions())
                ->mapWithKeys(fn (OrderStatus $status, string $transitionName) => [
                    $transitionName => $status->name,
                ]),
        );
    }
}
