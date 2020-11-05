<?php declare(strict_types=1);

namespace Database\Factories;

use App\DTO\AddressDto;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    protected string $model = Store::class;

    public function definition(): array
    {
        return [
            'store_number' => $this->faker->numberBetween(),
            'store_name' => $this->faker->domainName,
            'address' => new AddressDto([
                'addressLine1' => $this->faker->streetAddress,
                'addressLine2' => '',
                'addressLine3' => '',
                'city' => $this->faker->city,
                'county' => $this->faker->state,
                'postcode' => $this->faker->postcode,
                'country' => $this->faker->country,
            ]),
            'site_id' => 'GB',
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'phone_number' => $this->faker->phoneNumber,
            'cfs_flag' => $this->faker->boolean,
        ];
    }
}
