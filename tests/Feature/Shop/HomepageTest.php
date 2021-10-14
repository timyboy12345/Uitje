<?php

namespace Tests\Feature\Shop;

use App\Models\Organization;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomepageTest extends ShopTestCase
{
    use RefreshDatabase;

    /**
     * Test if a non-existing organization returns a 404.
     *
     * @return void
     */
    public function test_invalid_organization()
    {
        $this
            ->get('http://nonexisting.rezer.test')
            ->assertNotFound();
    }

    /**
     * Test if an existing organization .
     *
     * @return void
     */
    public function test_valid_organization()
    {
        $this
            ->get($this->getUrl())
            ->assertSuccessful()
            ->assertViewHas('organization', function (Organization $organization) {
                return $organization->subdomain === 'dev';
            });
    }
}
