<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Product;

class AddToCartTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function add_to_cart_merges_duplicate_products()
    {
        // Optional while debugging (remove later)
        $this->withoutExceptionHandling();

        // 1. Create user
        $user = User::factory()->create();

        // 2. Create active product with stock
        $product = Product::factory()->create([
            'price' => 100,
            'stock' => 10,
            'is_active' => true,
        ]);

        // 3. Authenticate user using Sanctum
        $this->actingAs($user, 'sanctum');

        // 4. Add product first time
        $this->postJson('/api/cart/items', [
            'product_id' => $product->id,
            'qty' => 1,
        ])->assertStatus(201);

        // 5. Add same product again
        $this->postJson('/api/cart/items', [
            'product_id' => $product->id,
            'qty' => 1,
        ])->assertStatus(201);

        // 6. Assert only ONE cart item exists
        $this->assertDatabaseCount('cart_items', 1);

        // 7. Assert quantity is merged
        $this->assertDatabaseHas('cart_items', [
            'product_id' => $product->id,
            'qty' => 2,
        ]);
    }
}
