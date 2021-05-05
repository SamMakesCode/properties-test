<?php

namespace App\Actions;

use App\Models\Agent;
use App\Models\Property;

class RemovePropertyFromAgentAction
{
    public function removePropertyFromAgent(
        Agent $agent,
        Property $property
    ): void
    {
        $agent->properties()
            ->detach($property->id);
    }
}
