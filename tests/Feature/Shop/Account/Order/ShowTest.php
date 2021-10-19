<?php

namespace Tests\Feature\Shop\Account\Order;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Shop\ShopTestCase;

class ShowTest extends ShopTestCase
{
    use RefreshDatabase;

    public function test_unauthenticated()
    {
        /** @var Order $order */
        $order = Order::factory()->create([
            'organization_id' => $this->getOrganization()->id,
        ]);

        $response = $this->get("{$this->getUrl()}/orders/{$order->id}");

        $response->assertRedirect('login');
    }

    public function test_authenticated_not_assigned()
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Order $order */
        $order = Order::factory()->create([
            'organization_id' => $this->getOrganization()->id,
        ]);

        $response = $this->actingAs($user)->get("{$this->getUrl()}/orders/{$order->id}");

        $response->assertNotFound();
    }

    public function test_authenticated_assigned()
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Order $order */
        $order = Order::factory()->create([
            'organization_id' => $this->getOrganization()->id,
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->get("{$this->getUrl()}/orders/{$order->id}");

        $response->assertSuccessful();
    }
}
