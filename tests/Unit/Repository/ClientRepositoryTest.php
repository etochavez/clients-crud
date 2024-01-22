<?php

namespace Tests\Unit\Repository;

use App\Models\Client;
use App\Repositories\ClientRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class ClientRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private ClientRepository $clientRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->clientRepository = new ClientRepository();
    }

    /** @test */
    public function it_can_get_latest_clients()
    {
        Client::factory()->count(5)->create();

        // Call the repository method
        $result = $this->clientRepository->latestClients();

        $this->assertInstanceOf(LengthAwarePaginator::class, $result);

        $this->assertCount(3, $result->items());
    }

    /** @test */
    public function it_can_store_a_new_client()
    {
        $data = [
            'last_name' => 'Last Name Test',
            'first_name' => 'First Name Test',
            'phone_number' => '1234567890',
            'date_of_contact' => '2022-01-01',
        ];

        $result = $this->clientRepository->store($data);

        $this->assertInstanceOf(Client::class, $result);

        $this->assertDatabaseHas('clients', $data);
    }

    /** @test */
    public function it_can_update_an_existing_client()
    {
        $client = Client::factory()->create();

        $data = [
            'last_name' => 'Last Name Updated',
            'first_name' => 'First Name Updated',
            'phone_number' => '9876543210',
            'date_of_contact' => '2023-01-01',
        ];

        $result = $this->clientRepository->update($client, $data);

        $this->assertTrue($result);

        $this->assertDatabaseHas('clients', $data);
    }

    /** @test */
    public function it_can_delete_an_existing_client()
    {
        $client = Client::factory()->create();

        $result = $this->clientRepository->delete($client);

        $this->assertTrue($result);

        $this->assertDatabaseMissing('clients', ['id' => $client->id]);
    }
}
