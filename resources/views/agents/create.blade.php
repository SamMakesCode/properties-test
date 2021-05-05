@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">Create Agent</div>
                    <div class="card-body">
                        <form action="{{ route('agents.create') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-form-label col-4 text-right">
                                    Name
                                </label>
                                <div class="col-8">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-form-label col-4 text-right">
                                    Email
                                </label>
                                <div class="col-8">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-form-label col-4 text-right">
                                    Phone
                                </label>
                                <div class="col-8">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-form-label col-4 text-right">
                                    Address
                                </label>
                                <div class="col-8">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 offset-4">
                                    <button class="btn btn-primary">Create Agent</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
