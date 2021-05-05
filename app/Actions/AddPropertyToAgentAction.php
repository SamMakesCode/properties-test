<?php

namespace App\Actions;

use App\Exceptions\AgentHasPropertyAlreadyException;
use App\Models\Agent;
use App\Models\Property;

class AddPropertyToAgentAction
{
    public function addPropertyToAgent(
        Agent $agent,
        Property $property
    ): void
    {
        if ($agent->properties()->where('property_id', $property->id)->count()) {
            throw new AgentHasPropertyAlreadyException;
        }

        $agent->properties()
            ->attach($property->id);
    }
}
