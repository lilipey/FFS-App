<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\experience;
use App\Models\Activity;

class experienceController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {
        $experience= new experience;
        $experience->first_name = $request->first_name;
        $experience->last_name = $request->last_name;
        $experience->phone_number = $request->phone;
        $experience->email = $request->email;
        $experience->date_of_the_event= $request->date_of_the_event; 
        $experience->status = 1;
        $experience->activity_id = $request->activity_id;
        // dd($experience->status);
        $experience->save();
        return redirect('/experience.store');  
    }

    public function index()
    {
        $experiences = Experience::all();
        $activities = Activity::all(); 
        return view('home', ['experiences' => $experiences, 'activities' => $activities]);
    }

    public function create(){
        $activities = Activity::all(); // Changez $activity en $activities
        return view('experiences.store', ['activities'=> $activities ]);
    }
    
    // public function infoExperience($id){
    //     $experience = experience::find($id);
    //     return view('experienceInfo', ['experience' => $experience]);
    // }

    // public function infoEditexperience($id){
    //     $experience = experience::find($id);
    //     return view('experienceEdit', ['experience' => $experience]);
    // }

    // public function edit($id)
    // {
    //     $experience = experience::find($id);
    //     return view('experienceEdit', ['experience' => $experience, 'groups' => $groups]);
    // }
    
    public function update(Request $request, $id)
    {
        $experience = experience::find($id);
        // dd($experience->status);
        if ($experience->status === 3) {
            // dd('You cannot edit this experience');
            return redirect('/');
        }
        $experience->first_name = $request->first_name;
        $experience->last_name = $request->last_name;
        $experience->phone_number = $request->phone;
        $experience->email = $request->email;
        if ($experience->status === 2) {
            $experience->status = 3;
            $experience->save();
        }
        $experience->save();
        return redirect('/');  
    }

    public function destroy($id)
    {
        $experience = experience::find($id);
        $experience->delete();
        return redirect('/');  
    }
    public function reviewExperience($id){
        $experience = experience::find($id);
    }
    public function edit($id)
    {
        $experience = Experience::find($id);
        if($experience->status === 1){
            $experience->status = 2;
        }
        else{
            $experience->status = 3;
        }
        
        $experience->save();

        return view('experienceEdit', ['experience' => $experience]);
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
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(Experience $id)
    {
        $experience = experience::find($id);
        return view('experienceInfo', ['experience' => $experience]);
    }

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
    // public function destroy(string $id)
    // {
    //     //
    // }
}
