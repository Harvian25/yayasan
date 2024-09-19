<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DonationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_authenticated_users_can_donate()
    {
        $response = $this->post('/donations', [
            'name' => 'Test Donation',
            'amount' => 100,
        ]);

        $response->assertRedirect('/login');

        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post('/donations', [
            'name' => 'Test Donation',
            'amount' => 100,
        ]);

        $response->assertStatus(302); // Redirect to the page after donation is stored
        $this->assertDatabaseHas('donations', [
            'name' => 'Test Donation',
            'amount' => 100,
        ]);
    }
}
