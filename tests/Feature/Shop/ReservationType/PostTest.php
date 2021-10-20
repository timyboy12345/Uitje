<?php

namespace Tests\Feature\Shop\ReservationType;

use App\Models\Order;
use App\Models\ReservationType;
use App\Models\User;
use Tests\Feature\Shop\ShopTestCase;

class PostTest extends ShopTestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_invalid_reservation_type()
    {
        $response = $this->post("{$this->getUrl()}/nonexistingreservationtype");

        $response->assertStatus(404);
    }

    public function test_valid_reservation_type()
    {
        /** @var ReservationType $reservationType */
        $reservationType = ReservationType::factory()->create([
            'organization_id' => $this->getOrganization()->id,
            'has_participants' => false,
            'has_accompanists' => false,
            'date_type' => null
        ]);

        $response = $this
            ->post("{$this->getUrl()}/reserve/{$reservationType->slug}", [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => 'password',
            ]);

        /** @var Order $order */
        $order = Order::first();

        $response->assertRedirect("{$this->getUrl()}/thanks/{$order->id}");
    }

    public function test_invalid_email_unauthorized()
    {
        /** @var ReservationType $reservationType */
        $reservationType = ReservationType::factory()->create([
            'organization_id' => $this->getOrganization()->id,
            'has_participants' => false,
            'has_accompanists' => false,
            'date_type' => null
        ]);

        $response = $this
            ->post("{$this->getUrl()}/reserve/{$reservationType->slug}", [
                'name' => 'test',
                'email' => 'test',
                'password' => 'password',
            ]);

        $response->assertSessionHasErrors(['email']);
    }

    public function test_invalid_password_unauthorized()
    {
        /** @var ReservationType $reservationType */
        $reservationType = ReservationType::factory()->create([
            'organization_id' => $this->getOrganization()->id,
            'has_participants' => false,
            'has_accompanists' => false,
            'date_type' => null
        ]);

        $response = $this
            ->post("{$this->getUrl()}/reserve/{$reservationType->slug}", [
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => 'short',
            ]);

        $response->assertSessionHasErrors(['password']);
    }

    public function test_valid_reservation_type_authorized()
    {
        /** @var ReservationType $reservationType */
        $reservationType = ReservationType::factory()->create([
            'organization_id' => $this->getOrganization()->id,
            'has_participants' => false,
            'has_accompanists' => false,
            'date_type' => null
        ]);

        /** @var User $user */
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post("{$this->getUrl()}/reserve/{$reservationType->slug}");

        /** @var Order $order */
        $order = Order::first();

        $response->assertRedirect("{$this->getUrl()}/thanks/{$order->id}");
    }
}
