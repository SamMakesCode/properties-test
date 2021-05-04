<?php

namespace App\Repositories;

use App\Models\Property;
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
}
