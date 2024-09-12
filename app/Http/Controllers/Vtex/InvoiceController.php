<?php

namespace App\Http\Controllers\Vtex;

use App\Http\Controllers\Controller;
use App\Helpers\Vtex;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Retrieve a list of invoices for a specific order.
     */
    public function index($orderId)
    {
        // Retrieve invoices for the given order from VTEX
        $invoices = Vtex::getInvoices($orderId);
        return response()->json($invoices);
    }

    /**
     * Create a new invoice for a specific order.
     */
    public function store(Request $request, $orderId)
    {
        // Create an invoice for a given order in VTEX
        $invoice = Vtex::createInvoice($orderId, $request->all());
        return response()->json($invoice);
    }
}
