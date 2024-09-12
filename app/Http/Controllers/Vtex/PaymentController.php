<?php

namespace App\Http\Controllers\Vtex;

use App\Http\Controllers\Controller;
use App\Helpers\Vtex;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Retrieve a list of payments for a specific order.
     */
    public function index($orderId)
    {
        // Retrieve payments for the given order from VTEX
        $payments = Vtex::getPayments($orderId);
        return response()->json($payments);
    }

    /**
     * Refund a specific payment.
     */
    public function refund(Request $request, $paymentId)
    {
        // Process a refund for a specific payment in VTEX
        $refund = Vtex::refundPayment($paymentId, $request->all());
        return response()->json($refund);
    }

    /**
     * Cancel a specific payment.
     */
    public function cancel($paymentId)
    {
        // Cancel a specific payment in VTEX
        $cancellation = Vtex::cancelPayment($paymentId);
        return response()->json($cancellation);
    }
}
