<?php

namespace App\Actions;

use App\DataTransferObjects\Agent;

class CreateAgentsAction
{
    public function createAgent(Agent $agentDto): \App\Models\Agent
    {
        // Perform business logic checks
        // e.g. Can an agent have a USA phone number
        // Can an agent live outside UK

        /** @var \App\Models\Agent $agent */
        $agent = \App\Models\Agent::create($agentDto->getProperties());

        // Perform other actions on success
        // e.g. Queue an email to the new agent
        // Fire an event

        return $agent;
    }
}
