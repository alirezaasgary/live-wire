<?php

namespace App\Enums;

enum ContactUsCategoryEnum: int
{
    case SUGGESTION = 1;
    case CRITICISM = 2;
    case OTHER = 3;

    public function getLabel(): string
    {
        return match ($this) {
            self::SUGGESTION => trans('enum.category.suggestion'),
            self::CRITICISM => trans('enum.category.criticism'),
            self::OTHER => trans('enum.category.other'),
        };
    }


}
