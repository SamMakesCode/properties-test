<?php

namespace App\Http\Controllers;

use App\Actions\CreateAgentsAction;
use App\DataTransferObjects\Agent;
use App\Repositories\AgentsRepository;
use Illuminate\Http\Request;

class AgentsController extends Controller
{
    private AgentsRepository $agentsRepository;
    private CreateAgentsAction $createAgentsAction;

    public function __construct(
        AgentsRepository $agentsRepository,
        CreateAgentsAction $createAgentsAction
    ) {
        $this->agentsRepository = $agentsRepository;
        $this->createAgentsAction = $createAgentsAction;
    }

    public function index()
    {
        $agents = $this->agentsRepository
            ->getPaginated();

        return view('agents')
            ->with('agents', $agents);
    }

    public function create()
    {
        return view('agents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
        ]);

        $agentDto = Agent::fromRequest($request);

        $agent = $this->createAgentsAction
            ->createAgent($agentDto);

        return redirect()
            ->route('agents');
    }

    public function manage(\App\Models\Agent $agent)
    {
        return view('agents.manage')
            ->with('agent', $agent);
    }
}
