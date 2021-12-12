<?php

namespace Tests\Feature\Dashboard\Crm;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomersTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthorized()
    {
        $response = $this->get('/dashboard/crm/customers');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_authorized()
    {
        /** @var Organization $org */
        $org = Organization::factory()->create();

        /** @var User $user */
        $user = User::factory()->create([
            'role' => 'admin',
            'organization_id' => $org->id,
        ]);

        $response = $this->actingAs($user)->get('/nl-NL/dashboard/crm/customers');

        $response->assertStatus(200);
    }
}
