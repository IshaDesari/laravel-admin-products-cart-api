<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;

class CheckoutTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function checkout_fails_when_stock_is_insufficient_and_cart_is_not_cleared()
    {
        // Optional for debugging
        // $this->withoutExceptionHandling();

        // Create user
        $user = User::factory()->create();

        // Create product with LOW stock
        $product = Product::factory()->create([
            'price' => 500,
            'stock' => 1, // only 1 in stock
            'is_active' => true,
        ]);

        // Authenticate user
        $this->actingAs($user, 'sanctum');

        // Create cart
        $cart = Cart::create([
            'customer_id' => $user->id,
        ]);

        // Add more qty than available stock
        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'qty' => 2,   // requesting 2 but only 1 in stock
            'price_at_time' => $product->price,
        ]);

        // Attempt checkout
        $response = $this->postJson('/api/cart/checkout');

        // Assert checkout FAILED
        $response->assertStatus(422);

        // Assert stock was NOT deducted
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'stock' => 1,
        ]);

        // Assert cart NOT cleared
        $this->assertDatabaseHas('cart_items', [
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'qty' => 2,
        ]);
    }
}
