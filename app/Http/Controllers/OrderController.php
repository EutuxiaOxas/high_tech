<?php

namespace App\Http\Controllers;

use App\Account;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\Category;
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
        // return Auth::user()->hasRole('buyer');

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
    
            // return route('order.transaction');
            return redirect()->route('cms.index')->with('info', 'Compra realizada exitosamente');
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
        return view('cms.orders.edit_order', compact('order'));
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
        $new_status = $request->status;
        $order_id = $request->order_id;
        $order = Order::findOrFail($order_id);

        $order->update([
            'status' => $new_status
        ]);

        // reducir la cantidad en inventario
        if( $new_status == 'complete' ){

            $products = $order->products_purchase;
            foreach ($products as $product) {
    
                $quantity_order = $product->quantity;
                $product_id = $product->product_id;
    
                $product_to_update = Product::findOrFail($product_id);
                $quantity_bd = $product_to_update->quantity;
                $quantity_total = $quantity_bd - $quantity_order;
    
                $product_to_update->update([
                    'quantity' => $quantity_total
                ]);
            }

        }
        
        return back()->with('info', 'Orden actualizada Exitosamente!');
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
        $accounts = Account::all();
        $categories = Category::all();
        return view('transactions.index', compact('accounts', 'categories'));
    }
    public function storeTransaction(Request $request)
    {
        $order_id          = $request->order_id;
        $payment_method_id = $request->payment_method_id;
        $amount            = $request->amount;
        $referencia        = $request->referencia;
        $capture           = $request->capture;
        $observation       = $request->observation;

        $payment = new PaymentOrder;
        $payment->create([
            'order_id'           => $order_id,
            'payment_methods_id' => $payment_method_id,
            'amount'             => $amount,
            'referencia'         => $referencia,
            'capture'            => $capture,
            'observation'        => $observation,
        ]);

        $user_id = Auth::id();
        $purchases = Order::where('user_id', $user_id)->orderBy('created_at','DESC')->get();
    	return view('cms.purchases.index', compact('purchases'));
    }


    public function orders(){
        $orders = Order::orderBy('created_at','DESC')->get();
    	return view('cms.orders.index', compact('orders'));
    }

    public function purchases(){
        $user_id = Auth::id();
        $purchases = Order::where('user_id', $user_id)->orderBy('created_at','DESC')->get();
    	return view('cms.purchases.index', compact('purchases'));
    }

    public function editPurchase(Request $request, Order $order)
    {
        return view('cms.purchases.edit_purchase', compact('order'));
    }
}
