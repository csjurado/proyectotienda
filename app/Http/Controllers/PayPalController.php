<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{

    public function pagopaypal()
    {
        return view('clientes.pagoPayPal');
    }
    public function RequestPayment(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $amount = $request->amount;

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "aplication_context" => [
                "return_url" => route('paymentsuccess'),
                "cancel_url" => route('paymentCancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "$amount"
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()->route('pagopaypal')->with('error', 'Algo salío mal');
        } else {
            return redirect()->route('pagopaypal')->with('error', $response['message'] ?? 'Algo sali+o mal');
        }
    }
    public function PaymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider ->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()->route('pagopaypal')->with('success', 'Transacción Completada');
        } else {
            return redirect()->route('pagopaypal')->with('error', $response['message'] ?? 'Algo sali*o mal');
        }
    }
    public function PaymentCancel()
    {
        return redirect()->with('error', $response['message'] ?? 'Tu transaccion ha sido cancelada');
    }

    //...
}
