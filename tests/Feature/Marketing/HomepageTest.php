<?php

namespace Tests\Feature\Marketing;

use Tests\TestCase;

class HomepageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
