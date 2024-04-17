<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use DateTime;

class ExperiencesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $experiences = Experience::all();
        // $experience = Experience::whereNotNull('published_at')->get();
        // return view('experiences.index', ['experiences' => $experiences]);
        

        $search = $request->get('search');
        $activity_select = $request->get('activity');
        $date = $request->get('date');
        $date2 = $request->get('date2');
        $formatted_date = new DateTime($date);
        $formatted_date2 = new DateTime($date2);
        $date_period = $request->get('date-period');

        $query = Experience::query();
        $activities = $query->pluck('activity')->unique();

        if ($activity_select) {
            $query->where('activity', $activity_select);
        }
        
        if ($date_period == 'before' && $date != null) {
            $query->where('date', '<', $formatted_date);
        } elseif ($date_period == 'after' && $date != null) {
            $query->where('date', '>', $formatted_date);
        } elseif ($date_period == 'between' && $date != null && $date2 != null) {
            $query->whereBetween('date', [$formatted_date, $formatted_date2]);
        }

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('site_name', 'like', "%{$search}%");
            });
        }

        $experiences = $query->whereNotNull('published_at')->orderBy('published_at', 'desc')->get();
        // $activities = $query->pluck('activity')->unique();

        return view('experiences.index', compact('experiences', 'activities'), [
            'search' => $search,
            'activity_select' => $activity_select,
            'date_period' => $date_period,
            'date' => $date,
            'date2' => $date2,
        ]);
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
        $experience->site_name = $request->site_name;
        $experience->title = $request->title;
        $experience->place = $request->place;
        $experience->date = $request->date;
        $experience->distance = $request->distance;
        $experience->description = $request->description;
        $experience->email = $request->email;

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $experience->image = $filename;
        }

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
        // $request->dd();
        // dd($experience->status);
        // if ($experience->status !=null) {
        //     // dd('You cannot edit this experience');
        //     return redirect('/');
        // }
        $experience->first_name = $request->first_name;
        $experience->last_name = $request->last_name;
        $experience->site_name = $request->site_name;
        $experience->title = $request->title;
        $experience->place = $request->place;
        $experience->date = $request->date;
        $experience->distance = $request->distance;
        $experience->description = $request->description;
        $experience->email = $request->email;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $experience->image = $filename;
        }
        
        if ($request->has('published')) {
            // dd(now());
            $experience->published_at = now();
            $show = true;
            
        }
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
