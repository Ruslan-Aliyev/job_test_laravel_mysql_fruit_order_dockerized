<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Basket;
use App\Models\Fruit;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['basket'])->get();
        $fruits = Fruit::with(['category', 'unit'])->get();
        $basket = !is_array(session()->get('basket')) && !is_object(session()->get('basket')) ? [] : session()->get('basket');

        return view('order.index', ['orders' => $orders, 'fruits' => $fruits, 'basket' => $basket]);
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

    public function add(Request $request)
    {
        $basket = session()->get('basket');
        
        if(!$basket) 
        {
            $basket = [
                    $request->input('fruit_id') => [
                        "name" => $request->input('name'),
                        "category" => $request->input('category'),
                        "unit" => $request->input('unit'),
                        "price" => $request->input('price'),
                        "quantity" => $request->input('quantity'),
                    ]
            ];
 
            session()->put('basket', $basket);
        }

        if(isset($basket[$request->input('fruit_id')])) 
        {
 
            $basket[$request->input('fruit_id')]['quantity'] += $request->input('quantity');
 
            session()->put('basket', $basket);
        }
        else
        {
            $basket[$request->input('fruit_id')] = [
                "name" => $request->input('name'),
                "category" => $request->input('category'),
                "unit" => $request->input('unit'),
                "price" => $request->input('price'),
                "quantity" => $request->input('quantity'),
            ];
 
            session()->put('basket', $basket);
        }

        return redirect('order');
    }
    public function save(Request $request)
    {
        $order = Order::create(['buyer' => $request->input('buyer')]);
        $items = $request->input('items');
        $basket = [];

        foreach($items as $fruit_id => $info)
        {
            $basket[] = [
                'order_id' => $order->id, 
                'fruit_id' => $fruit_id,
                'quantity' => $info['quantity'],
                'price' => $info['price'],
            ];
        }

        Basket::insert($basket);

        return redirect('order');
    }
    public function print(Request $request)
    {
        $order = Order::with(['basket', 'basket.fruit', 'basket.fruit.category', 'basket.fruit.unit'])->where('id', $request->order_id)->first();
        $data = ['buyer' => $order->buyer, 'items' => []];
        $total = 0;

        foreach($order->basket as $item)
        {
            $data['items'][] = [
                'category' => $item->fruit->category->name,
                'fruit' => $item->fruit->name,
                'unit' => $item->fruit->unit->unit,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'amount' => $item->price*$item->quantity,
            ];

            $total += $item->price*$item->quantity;
        }

        $data['total'] = $total;

        $receipt = Pdf::loadView('order.receipt', $data);

        return $receipt->download('order.pdf');
    }
}
