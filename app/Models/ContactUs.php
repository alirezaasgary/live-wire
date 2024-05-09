<?php

namespace App\Models;

use App\Enums\ContactUsCategoryEnum;
use App\Enums\ContactUsStatusEnum;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'message',
        'category',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'category'   => ContactUsCategoryEnum::class,
            'status'     => ContactUsStatusEnum::class,
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }


}
