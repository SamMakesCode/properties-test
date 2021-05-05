@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-12 text-right">
                <a href="{{ route('agents.create') }}" class="btn btn-primary">Create Agent</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($agents as $agent)
                            <tr>
                                <td>{{ $agent->name }}</td>
                                <td>{{ $agent->email }}</td>
                                <td>{{ $agent->phone }}</td>
                                <td>{{ $agent->address }}</td>
                                <td class="text-right">
                                    <a href="{{ route('agents.manage', $agent->id) }}" class="btn btn-sm btn-outline-primary">Manage</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="99">There are no agents.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $agents->render() }}
            </div>
        </div>
    </div>
@endsection
