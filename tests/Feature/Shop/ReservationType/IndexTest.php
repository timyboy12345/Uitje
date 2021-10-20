<?php

namespace Tests\Feature\Shop\ReservationType;

use App\Models\ReservationType;
use Tests\Feature\Shop\ShopTestCase;

class IndexTest extends ShopTestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_invalid_reservation_type()
    {
        $response = $this->get("{$this->getUrl()}/nonexistingreservationtype");

        $response->assertStatus(404);
    }

    public function test_valid_reservation_type()
    {
        /** @var ReservationType $reservationType */
        $reservationType = ReservationType::factory()->create([
            'organization_id' => $this->getOrganization()->id,
        ]);

        $response = $this->get("{$this->getUrl()}/reserve/{$reservationType->slug}");

        $response->assertStatus(200);
    }
}
