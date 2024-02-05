<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Http\Request;

class FruitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fruits = Fruit::with(['category', 'unit'])->get();
        $categories = Category::all();
        $units = Unit::all();

        return view('fruit.index', ['fruits' => $fruits, 'categories' => $categories, 'units' => $units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Fruit::create($request->all());

        return redirect('fruit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fruit = Fruit::findOrFail($id);
        $fruit->update($request->all());

        return redirect('fruit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fruit = Fruit::findOrFail($id);
        $fruit->delete();

        return redirect('fruit');
    }
}
