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
    public function index()
    {
        $forms = form::all();
        return view('home', ['forms' => $forms]);
    }
    public function infoForm($id){
        $form = form::find($id);
        return view('formInfo', ['form' => $form]);
    }

    public function edit($id)
    {
        $form = form::find($id);
        $groups = Group::all(); // Get all groups to display in the form
        return view('formEdit', ['form' => $form, 'groups' => $groups]);
    }
    
    public function update(Request $request, $id)
    {
        $form = form::find($id);
        $form->first_name = $request->first_name;
        $form->last_name = $request->last_name;
        $form->phone_number = $request->phone;
        $form->email = $request->email;
        $form->save();
        $groupIds = $request->groups; // This is an array of group IDs from your form
        return redirect('/home');  
    }
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
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
