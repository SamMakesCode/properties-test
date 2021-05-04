<?php

namespace App\DataTransferObjects;

use Illuminate\Support\Str;

class Property
{
    private string $id;
    private string $county;
    private string $country;
    private string $town;
    private string $description;
    private string $fullDetailsUrl;
    private string $address;
    private string $imageUrl;
    private string $thumbnailUrl;
    private string $latitude;
    private string $longitude;
    private int $numberOfBedrooms;
    private int $numberOfBathrooms;
    private string $price;
    private int $propertyTypeId;
    private string $type;

    public function __construct(
        string $id,
        int $propertyTypeId,
        string $county,
        string $country,
        string $town,
        string $description,
        string $fullDetailsUrl,
        string $address,
        string $imageUrl,
        string $thumbnailUrl,
        string $latitude,
        string $longitude,
        int $numberOfBedrooms,
        int $numberOfBathrooms,
        string $price,
        string $type
    ) {
        $this->id = $id;
        $this->propertyTypeId = $propertyTypeId;
        $this->county = $county;
        $this->country = $country;
        $this->town = $town;
        $this->description = $description;
        $this->fullDetailsUrl = $fullDetailsUrl;
        $this->address = $address;
        $this->imageUrl = $imageUrl;
        $this->thumbnailUrl = $thumbnailUrl;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->numberOfBedrooms = $numberOfBedrooms;
        $this->numberOfBathrooms = $numberOfBathrooms;
        $this->price = $price;
        $this->type = $type;
    }

    public function getProperties(): array
    {
        $properties = [];

        foreach (get_object_vars($this) as $column => $value) {
            $column = Str::snake($column);
            $properties[$column] = $value;
        }

        return $properties;
    }

    public static function fromAPICall(array $property): self
    {
        return new static(
            $property['uuid'],
            $property['property_type_id'],
            $property['county'],
            $property['country'],
            $property['town'],
            $property['description'],
            'full deets url',
            $property['address'],
            $property['image_full'],
            $property['image_thumbnail'],
            $property['latitude'],
            $property['longitude'],
            $property['num_bedrooms'],
            $property['num_bathrooms'],
            $property['price'],
            $property['type'],
        );
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCounty(): string
    {
        return $this->county;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getTown(): string
    {
        return $this->town;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getFullDetailsUrl(): string
    {
        return $this->fullDetailsUrl;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function getThumbnailUrl(): string
    {
        return $this->thumbnailUrl;
    }

    public function getLatitude(): string
    {
        return $this->latitude;
    }

    public function getLongitude(): string
    {
        return $this->longitude;
    }

    public function getNumberOfBedrooms(): int
    {
        return $this->numberOfBedrooms;
    }

    public function getNumberOfBathrooms(): int
    {
        return $this->numberOfBathrooms;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getPropertyTypeId(): int
    {
        return $this->propertyTypeId;
    }

    public function getType(): int
    {
        return $this->type;
    }
}
