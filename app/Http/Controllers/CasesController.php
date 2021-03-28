<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Validator;
use Redirect;
use App\InputCard;
use App\Card;
use Illuminate\Support\Str;
class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('category')->where('status', 1)->paginate(9);
        return view('cases')
            ->with("projects", $projects);
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

    public function list_cards(Request $request)
    {
        $project = Project::findOrFail($request->id);
        return $project->category->cards;
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

    public function add_input(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'type_text' => 'required',
            'margin_top' => 'required',
            'margin_right' => 'required',
            'color' => 'required',
        ]);
        $card = Card::where('id', $request->card_id)->firstOrFail();
        $slug_title =  Str::slug($card->title, '-');
        $slug_name =  Str::slug($request->name, '-');
        $name = $slug_title.'-'.$slug_name;
        $input_cards = InputCard::where('name', $name)->count();
        if ($input_cards != 0)
            return response()->json(['status' => 'error', 'errors' => ['name' => ['قم بتغيير اسم الخانة لقد تمت اضافتها سابقا']]], 422);
        $input_cards = InputCard::create([
            'title' => $request['title'],
            'name' => $name,
            'type_text' => $request['type_text'],
            'margin_top' => $request['margin_top'],
            'margin_right' => $request['margin_right'],
            'color' => $request['color'],
            'card_id' =>  $request['card_id'],
        ]);
        return response()->json(['status' => 'success', 'data' => $input_cards], 201);
    }
}
