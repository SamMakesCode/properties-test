<?php

namespace App\Repositories;

use App\Models\Agent;
use Illuminate\Pagination\LengthAwarePaginator;

class AgentsRepository
{
    public function getPaginated(array $relationships = []): LengthAwarePaginator
    {
        $agents = Agent::orderBy('name', 'asc')
            ->with($relationships)
            ->paginate(10);

        return $agents;
    }
}
