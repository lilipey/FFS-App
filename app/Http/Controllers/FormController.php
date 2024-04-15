<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Form;

class FormController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function add(Request $request)
    {
        $form= new Form;
        $form->first_name = $request->first_name;
        $form->last_name = $request->last_name;
        $form->phone_number = $request->phone;
        $form->email = $request->email;
        $form->date_of_the_event= $request->date_of_the_event;
        $form->save();
        return redirect('/form');  
    }
    // public function index()
    // {
    //     $forms = form::all();
    //     return view('form', ['forms' => $forms]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
