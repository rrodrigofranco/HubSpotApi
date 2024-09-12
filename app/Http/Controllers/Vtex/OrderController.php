<?php

namespace App\Http\Controllers\Vtex;

use App\Http\Controllers\Controller;
use App\Helpers\Vtex;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index(Request $request)
    {
        // Retrieve a list of orders from VTEX, allowing query parameters
        $orders = Vtex::getOrders($request->all());
        return response()->json($orders);
    }

    /**
     * Store a newly created order in VTEX.
     * VTEX usually handles order creation automatically, but in case you need custom logic.
     */
    public function store(Request $request)
    {
        // Create a new order in VTEX (if applicable)
        $order = Vtex::createOrder($request->all());
        return response()->json($order);
    }

    /**
     * Display a specific order.
     */
    public function show($orderId)
    {
        // Retrieve a specific order from VTEX by ID
        $order = Vtex::getOrder($orderId);
        return response()->json($order);
    }

    /**
     * Update the specified order in VTEX.
     */
    public function update(Request $request, $orderId)
    {
        // Update a specific order in VTEX
        $updatedOrder = Vtex::updateOrder($orderId, $request->all());
        return response()->json($updatedOrder);
    }

    /**
     * Remove the specified order from VTEX.
     */
    public function destroy($orderId)
    {
        // Delete or cancel a specific order in VTEX
        $deletedOrder = Vtex::deleteOrder($orderId);
        return response()->json($deletedOrder);
    }

    /**
     * Retrieve invoices for a specific order.
     */
    public function getInvoices($orderId)
    {
        // Retrieve invoices for a specific order from VTEX
        $invoices = Vtex::getInvoices($orderId);
        return response()->json($invoices);
    }

    /**
     * Retrieve payments for a specific order.
     */
    public function getPayments($orderId)
    {
        // Retrieve payments for a specific order from VTEX
        $payments = Vtex::getPayments($orderId);
        return response()->json($payments);
    }
}

