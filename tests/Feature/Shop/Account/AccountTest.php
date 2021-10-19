<?php

namespace Tests\Feature\Shop\Account;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Shop\ShopTestCase;

class AccountTest extends ShopTestCase
{
    use RefreshDatabase;
    
    public function test_unauthenticated()
    {
        $response = $this->get("{$this->getUrl()}/account");

        $response->assertStatus(302)->assertRedirect('/login');
    }

    public function test_authenticated_without_orders()
    {
        /** @var User $user */
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get("{$this->getUrl()}/account");

        $response->assertSuccessful();
    }

    public function test_authenticated_with_orders()
    {
        /** @var User $user */
        $user = User::factory()->create();

        Order::factory(5)->create([
            'organization_id' => $this->getOrganization()->id,
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->get("{$this->getUrl()}/account");

        $response->assertSuccessful();
    }
}
