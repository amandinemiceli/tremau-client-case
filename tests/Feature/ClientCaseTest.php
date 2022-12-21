<?php

namespace Tests\Feature;

use App\Models\ClientCase;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientCaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_client_cases_should_return_a_404_error()
    {
        $response = $this->get('/cases');
        $response->assertStatus(404);
    }

    public function test_new_client_case_can_be_created()
    {
        $clientCase = ClientCase::factory()->create();
        $response = $this->postJson('/api/cases', $clientCase->toArray());
        $response->assertStatus(200);
        $this->assertTrue($response['success']);
    }

    public function test_new_client_case_invalid_email()
    {
        $clientCase = ClientCase::factory()->create([
            'reporter_email' => 'test.test.com'
        ]);

        $response = $this->postJson('/api/cases', $clientCase->toArray());
        $response->assertStatus(200);
        $this->assertFalse($response['success']);
    }
}
