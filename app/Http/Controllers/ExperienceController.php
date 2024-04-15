<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\experience;

class experienceController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function add(Request $request)
    {
        $experience= new experience;
        $experience->first_name = $request->first_name;
        $experience->last_name = $request->last_name;
        $experience->phone_number = $request->phone;
        $experience->email = $request->email;
        $experience->date_of_the_event= $request->date_of_the_event;
        $experience->save();
        return redirect('/experience');  
    }
    public function index()
    {
        $experiences = experience::all();
        return view('home', ['experiences' => $experiences]);
    }
    
    public function infoExperience($id){
        $experience = experience::find($id);
        return view('experienceInfo', ['experience' => $experience]);
    }

    public function infoEditexperience($id){
        $experience = experience::find($id);
        return view('experienceEdit', ['experience' => $experience]);
    }

    // public function edit($id)
    // {
    //     $experience = experience::find($id);
    //     return view('experienceEdit', ['experience' => $experience, 'groups' => $groups]);
    // }
    
    public function update(Request $request, $id)
    {
        $experience = experience::find($id);
        $experience->first_name = $request->first_name;
        $experience->last_name = $request->last_name;
        $experience->phone_number = $request->phone;
        $experience->email = $request->email;
        $experience->save();
        return redirect('/');  
    }
    /**
     * Show the experience for creating a new resource.
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
     * Show the experience for editing the specified resource.
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
