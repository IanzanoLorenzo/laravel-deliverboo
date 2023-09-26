<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\orderDishRelation;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Braintree\Gateway;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    protected $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey'),
        ]);
    }

    public function getToken(){
        // pass $clientToken to your front-end
        $clientToken = $this->gateway->clientToken()->generate();

        return response()->JSON([
            'success' => true,
            'response' => [
                'clientToken' => $clientToken
            ]
        ]);
    }
    
    public function processPayment(Request $request){
        
        $messages = [
            'address.required' => 'Il campo indirizzo è obbligatorio.',
            'costumer_email.required' => 'Il campo email del cliente è obbligatorio.',
            'costumer_name.required' => 'Il campo nome del cliente è obbligatorio.',
            'costumer_surname.required' => 'Il campo cognome del cliente è obbligatorio.',
            'delivery_tyme.required' => 'Il campo orario di consegna è obbligatorio.',
        ];
        
        $validator = Validator::make($request->input('order'), [
            'address'=> ['required'],
            'costumer_email'=> ['required'],
            'costumer_name'=> ['required'],
            'costumer_surname'=> ['required'],
            'delivery_tyme'=> ['required']
        ], $messages);

        if($validator->fails()){
            return response()->json(
                [
                    'success' => false,
                    'errors' => $validator->errors()
                ]
                );
        };

        $formData = $request->all();



        $orderData = $formData['order'];
        $dishesData = $formData['cart'];

        $result = $this->gateway->transaction()->sale([
            'amount' => $orderData['total_price'],
            'paymentMethodNonce' => $formData['nonce'],
            'options' => [
              'submitForSettlement' => True
            ]
        ]);

        if($result->success){
            $new_order = new Order;
            $new_order->resturant_id = $orderData['resturant_id'];
            $new_order->address = $orderData['address'];
            $new_order->customer_email = $orderData['costumer_email'];
            $new_order->customer_name = $orderData['costumer_name'];
            $new_order->customer_surname = $orderData['costumer_surname'];
            $new_order->delivery_time = $orderData['delivery_time'];
            $new_order->total_price = $orderData['total_price'];
            $new_order->save();

            foreach($dishesData as $dish){
                $order_dish = new orderDishRelation();
                $order_dish->order_id = $new_order->id;
                $order_dish->dish_id = $dish['id'];
                $order_dish->n_dish = $dish['quantity'];
                $order_dish->save();
            };

            return response()->json([
                'success' => true,
                'response' => 'Pagamento effettuato con successo',
                'transactionId' => $result->transaction->id,
            ]);
        }else{
            return response()->json([
                'success' => false,
                'response' => 'Pagamento annullato',            
            ]);
        }

    }
}
