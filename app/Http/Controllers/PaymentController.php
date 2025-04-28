<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display the plans page
     */
    public function showPlans()
    {
        return view('plans');
    }

    /**
     * Process the payment for a plan
     */
    public function processPayment(Request $request)
    {
        // Validate the request
        $request->validate([
            'plan_name' => 'required|string',
            'amount' => 'required|numeric',
            'utr_id' => 'required|string',
        ]);

        // Create the payment record
        $payment = new Payment();
        $payment->utr_id = $request->utr_id;
        $payment->user_id = Auth::id();
        $payment->plan_name = $request->plan_name;
        $payment->payment_status = 'pending'; // Admin will verify and update status
        $payment->save();

        // Redirect to a thank you page
        return redirect()->route('payment.thank-you')->with('message', 'Your payment is being processed. Once verified, your plan will be activated.');
    }

    /**
     * Display thank you page
     */
    public function thankYou()
    {
        return view('payment.thank-you');
    }
}