<?php declare(strict_types=1);

namespace App\Handlers\Commands;

use App\Commands\CreateStoreCommand;
use App\Commands\CreateStoreErrorCommand;
use App\DTO\AddressDto;
use App\Models\Store;
use App\Repositories\StoreRepository;
use Illuminate\Bus\Dispatcher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CreateStoreHandler
{
    private StoreRepository $storeRepository;
    private Dispatcher $commandDispatcher;

    public function __construct(StoreRepository $storeRepository, Dispatcher $commandDispatcher)
    {
        $this->storeRepository = $storeRepository;
        $this->commandDispatcher = $commandDispatcher;
    }

    public function handle(CreateStoreCommand $command): void
    {
        $storeDto = $command->getStoreDto();

        $validator = Validator::make($storeDto->toArray(), $this->getValidationRules());
        if ($validator->fails()) {
            $this->commandDispatcher->dispatch(new CreateStoreErrorCommand(
                $validator->messages()->toArray(),
                $command->getSource(),
                $command->getSourceIdentity()
            ));
            return;
        }

        $store = new Store();
        $store->store_number = $storeDto->storeNumber;
        $store->store_name = $storeDto->storeName;
        $store->address = $storeDto->address;
        $store->site_id = $storeDto->siteId;
        $store->latitude = $storeDto->latitude;
        $store->longitude = $storeDto->longitude;
        $store->phone_number = $storeDto->phoneNumber;
        $store->cfs_flag = $storeDto->cfsFlag;

        $this->storeRepository->create($store);
    }

    private function getValidationRules(): array
    {
        return [
            'storeNumber' => 'required|integer|min:1',
            'storeName' => 'required|string',
            'siteId' => 'required|string|min:2|max:2',
            'latitude' => 'required|numeric', // TODO: could be done with a regex
            'longitude' => 'required|numeric', // TODO: could be done with a regex
            'phoneNumber' => 'required|string',
            'cfsFlag' => 'required|boolean',

            'address.addressLine1' => 'required|string',
            'address.addressLine2' => 'string',
            'address.addressLine3' => 'string',
            'address.city' => 'required|string',
            'address.county' => 'required|string',
            'address.postcode' => 'required|string',
            'address.country' => 'required|string',
        ];
    }
}
