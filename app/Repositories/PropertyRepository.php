<?php

namespace App\Repositories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PropertyRepository
{
    /**
     * @throws ModelNotFoundException
     */
    public function getById(string $id): Property
    {
        /** @var Property $property */
        $property = Property::where('id', $id)
            ->firstOrFail();

        return $property;
    }

    /**
     * @param string $query
     * @return Property[]|Collection
     */
    public function search(string $queryString)
    {
        $properties = Property::where(function ($query) use ($queryString) {
            $query->where('county', 'LIKE', '%' . $queryString . '%')
               ->orWhere('country', 'LIKE', '%' . $queryString . '%')
               ->orWhere('town', 'LIKE', '%' . $queryString . '%')
               ->orWhere('description', 'LIKE', '%' . $queryString . '%')
               ->orWhere('address', 'LIKE', '%' . $queryString . '%')
            ;
        })->paginate(5);

        return $properties;
    }
}
