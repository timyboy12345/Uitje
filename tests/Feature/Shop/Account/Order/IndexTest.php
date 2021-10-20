<?php

namespace Tests\Feature\Shop\Account\Order;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Shop\ShopTestCase;

class IndexTest extends ShopTestCase
{
    use RefreshDatabase;

    public function test_unauthenticated()
    {
        $response = $this->get("{$this->getUrl()}/orders");

        $response->assertStatus(302)->assertRedirect('/login');
    }

    public function test_authenticated()
    {
        /** @var User $user */
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get("{$this->getUrl()}/orders");

        $response->assertStatus(200);
    }
}
