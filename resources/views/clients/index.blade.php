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
                <div class="card-header">Client List</div>
                <div class="card-body">
                    <a href="{{ route('clients.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Client</a>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col"><a href="{{ route('clients.index', ['sort' => 'id']) }}">S#</a></th>
                            <th scope="col"><a href="{{ route('clients.index', ['sort' => 'last_name']) }}">Last Name</a></th>
                            <th scope="col"><a href="{{ route('clients.index', ['sort' => 'first_name']) }}">First Name</a></th>
                            <th scope="col"><a href="{{ route('clients.index', ['sort' => 'phone_number']) }}">Phone Number</a></th>
                            <th scope="col"><a href="{{ route('clients.index', ['sort' => 'date_of_contact']) }}">Date of Contact</a></th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($clients as $client)
                            <tr>
                                <th scope="row">{{ $client->id }}</th>
                                <td>{{ $client->last_name }}</td>
                                <td>{{ $client->first_name }}</td>
                                <td>{{ $client->phone_number }}</td>
                                <td>{{ $client->date_of_contact }}</td>
                                <td>
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('clients.show', $client->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this client?');"><i class="bi bi-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Clients Found!</strong>
                                </span>
                            </td>
                        @endforelse
                        </tbody>
                    </table>

                    {{ $clients->appends(request()->input())->links() }}

                </div>
            </div>
        </div>
    </div>

@endsection
