<?php

namespace App\DomainServices;

use App\Models\Client;
use App\Repositories\ClientRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

readonly class ClientService
{
    public function __construct(private ClientRepository $clientRepository)
    {
    }

    public function latestClients(): LengthAwarePaginator
    {
        return $this->clientRepository->latestclients();
    }

    public function getClientsSortedBy(string $sortField, string $sortDirection): LengthAwarePaginator
    {
        return $this->clientRepository->clientsSortedBy($sortField, $sortDirection);
    }

    public function store(array $values): Client
    {
        return $this->clientRepository->store($values);
    }

    public function update(Client $client, array $values): bool
    {
        return $this->clientRepository->update($client, $values);
    }

    public function delete(Client $client): ?bool
    {
        return $this->clientRepository->delete($client);
    }
}
