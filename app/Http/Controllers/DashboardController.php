<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Experience;
use Illuminate\Http\Request;

use App\Traits\ExperiencesTrait;


class DashboardController extends Controller
{
    use ExperiencesTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $data = $this->getData($request);
        return view('dashboard', $data);

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
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Experience $experience)
    // {
    //     return view('experiences.edit', ['experience' => $experience]);
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Experience $experience)
    // {
    //     if ($experience->published_at === null){
    //         $experience->first_name = $request->first_name;
    //         $experience->last_name = $request->last_name;
    //         $experience->site_name = $request->site_name;
    //         $experience->title = $request->title;
    //         $experience->place = $request->place;
    //         $experience->date = $request->date;
    //         $experience->distance = $request->distance;
    //         $experience->description = $request->description;
    //         $experience->email = $request->email;
    //         if($request->hasFile('image')) {
    //             $image = $request->file('image');
    //             $filename = time() . '.' . $image->getClientOriginalExtension();
    //             $location = public_path('images/' . $filename);
    //             Image::make($image)->resize(800, 400)->save($location);
    //             $experience->image = $filename;
    //         } 
    //         if ($request->has('published')) {
    //             // dd(now());
    //             $experience->published_at = now();
    //             $show = true;
                
    //         }
    //         $experience->save();
    //     } else{
    //         dd('You cannot edit this experience');
    //     }   
    //     return redirect('/');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect('/');  
    }
}
