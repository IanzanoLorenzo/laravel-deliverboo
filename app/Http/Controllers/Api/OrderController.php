<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Braintree\Gateway;

class OrderController extends Controller
{
    public function getToken(){
        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey'),
        ]);
        
        // pass $clientToken to your front-end
        $clientToken = $gateway->clientToken()->generate();

        return response()->JSON([
            'success' => true,
            'response' => [
                'clientToken' => $clientToken
            ]
        ]);
    }

    public function processPayment(Request $request){
        $responce = $request->all();

        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey'),
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $responce['nonce'],
            'options' => [
              'submitForSettlement' => True
            ]
        ]);

        return response()->json([
            'success' => true,
            'response' => 'Pagamento effettuato con successo',
            'transactionId' => $result->transaction->id,
        ]);
    }
}
