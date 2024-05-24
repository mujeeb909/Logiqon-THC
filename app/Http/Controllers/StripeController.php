<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\User;
use App\Models\Plans;
use App\Models\PlanHistory;
use Illuminate\Http\Request;
use App\Models\PaymentTransaction;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StripeController extends Controller
{

    public function makePayment(Request $request)
    {


        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $planName = $request->input('plan_name');
        $planDuration = $request->input('duration');
        $planAmount = $request->input('amount');

        $userId = Session::get('user_id');


        $total = $planAmount * 100;

        $user = User::where('id', $userId)->first();



        try {
            $customerList = \Stripe\Customer::all(['email' => $user->email]);
            $customer = $customerList->data[0] ?? null;
        } catch (\Stripe\Exception\ApiErrorException $e) {

            return redirect()->back()->with('error', 'Failed to retrieve customer information.');
        }

        if (!$customer) {
            try {
                $customer = \Stripe\Customer::create(['email' => $user->email]);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                return redirect()->back()->with('error', 'Failed to create new customer.');
            }
        }

        $session = \Stripe\Checkout\Session::create([
            'customer' => $customer->id,
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'USD',
                        'product_data' => [
                            'name' => $planName,
                        ],
                        'unit_amount' => $total,
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            // Omit session_id here
            'success_url' => route('success', [
                'user_id' => $userId,
                'name' => $planName,
                'duration' => $planDuration,
                'amount' => $planAmount,
            ]),
            'cancel_url' => route('cancel', []),
        ]);


        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {

        $userId = $request->query('user_id');
        $planName = $request->query('name');
        $duration = $request->query('duration');
        $amount = $request->query('amount');

        $plan = Plans::where('name', $planName)
            ->where('duration', $duration)
            ->first();
        $planId = $plan->id;


        $user = User::where('id', $userId)->first();

        $user->plan_id = $planId;
        $user->subscription_status = 1;
        $user->save();

        $paymentTransaction = new PaymentTransaction();
        $paymentTransaction->plan_id = $planId;
        $paymentTransaction->user_id = $userId;
        $paymentTransaction->amount = $amount;
        $paymentTransaction->created_at = Carbon::now();
        $paymentTransaction->updated_at = Carbon::now();
        $paymentTransaction->save();

        $planHistory = new PlanHistory();
        $planHistory->plan_id = $planId;
        $planHistory->user_id = $userId;
        $planHistory->user_id = $userId;
        $planHistory->start_date = Carbon::now();
        $planHistory->end_date = Carbon::now()->addDays(30);
        $planHistory->subscription_status = 1;
        $planHistory->save();



        return redirect()->route('admin-dashboard')->with(['status' => 'success', 'message' => 'Congrats you have purchased our plan   Welcome..! ']);
    }




    public function cancel(Request $request)
    {
        return redirect()->route('purchase-plan')->with(['status' => 'false', 'message' => 'Your payment is declined']);
    }
}
