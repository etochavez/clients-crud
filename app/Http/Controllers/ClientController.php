<?php

namespace App\Http\Controllers;

use App\DomainServices\ClientService;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function __construct(private ClientService $service)
    {
    }

    public function index(Request $request): View
    {
        $sortField = $request->query('sort', 'id');
        $sortDirection = $request->query('direction', 'asc');

        return view('clients.index', [
            'clients' => $this->service->getClientsSortedBy($sortField, $sortDirection),
        ]);
    }

    public function create(): View
    {
        return view('clients.create');
    }

    public function store(StoreClientRequest $request): RedirectResponse
    {
        $this->service->store($request->all());

        return redirect()->route('clients.index')
            ->withSuccess('New client is added successfully.');
    }

    public function show(Client $client): View
    {
        return view('clients.show', [
            'client' => $client,
        ]);
    }

    public function edit(Client $client): View
    {
        return view('clients.edit', [
            'client' => $client,
        ]);
    }

    public function update(
        UpdateClientRequest $request,
        Client $client
    ): RedirectResponse {
        $this->service->update($client, $request->all());

        return redirect()->back()
            ->withSuccess('Client is updated successfully.');
    }

    public function destroy(Client $client): RedirectResponse
    {
        $this->service->delete($client);

        return redirect()->route('clients.index')
            ->withSuccess('Client is deleted successfully.');
    }

}
