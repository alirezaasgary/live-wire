<?php

namespace App\Enums;

enum ContactUsStatusEnum: int
{
    case WAITING = 1;
    case APPROVE = 2;
    case REJECT = 3;

    public function getLabel(): string
    {
        return match ($this) {
            self::WAITING => trans('enum.status.waiting'),
            self::APPROVE => trans('enum.status.approve'),
            self::REJECT => trans('enum.status.reject'),
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::WAITING => "text-warning",
            self::APPROVE => "text-success",
            self::REJECT => "text-danger",
        };
    }
}
