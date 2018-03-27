<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
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
    public function addCart(Request $request)
    {
        $ProductId = $request->input('id');
        $Product = Product::where('id', $ProductId)->first();
        Cart::add([
            [
                'id' => $Product->id,
                'name' => $Product->product_name,
                'qty' => 1,
                'price' => $Product->standard_cost,
                'options' => ['productImage' => $Product->product_pic]]
        ]);
        return response('Item Added To Cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function showCart()
    {
        return response(Cart::content());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updateCart(Request $request)
    {
        return response($request->input('qty'));
//        Cart::update($request->input('rowId'), $request->input('qty')); // Will update the quantity
//        return response('Item Update From Cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCart(Request $request)
    {
        Cart::remove($request->input('rowId'));
        return response('Item Delete From Cart');
    }
}