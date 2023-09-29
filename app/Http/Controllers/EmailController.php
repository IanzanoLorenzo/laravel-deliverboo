<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmailToCustomer(Request $request)
    {
        // Ottieni i dati necessari dal payload della richiesta
        $customerEmail = $request->input('customer_email');
        $orderDetails = $request->input('order_details');

        try {
            // Invia l'email al cliente utilizzando la classe email OrderConfirmation
            Mail::to($customerEmail)->send(new OrderConfirmation($orderDetails));

            return response()->json(['message' => 'Email al cliente inviata con successo']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Errore nell\'invio dell\'email al cliente'], 500);
        }
    }

    public function sendEmailToRestaurant(Request $request)
    {
        // Ottieni i dati necessari dal payload della richiesta
        $restaurantEmail = $request->input('restaurant_email');
        $orderDetails = $request->input('order_details');

        try {
            // Invia l'email al ristoratore utilizzando la classe email RestaurantConfirmation
            Mail::to($restaurantEmail)->send(new RestaurantConfirmation($orderDetails));

            return response()->json(['message' => 'Email al ristoratore inviata con successo']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Errore nell\'invio dell\'email al ristoratore'], 500);
        }
    }
}
