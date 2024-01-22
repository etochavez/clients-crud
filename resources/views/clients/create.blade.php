@extends('layouts.app')

@section('content')

    <div class="row justify-content-center mt-3">
        <div class="col-md-10">

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Add New Client
                    </div>
                    <div class="float-end">
                        <a href="{{ route('clients.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('clients.store') }}" method="post">
                        @csrf

                        <div class="mb-3 row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end text-start">Last Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                       name="last_name" value="{{ old('last_name') }}">
                                @if ($errors->has('last_name'))
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end text-start">First Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                                       name="first_name" value="{{ old('first_name') }}">
                                @if ($errors->has('first_name'))
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-end text-start">Phone Number</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                                       name="phone_number" value="{{ old('phone_number') }}">
                                @if ($errors->has('phone_number'))
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="date_of_contact" class="col-md-4 col-form-label text-md-end text-start">Date of Contact</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control @error('date_of_contact') is-invalid @enderror" id="date_of_contact"
                                       name="date_of_contact" value="{{ old('date_of_contact') }}">
                                @if ($errors->has('date_of_contact'))
                                    <span class="text-danger">{{ $errors->first('date_of_contact') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Client">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
