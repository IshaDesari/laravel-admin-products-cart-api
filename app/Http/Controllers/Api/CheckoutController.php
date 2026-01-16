<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Handle cart checkout
     */
    public function checkout(Request $request)
    {
        $user = auth()->user();

        if ($user->is_admin) {
            return response()->json([
                'status' => false,
                'message' => 'Admins cannot access customer APIs'
            ], 403);
        }

        // Load cart with items & products
        $cart = Cart::with('items.product')
            ->where('customer_id', $user->id)
            ->first();

        // Empty cart validation
        if (!$cart || $cart->items->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Cart is empty'
            ], 422);
        }

        // Stock validation (MAIN FILTER)
        foreach ($cart->items as $item) {
            if ($item->qty > $item->product->stock) {
                return response()->json([
                    'status' => false,
                    'message' => "Insufficient stock for {$item->product->name}"
                ], 422);
            }
        }

        DB::beginTransaction();

        try {
            // Deduct stock
            foreach ($cart->items as $item) {
                $product = $item->product;
                $product->stock -= $item->qty;
                $product->save();
            }

            // Clear cart
            $cart->items()->delete();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Checkout successful'
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => 'Checkout failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
