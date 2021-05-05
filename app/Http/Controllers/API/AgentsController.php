<?php

namespace App\Http\Controllers\API;

use App\Actions\AddPropertyToAgentAction;
use App\Actions\RemovePropertyFromAgentAction;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Repositories\PropertyRepository;
use Illuminate\Http\Request;

class AgentsController extends Controller
{
    private PropertyRepository $propertyRepository;
    private AddPropertyToAgentAction $addPropertyToAgentAction;
    private RemovePropertyFromAgentAction $removePropertyFromAgentAction;

    public function __construct(
        PropertyRepository $propertyRepository,
        AddPropertyToAgentAction $addPropertyToAgentAction,
        RemovePropertyFromAgentAction $removePropertyFromAgentAction
    ) {
        $this->propertyRepository = $propertyRepository;
        $this->addPropertyToAgentAction = $addPropertyToAgentAction;
        $this->removePropertyFromAgentAction = $removePropertyFromAgentAction;
    }

    public function addProperty(Request $request, Agent $agent)
    {
        $request->validate([
            'property_id' => ['required'],
        ]);

        $property = $this->propertyRepository
            ->getById($request->get('property_id'));

        $this->addPropertyToAgentAction
            ->addPropertyToAgent($agent, $property);

        return response()
            ->json([
                'message' => 'Okay',
            ]);
    }

    public function removeProperty(Request $request, Agent $agent)
    {
        $request->validate([
            'property_id' => ['required'],
        ]);

        $property = $this->propertyRepository
            ->getById($request->get('property_id'));

        $this->removePropertyFromAgentAction
            ->removePropertyFromAgent($agent, $property);

        return response()
            ->json([
                'message' => 'Okay',
            ]);
    }
}
