<?php

namespace App\Models;

use Norotaro\Enumata\Contracts\DefineStates;

enum OrderStatus implements DefineStates
{
    case Pending;
    case Approved;
    case Rejected;

    public function transitions(): array
    {
        return match ($this) {
            self::Pending => [
                'approve' => self::Approved,
                'reject' => self::Rejected,
            ],
        };
    }

    public static function default(): self
    {
        return self::Pending;
    }
}
