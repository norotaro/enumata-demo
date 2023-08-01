<?php

namespace App\Models;

use Norotaro\Enumata\Contracts\DefineStates;

enum OrderStatus implements DefineStates
{
    case Open;
    case Designing;
    case Designed;
    case DesignFailed;
    case Producing;
    case ProdCompleted;
    case ProdFailed;
    case Delivered;
    case Canceled;

    public function transitions(): array
    {
        return match ($this) {
            self::Open => [
                'design' => self::Designing,
            ],
            self::Designing => [
                'finishedDesign' => self::Designed,
                'failedDesign' => self::DesignFailed,
            ],
            self::Designed => [
                'produce' => self::Producing,
            ],
            self::DesignFailed => [
                'reopen' => self::Open,
                'cancel' => self::Canceled,
            ],
            self::Producing => [
                'finishedProd' => self::ProdCompleted,
                'failedProd' => self::ProdFailed,
            ],
            self::ProdCompleted => [
                'deliver' => self::Delivered,
            ],
            self::ProdFailed => [
                'redo' => self::Designed,
                'cancel' => self::Canceled,
            ],
            default => [],
        };
    }

    public static function default(): self
    {
        return self::Open;
    }
}
