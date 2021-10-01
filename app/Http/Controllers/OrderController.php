<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Auth::user()->hasRole('buyer');

        if(session()->has('shoppingCar')){

            $shoppingCar = session('shoppingCar');
            $productsInShoppingCar = json_decode($shoppingCar);
    
            $user_id = Auth::id();
            $amount=0;

            foreach ($productsInShoppingCar as $product) {
                $amount += ($product->quantity * $product->price);
            }
    
            $order = new Order;
            $order->create([
                'user_id' => $user_id,
                'amount' => $amount,
                'status' => 'active',
            ]);
    
            $order_id = Order::latest('id')->first()->id;
    
            foreach ($productsInShoppingCar as $product) {
                $product_order = new OrderProduct;
    
                $product_order->create([
                    'order_id' => $order_id,
                    'product_id' => $product->id,
                    'price' => floatval($product->price),
                    'quantity' => intval($product->quantity)
                ]);
            }
    
    
            // eliminar la variable de sesion de 'shoppingCar'
            session()->forget('shoppingCar');
    
            return route('order.transaction');
        }else{
            return 'false';
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('transactions.index');
    }
}
