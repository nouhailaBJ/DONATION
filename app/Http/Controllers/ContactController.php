<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactCat;
use App\Contact;
use Validator;
Use Redirect;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_cats = ContactCat::all();
        return view('contact')
            ->with('contact_cats', $contact_cats);
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
        $validation = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'subject' => 'required',
            'message' => 'required',
            'phone' => 'required|numeric|min:9',
            'cat' => 'required|integer',
        ]);
        if  ($validation->fails())
        {
            return back()
            ->withErrors($validation)
            ->withInput();
        }
        $contact  = Contact::create([
            'full_name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'phone' => $request->phone,
            'contact_cat_id' => $request->cat
        ]);
        
        return Redirect::back()->with('success', 'تمت اضافة تقييمك بنجاح شكرا على رأيك');
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
}
