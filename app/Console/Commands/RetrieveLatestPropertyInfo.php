<?php

namespace App\Console\Commands;

use App\Models\Property;
use App\MTCPropertyClient;
use App\Repositories\PropertyRepository;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RetrieveLatestPropertyInfo extends Command
{
    protected $signature = 'retrieve-latest-property-info';
    protected $description = 'Command description';
    private PropertyRepository $propertiesRepository;
    private MTCPropertyClient $mtcPropertyClient;

    public function __construct(
        PropertyRepository $propertyRepository,
        MTCPropertyClient $mtcPropertyClient
    ) {
        parent::__construct();
        $this->propertiesRepository = $propertyRepository;
        $this->mtcPropertyClient = $mtcPropertyClient;
    }

    public function handle()
    {
        $this->mtcPropertyClient->allProperties(function ($properties) {
            foreach ($properties['data'] as $property) {
                $propertyDTO = \App\DataTransferObjects\Property::fromAPICall($property);

                try {
                    $propertyObj = $this->propertiesRepository
                        ->getById($propertyDTO->getId());

                    $propertyObj->update($propertyDTO->getProperties());
                } catch (ModelNotFoundException $modelNotFoundException) {
                    $propertyObj = Property::create($propertyDTO->getProperties());
                }
            }
        });
    }
}
