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
                        <form action="">
                            <div class="form-group row">
                                <div class="col-12">
                                    We will list properties the agent is assigned to here
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

        });
    </script>
@endsection
