<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Stock;
use Validator;
use Redirect;
use App\Card;
use App\InputCard;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('featured', 1)->where('status', 1)->get();
        return view('welcome')->with('projects', $projects);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    public function add_stocks(Request $request)
    {
        $project = Project::findOrFail($request->project_id);
        $validation = Validator::make($request->all(),[
            'price' => 'required|integer',
        ]);
        if  ($validation->fails())
        {
            return back()
            ->withErrors($validation)
            ->withInput();
        }
        $stocks  = Stock::create([
            'price' => $request->price,
            'project_id' => $project->id,
        ]);
        return Redirect::back()->with('success', 'تمت اضافة السهم  بنجاح');
    }
    public function delete_stock($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();
        return Redirect::back()->with('success', 'تمت حذف السهم  بنجاح');
    }
    public function card($id)
    {
        $card = Card::findOrFail($id);
        $input_cards = InputCard::where('card_id', $card->id)->get();
        return view('vendor.voyager.cards', compact('card', 'input_cards'));
    }
}
