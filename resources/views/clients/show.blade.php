@extends('layouts.app')

@section('content')

    <div class="row justify-content-center mt-3">
        <div class="col-md-10">

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Client Information
                    </div>
                    <div class="float-end">
                        <a href="{{ route('clients.index') }}" class="btn btn-primary btn-sm">&larr; Back to List</a>
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this client?')"><i class="bi bi-trash"></i> Delete</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end text-start"><strong>Last Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $client->last_name }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end text-start"><strong>First Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $client->first_name }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="phone_number" class="col-md-4 col-form-label text-md-end text-start"><strong>Phone Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $client->phone_number }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="date_of_contact" class="col-md-4 col-form-label text-md-end text-start"><strong>Date of Contact:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $client->date_of_contact }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
