<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\PropertyRepository;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    private PropertyRepository $propertiesRepository;

    public function __construct(
        PropertyRepository $propertyRepository
    ) {
        $this->propertiesRepository = $propertyRepository;
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => ['required', 'string'],
        ]);

        $properties = $this->propertiesRepository
            ->search($request->get('query'));

        return response()
            ->json($properties);
    }
}
