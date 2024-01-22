<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');
    }

    /** @test */
    public function it_can_display_index_page()
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('clients.index'));

        $response->assertStatus(200)
            ->assertViewIs('clients.index')
            ->assertViewHas('clients');
    }

    /** @test */
    public function it_display_latest_clients()
    {
        $clients = Client::factory(3)->create();

        $response = $this->get(route('clients.index'));

        foreach ($clients as $client) {
            $response->assertSee($client->last_name);
        }
    }

    /** @test */
    public function it_can_store_a_new_client()
    {
        $data = [
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'phone_number' => '1234567890',
            'date_of_contact' => '2022-01-01',
        ];

        $response = $this->post(route('clients.store'), $data);

        $response->assertRedirect(route('clients.index'))
            ->assertSessionHas('success', 'New client is added successfully.');

        $this->assertDatabaseHas('clients', $data);
    }

    /** @test */
    public function it_can_update_an_existing_client()
    {
        $this->withoutExceptionHandling();

        $client = Client::factory()->create();

        $data = [
            'last_name' => 'Last Name Updated',
            'first_name' => 'First Name Updated',
            'phone_number' => '9876543210',
            'date_of_contact' => '2023-01-01',
        ];

        $this->put(route('clients.update', $client->id), $data);

        $this->assertDatabaseHas('clients', $data);
    }

    /** @test */
    public function it_can_delete_an_existing_client()
    {
        $client = Client::factory()->create();

        $response = $this->delete(route('clients.destroy', $client->id));

        $response->assertRedirect(route('clients.index'))
            ->assertSessionHas('success', 'Client is deleted successfully.');

        $this->assertDatabaseMissing('clients', ['id' => $client->id]);
    }

    protected function tearDown(): void
    {
        $this->artisan('migrate:rollback');

        parent::tearDown();
    }
}
