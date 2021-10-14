<?php

namespace Tests\Feature\Shop;

use App\Models\Organization;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopTestCase extends TestCase
{
    use RefreshDatabase;

    /** @var Organization $organization */
    private $organization;

    protected function setUp(): void
    {
        parent::setUp();

        if (!isset($this->organization)) {
            $this->organization = Organization::factory()->create();
        }
    }

    /**
     * @return mixed
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * Return the full URL of the organization
     * @return string
     */
    public function getUrl(): string
    {
        return "http://{$this->organization->subdomain}.rezer.test";
    }
}
