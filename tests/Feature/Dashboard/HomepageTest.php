<?php

namespace Tests\Feature\Dashboard;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_unauthorized()
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(302);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_without_organization()
    {
        /** @var User $user */
        $user = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(401);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_authorized()
    {
        /** @var Organization $organization */
        $organization = Organization::factory()->create();

        /** @var User $user */
        $user = User::factory()->create([
            'role' => 'admin',
            'organization_id' => $organization->id
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
    }
}
