<?php

namespace Tests\Feature\Tests\Feature;

class ProductTest
{
    /** @test */
    public function testExample()
    {
        $response = $this->get('/products');
        Product::factory()->count(5)->create();

        $response->assertStatus(200);
    }

}
