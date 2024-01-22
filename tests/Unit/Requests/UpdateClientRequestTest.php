<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\UpdateClientRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class UpdateClientRequestTest extends TestCase
{
    /** @test */
    public function it_passes_validation_with_valid_data(): void
    {
        $request = new UpdateClientRequest([
            'last_name' => 'ValidLastName',
            'first_name' => 'ValidFirstName',
            'phone_number' => '1234567890',
            'date_of_contact' => '2022-01-01',
        ]);

        $validator = Validator::make($request->all(), $request->rules());

        $this->assertFalse($validator->fails());
    }

    /** @test */
    public function it_fails_validation_without_last_name(): void
    {
        $this->expectException(ValidationException::class);

        $request = new UpdateClientRequest([
            // Omit 'last_name'
            'first_name' => 'ValidFirstName',
            'phone_number' => '1234567890',
            'date_of_contact' => '2022-01-01',
        ]);

        $validator = Validator::make($request->all(), $request->rules());

        $validator->validate();
    }

    /** @test */
    public function it_fails_validation_with_empty_last_name(): void
    {
        $this->expectException(ValidationException::class);

        $request = new UpdateClientRequest([
            'last_name' => '',
            'first_name' => 'ValidFirstName',
            'phone_number' => '1234567890',
            'date_of_contact' => '2022-01-01',
        ]);

        $validator = Validator::make($request->all(), $request->rules());

        $validator->validate();
    }

    /** @test */
    public function it_fails_validation_without_first_name(): void
    {
        $this->expectException(ValidationException::class);

        $request = new UpdateClientRequest([
            'last_name' => 'ValidLastName',
            'phone_number' => '1234567890',
            'date_of_contact' => '2022-01-01',
        ]);

        $validator = Validator::make($request->all(), $request->rules());

        $validator->validate();
    }

    /** @test */
    public function it_fails_validation_with_empty_first_name(): void
    {
        $this->expectException(ValidationException::class);

        $request = new UpdateClientRequest([
            'last_name' => 'ValidLastName',
            'first_name' => '',
            'phone_number' => '1234567890',
            'date_of_contact' => '2022-01-01',
        ]);

        $validator = Validator::make($request->all(), $request->rules());

        $validator->validate();
    }

    /** @test */
    public function it_fails_validation_without_phone_number(): void
    {
        $this->expectException(ValidationException::class);

        $request = new UpdateClientRequest([
            'last_name' => 'ValidLastName',
            'first_name' => 'ValidFirstName',
            'date_of_contact' => '2022-01-01',
        ]);

        $validator = Validator::make($request->all(), $request->rules());

        $validator->validate();
    }

    /** @test */
    public function it_fails_validation_with_empty_phone_number(): void
    {
        $this->expectException(ValidationException::class);

        $request = new UpdateClientRequest([
            'last_name' => 'ValidLastName',
            'first_name' => 'ValidFirstName',
            'phone_number' => '',
            'date_of_contact' => '2022-01-01',
        ]);

        $validator = Validator::make($request->all(), $request->rules());

        $validator->validate();
    }

    /** @test */
    public function it_fails_validation_without_date_of_contact(): void
    {
        $this->expectException(ValidationException::class);

        $request = new UpdateClientRequest([
            'last_name' => 'ValidLastName',
            'first_name' => 'ValidFirstName',
            'phone_number' => '1234567890',
        ]);

        $validator = Validator::make($request->all(), $request->rules());

        $validator->validate();
    }

    /** @test */
    public function it_fails_validation_with_invalid_date_of_contact(): void
    {
        $this->expectException(ValidationException::class);

        $request = new UpdateClientRequest([
            'last_name' => 'ValidLastName',
            'first_name' => 'ValidFirstName',
            'phone_number' => '1234567890',
            'date_of_contact' => 'invalid-date',
        ]);

        $validator = Validator::make($request->all(), $request->rules());

        $validator->validate();
    }
}
