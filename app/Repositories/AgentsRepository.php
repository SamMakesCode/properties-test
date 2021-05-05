<?php

namespace App\Repositories;

use App\Models\Agent;
use Illuminate\Pagination\LengthAwarePaginator;

class AgentsRepository
{
    public function getPaginated(): LengthAwarePaginator
    {
        $agents = Agent::orderBy('name', 'asc')
            ->paginate(10);

        return $agents;
    }
}
