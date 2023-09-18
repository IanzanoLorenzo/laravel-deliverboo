<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\orderDishRelation;
use App\Models\Dish;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = config('orders');

        $dishes = Dish::all();

        foreach($orders as $order){
            $total_price = 0;
            $new_order = new Order();
            $new_order->resturant_id = $order['restaurant_id'];
            $new_order->address = $order['address'];
            $new_order->customer_email = $order['customer_email'];
            $new_order->customer_name = $order['customer_name'];
            $new_order->customer_surname = $order['customer_surname'];
            $new_order->delivery_time = $order['delivery_time'];
            $new_order->note = $order['note'];
            $new_order->total_price = 0;
            $new_order->save();
            foreach($order['dishes'] as $dish){
                $order_dish = new orderDishRelation();
                $order_dish->order_id = $new_order->id;
                $order_dish->dish_id = $dish['dish_id'];
                $order_dish->n_dish = $dish['n_dish'];
                $total_price = $dishes[$dish['dish_id'] - 1]->price * $dish['n_dish'];
                $order_dish->save();
            };
            $new_order->total_price = $total_price;
            $new_order->update();
        };
    }
}
