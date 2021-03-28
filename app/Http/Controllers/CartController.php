<?php

namespace App\Http\Controllers;

use App\Project;
use App\Stock;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;



class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
		$validated = $request->validate([
			'giver_name' => "required",
			'giver_number'=> "required",
            'giver_email'=> "required|email:rfc,dns",
            'card_id' => "required",
			'receiver_name'=> "required",
			'receiver_number'=> "required",
			'receiver_email' => "required|email:rfc,dns",
			'id' => "required",
			'name' => "required",
			'stock_id' => "required",
			'image' => "required",
		]);

		$duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
			// return $request->all();
            return response()->json(['success_message' => 'العنصر موجود بالفعل في سلة التسوق الخاصة بك', 'data' => $request->all()]);
        }
        $stock = Stock::findOrFail($request->stock_id);

        Cart::add($request->id, $request->name, 1, $stock->price, [ 'image' => $request->image, 'user' => ['giver_name' => $request->giver_name, 'giver_email' => $request->giver_email, 'giver_number' => $request->giver_number, 'receiver_name' => $request->receiver_name, 'receiver_email' => $request->receiver_email, 'receiver_number' => $request->receiver_number]])
            ->associate('App\Project');
		// return $request->all();
        return response()->json(['success_message' => 'تمت إضافة الاداة إلى عربة التسوق', 'data' => $request->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'succesfully removed');
    }
}
