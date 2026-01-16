<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\UpdateCartItemRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Add item to cart (merge if exists)
     */
    public function store(AddToCartRequest $request)
    {
        $user = auth()->user();

        if ($user->is_admin) {
            return response()->json([
                'status' => false,
                'message' => 'Admins cannot access customer APIs',
                'data' => []
            ], 403);
        }

        $product = Product::where('id', $request->product_id)
            ->where('is_active', true)
            ->firstOrFail();

        $cart = Cart::firstOrCreate([
            'customer_id' => $user->id
        ]);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($item) {
            $item->qty += $request->qty;
            $item->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'qty' => $request->qty,
                'price_at_time' => $product->price
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Item added to cart',
            'data' => []
        ], 201);
    }

    /**
     * View cart
     */
    public function show()
    {
        $cart = Cart::with('items.product')
            ->where('customer_id', auth()->id())
            ->first();

        if (!$cart) {
            return response()->json([
                'status' => true,
                'message' => 'Cart is empty',
                'data' => [
                    'items' => [],
                    'total' => 0
                ]
            ], 200);
        }

        $total = $cart->items->sum(function ($item) {
            return $item->qty * $item->price_at_time;
        });

        return response()->json([
            'status' => true,
            'message' => 'Cart details fetched',
            'data' => [
                'items' => $cart->items,
                'total' => $total
            ]
        ], 200);
    }

    /**
     * Update cart item qty
     */
    public function update(UpdateCartItemRequest $request, $product_id)
    {
        $cart = Cart::where('customer_id', auth()->id())->firstOrFail();

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product_id)
            ->firstOrFail();

        $item->update([
            'qty' => $request->qty
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cart item updated',
            'data' => []
        ], 200);
    }

    /**
     * Remove item from cart
     */
    public function destroy($product_id)
    {
        $cart = Cart::where('customer_id', auth()->id())->firstOrFail();

        CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product_id)
            ->delete();

        return response()->json([
            'status' => true,
            'message' => 'Item removed from cart',
            'data' => []
        ], 200);
    }
}