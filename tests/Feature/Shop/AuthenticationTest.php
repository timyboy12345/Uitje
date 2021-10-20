<?php

namespace Tests\Feature\Shop;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends ShopTestCase
{
    use RefreshDatabase;

    public function test_login_page_unauthenticated()
    {
        $response = $this->get("{$this->getUrl()}/login");

        $response->assertStatus(200);
    }

    public function test_login_page_authenticated()
    {
        /** @var User $user */
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get("{$this->getUrl()}/login");

        $response->assertRedirect($this->getUrl());
    }

    public function test_login_page_login_unauthenticated_empty()
    {
        $response = $this
            ->post("{$this->getUrl()}/login");

        $response->assertSessionHasErrors(['email', 'password']);
    }

    public function test_login_page_login_unauthenticated_invalid()
    {
        $response = $this
            ->post("{$this->getUrl()}/login", [
                'email' => 'test@test.com',
                'password' => 'invalid',
            ]);

        $response->assertSessionHasErrors(['login']);
    }

    public function test_login_page_login_unauthenticated_valid()
    {
        /** @var User $user */
        $user = User::factory()->create()->first();

        $response = $this
            ->post("{$this->getUrl()}/login", [
                'email' => $user->email,
                'password' => 'password',
            ]);

        $response->assertSessionHasNoErrors()->assertRedirect();
    }

    public function test_login_page_login_authenticated()
    {
        /** @var User $user */
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post("{$this->getUrl()}/login");

        $response->assertRedirect($this->getUrl());
    }
}
