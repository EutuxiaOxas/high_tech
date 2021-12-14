<?php

namespace App\Http\Controllers;

use App\Account;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\TransactionOrder;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Mail\OrderCreated;
use App\Mail\TransactionCreated;
use Illuminate\Support\Facades\Mail;

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
    public function create(){

        if(session()->has('shoppingCar')){

            $shoppingCar = session('shoppingCar');
            $productsInShoppingCar = json_decode($shoppingCar);
    
            $buyer   = Auth::user();
            $user_id = Auth::id();
            $amount  = 0;

            foreach ($productsInShoppingCar as $product) {
                $amount += ($product->quantity * $product->price);
            }
    
            $order = new Order;
            $order->create([
                'user_id' => $user_id,
                'amount'  => $amount,
                'status'  => 'active',
            ]);
    
            $order_id = Order::latest('id')->first()->id;
            $products = array();
            foreach ($productsInShoppingCar as $product) {
                $product_order = new OrderProduct;
    
                $product_order->create([
                    'order_id'   => $order_id,
                    'product_id' => $product->id,
                    'price'      => floatval($product->price),
                    'quantity'   => intval($product->quantity)
                ]);

                $productBuy = new \stdClass;
                $producto = Product::findOrFail($product->id);
                $productBuy->name     = $product->price;
                $productBuy->quantity = $product->quantity;
                $productBuy->title    = $producto->titulo;
                array_push($products, $productBuy);
            }
    
    
            // eliminar la variable de sesion de 'shoppingCar'
            session()->forget('shoppingCar');

            // Enviar mensaje de correo con el nombre del comprador, indicando que se ha realizado una compra 
            Mail::to('ventas@hightechinternational.net')->send(new OrderCreated($amount, $buyer, $products));
    
            return redirect()->route( 'account.create.transaction', $order_id)->with('info', 'Ahora registra tu pago');

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
        // $order_id = $order->id;
        // $trasactions = TransactionOrder::where('order_id', $order_id)->get();
        // dd($trasactions);
        // dd($order->transactions);
        // return view('cms.orders.edit_order', compact('order', 'trasactions'));
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
    public function createTransaction($order_id)    {
        $order = Order::findOrFail($order_id);
        $accounts = Account::all();
        $categories = Category::all();
        return view('transactions.index', compact('accounts', 'categories', 'order'));
    }

    public function storeTransaction(Request $request)    {
        $order_id          = $request->order_id;
        $accounts_id       = $request->accounts_id;
        $amount            = $request->amount;
        $referencia        = $request->referencia;
        $capture           = $request->file('capture');        
        $observation       = $request->observation;

        if($capture){
            $imagen = $capture->store('public');
            $payment = new TransactionOrder;
            $payment->create([
                'order_id'           => $order_id,
                'accounts_id'        => $accounts_id,
                'amount'             => $amount,
                'referencia'         => $referencia,
                'capture'            => $imagen,
                'observation'        => $observation,
            ]);
            
        }else{
            $payment = new TransactionOrder;
            $payment->create([
                'order_id'           => $order_id,
                'accounts_id'        => $accounts_id,
                'amount'             => $amount,
                'referencia'         => $referencia,
                'observation'        => $observation,
            ]);
        }

        $account = Account::findOrFail($accounts_id);
        $buyer   = Auth::user();
        Mail::to('ventas@hightechinternational.net')->send(new TransactionCreated($amount, $account, $referencia, $buyer, $observation));

        $order = Order::findOrFail($order_id);
    	return redirect()->route('cms.purchases.edit', [$order])->with('message', 'Se registro tu pago exitosamente!');
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
