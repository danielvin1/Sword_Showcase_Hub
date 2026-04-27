<?php

namespace App\Http\Controllers;

use App\Models\SwordOrder;
use Illuminate\Http\Request;

class SwordOrderController extends Controller
{
    public function store(Request $request)
    {
        if (! session('user_id')) {
            return redirect('/register')->with('error', 'Please create an account to place an order.');
        }

        if ($request->filled('cart_items')) {
            $validated = $request->validate([
                'cart_items' => 'required|string',
                'total_amount' => 'required|numeric|min:0.01',
                'paypal_order_id' => 'required|string|max:120',
                'description' => 'nullable|string|max:1200',
            ]);

            $items = json_decode($validated['cart_items'], true);

            if (! is_array($items) || count($items) === 0) {
                return back()->with('error', 'Your cart is empty. Add at least one sword before checkout.');
            }

            $normalizedItems = [];
            $computedTotal = 0;

            foreach ($items as $item) {
                $name = trim((string) ($item['name'] ?? ''));
                $type = trim((string) ($item['type'] ?? 'Custom Sword'));
                $price = (float) ($item['price'] ?? 0);
                $quantity = (int) ($item['quantity'] ?? 0);

                if ($name === '' || $price <= 0 || $quantity <= 0) {
                    return back()->with('error', 'One or more cart items are invalid. Please review your cart and try again.');
                }

                $lineTotal = round($price * $quantity, 2);
                $computedTotal += $lineTotal;

                $normalizedItems[] = [
                    'name' => $name,
                    'type' => $type,
                    'quantity' => $quantity,
                    'line_total' => $lineTotal,
                ];
            }

            $computedTotal = round($computedTotal, 2);
            $providedTotal = round((float) $validated['total_amount'], 2);

            if (abs($computedTotal - $providedTotal) > 0.01) {
                return back()->with('error', 'Cart total did not match the checkout amount. Please try again.');
            }

            $notes = trim((string) ($validated['description'] ?? ''));
            $notesPrefix = $notes !== '' ? $notes . "\n\n" : '';

            foreach ($normalizedItems as $item) {
                SwordOrder::create([
                    'user_id' => session('user_id'),
                    'sword_name' => $item['name'],
                    'sword_type' => $item['type'],
                    'budget' => 'EUR ' . number_format($item['line_total'], 2),
                    'timeline' => 'Qty: ' . $item['quantity'],
                    'description' => $notesPrefix . 'PayPal Order ID: ' . $validated['paypal_order_id'],
                    'status' => 'Paid',
                ]);
            }

            return back()->with('success', 'Payment confirmed. Your sword order has been placed.');
        }

        $validated = $request->validate([
            'sword_name' => 'required|string|max:120',
            'sword_type' => 'required|string|max:100',
            'budget' => 'nullable|string|max:60',
            'timeline' => 'nullable|string|max:60',
            'description' => 'nullable|string|max:1200',
        ]);

        SwordOrder::create([
            'user_id' => session('user_id'),
            'sword_name' => $validated['sword_name'],
            'sword_type' => $validated['sword_type'],
            'budget' => $validated['budget'] ?? null,
            'timeline' => $validated['timeline'] ?? null,
            'description' => $validated['description'] ?? null,
            'status' => 'Open',
        ]);

        return back()->with('success', 'Your sword order has been placed.');
    }
}