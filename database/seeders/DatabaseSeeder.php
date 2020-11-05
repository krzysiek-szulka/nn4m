<?php

namespace Database\Seeders;

use App\Models\Error;
use App\Models\Store;
use Database\Factories\ErrorFactory;
use Database\Factories\StoreFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            StoreFactory::factoryForModel(Store::class)->create();
        }

        for ($i = 0; $i < 10; $i++) {
            ErrorFactory::factoryForModel(Error::class)->create();
        }
    }
}
