<?php

namespace App\Repositories;

use App\Models\Client;
use Illuminate\Pagination\LengthAwarePaginator;

readonly class ClientRepository
{
    private const PAGINATION_SIZE = 3;

    public function latestClients(): LengthAwarePaginator
    {
        return Client::latest()->paginate(3);
    }

    public function store(array $values): Client
    {
        return Client::create($values);
    }

    public function update(Client $client, array $values): bool
    {
        return $client->update($values);
    }

    public function delete(Client $client): ?bool
    {
        return $client->delete();
    }

    public function clientsSortedBy(string $sortField, string $sortDirection): LengthAwarePaginator
    {
        return Client::orderBy($sortField, $sortDirection)->paginate(self::PAGINATION_SIZE);
    }
}
