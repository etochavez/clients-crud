@extends('layouts.app')

@section('content')

    <div class="row justify-content-center mt-3">
        <div class="col-md-10">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Edit Client
                    </div>
                    <div class="float-end">
                        <a href="{{ route('clients.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('clients.update', $client->id) }}" method="post">
                        @csrf
                        @method("PUT")

                        <div class="mb-3 row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end text-start">Last Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ $client->last_name }}">
                                @if ($errors->has('last_name'))
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end text-start">First Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ $client->first_name }}">
                                @if ($errors->has('first_name'))
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-end text-start">Phone Number</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ $client->phone_number }}">
                                @if ($errors->has('phone_number'))
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="date_of_contact" class="col-md-4 col-form-label text-md-end text-start">Date of Contact</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control @error('date_of_contact') is-invalid @enderror" id="date_of_contact" name="date_of_contact" value="{{ $client->date_of_contact }}">
                                @if ($errors->has('date_of_contact'))
                                    <span class="text-danger">{{ $errors->first('date_of_contact') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
