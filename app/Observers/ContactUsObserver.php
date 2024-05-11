<?php

namespace App\Observers;

use App\Models\ContactUs;
use Faker\Factory as Faker;

class ContactUsObserver
{

    public function created(ContactUs $contactUs): void
    {
        try {
            $faker = Faker::create();

            $relationLength = rand(1, 3);
            for ($i = 0; $i <= $relationLength; $i++) {
                $contactUs->media()->create([
                    'path' => $faker->imageUrl
                ]);
            }
        } catch (\Exception $exception) {
            report($exception);
        }

    }

}
