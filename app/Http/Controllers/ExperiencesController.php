<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Activity;
use Illuminate\Http\Request;

class ExperiencesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::all();

        return view('experiences.index', ['experiences' => $experiences]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activities = Activity::all();
        return view('experiences.create', ['activities' => $activities ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $experience= new Experience;
        $experience->first_name = $request->first_name;
        $experience->last_name = $request->last_name;
        $experience->phone_number = $request->phone;
        $experience->email = $request->email;
        $experience->date_of_the_event= $request->date_of_the_event; 
        $experience->status = 1;
        $experience->activity_id = $request->activity_id;
        // dd($experience->status);
        $experience->save();
        return redirect()->route('experiences.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        return view('experiences.show', ['experience' => $experience]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        return view('experiences.edit', ['experience' => $experience]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        // dd($experience->status);
        if ($experience->status !=null) {
            // dd('You cannot edit this experience');
            return redirect('/');
        }
        $experience->first_name = $request->first_name;
        $experience->last_name = $request->last_name;
        $experience->phone_number = $request->phone;
        $experience->email = $request->email;
        $experience->save();
        return redirect('/');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect('/');  
    }
}
