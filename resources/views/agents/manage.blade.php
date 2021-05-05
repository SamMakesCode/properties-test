@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Properties
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Address</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="properties">
                                @forelse ($agent->properties as $property)
                                    <tr>
                                        <td>{{ $property->address }}</td>
                                        <td class="text-right">
                                            <button type="button" data-property_id="{{ $property->id }}" class="btn btn-sm btn-outline-danger remove-property">
                                                &times;
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="99">This agent doesn't manage any properties.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <h2>Add property</h2>
                        <input type="text" class="form-control" id="add-property">
                        <div class="list-group" id="search-results">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let agent_id = {{ $agent->id }};

        function search(query)
        {
            $.ajax({
                method: 'get',
                success: function (results) {
                    let html = '';
                    for (let i = 0; i < results.data.length; i++) {
                        html += '<div class="list-group-item add-property" data-property_id="' + results.data[i].id + '">' + results.data[i].address + '</div>';
                    }
                    $('#search-results').html(html);
                },
                url: '/api/properties?query=' + query,
            })
        }

        function addProperty(agentId, propertyId)
        {
            return new Promise((resolve, reject) => {
                $.ajax({
                    data: {
                        property_id: propertyId,
                    },
                    error: function () {
                        reject();
                    },
                    method: 'post',
                    success: function () {
                        resolve();
                    },
                    url: '/api/agents/' + agentId + '/properties',
                })
            })
        }

        function removeProperty(agentId, propertyId)
        {
            return new Promise((resolve, reject) => {
                $.ajax({
                    data: {
                        property_id: propertyId,
                    },
                    error: function () {
                        reject();
                    },
                    method: 'delete',
                    success: function () {
                        resolve();
                    },
                    url: '/api/agents/' + agentId + '/properties',
                })
            });
        }

        $(document).ready(function () {
            let keyEntryTimeout = null;

            $(document).on('keydown', '#add-property', function () {
                keyEntryTimeout = setTimeout(function () {
                    search($('#add-property').val())
                }, 120);
            });

            $(document).on('click', '.add-property', function () {
                let properties = '<tr><td>' + $(this).html() + '</td><td class="text-right"><button type="button" data-property_id="' + $(this).data('property_id') + '" class="btn btn-sm btn-outline-danger remove-property">&times;</button></td></tr>';
                $('#properties').append(properties);

                addProperty(
                    agent_id,
                    $(this).data('property_id'),
                ).catch(() => {
                    $('#properties').children().last().remove();
                });
            });

            $(document).on('click', '.remove-property', function () {
                let shallowCopy = $(this).parent().parent()[0];

                $(this).parent().parent().remove();
                removeProperty(
                    agent_id,
                    $(this).data('property_id')
                ).catch(() => {
                    $('#properties').append(shallowCopy);
                })
            });
        });
    </script>
@endsection
