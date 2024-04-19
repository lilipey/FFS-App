<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use DateTime;

class ExperiencesController extends Controller
{

    /**trait */
    /**
     * Display a listing of the resource.
     */

    
    public function index(Request $request)
    {
        $search = $request->get('search');
        $activity_select = $request->get('activity');
        $date = $request->get('date');
        $date2 = $request->get('date2');
        
        $formatted_date = new DateTime($date);
        $formatted_date2 = new DateTime($date2);
        $date_period = $request->get('date-period');

        $query = Experience::query();
        // $published = Experience::get('published_at');
        $activities = Experience::pluck('activity')->unique();

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
            $query->whereAny(['title', 'site_name'], 'like', "%{$search}%");
        }
        if ($request->is('dashboard')) {
            $experiences = $query->whereNull('published_at')->orderBy('published_at', 'desc')->get();
            return view('dashboard', compact('experiences', 'activities'), [
                'search' => $search,
                'activity_select' => $activity_select,
                'date_period' => $date_period,
                'date' => $date,
                'date2' => $date2,
            ]);
        } else {
            $experiences = $query->whereNotNull('published_at')->orderBy('created_at', 'desc')->get();
            return view('experiences.index', compact('experiences', 'activities'), [
                'search' => $search,
                'activity_select' => $activity_select,
                'date_period' => $date_period,
                'date' => $date,
                'date2' => $date2,
            ]);
        }
    }

    // public function index(Request $request)
    // {
    //     $data = $this->getData($request);
    //     return view('experiences.index', $data);
    // }

    // public function indexDashboard(Request $request)
    // {
    //     $data = $this->getData($request);
    //     return view('dashboard', $data);
    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $activities = Activity::all();
        return view('experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'site_name' => 'required',
            'title' => 'required',
            'place' => 'required',
            'date' => 'required',
            'distance' => 'required',
            'description' => 'required',
            'activity' => 'required',
            'email' => 'required',
        ], [
            'first_name.required' => 'Le prénom est requis.',
            'last_name.required' => 'Le nom est requis.',
            'site_name.required' => 'Le nom du site est requis.',
            'title.required' => 'Le titre est requis.',
            'place.required' => 'Le lieu est requis.',
            'date.required' => 'La date est requise.',
            'distance.required' => 'La distance est requise.',
            'description.required' => 'La description est requise.',
            'activity.required' => 'L\'activité est requise.',
            'email.required' => 'L\'email est requis.',
        ]);
        $experience= new Experience;
        $experience->first_name = $request->first_name;
        $experience->last_name = $request->last_name;
        $experience->site_name = $request->site_name;
        $experience->title = $request->title;
        $experience->place = $request->place;
        $experience->date = $request->date;
        $experience->distance = $request->distance;
        $experience->description = $request->description;
        $experience->activity = $request->activity;
        $experience->email = $request->email;

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $experience->image = $filename;
        }

        $experience->save();

        return redirect()->route('experiences.index')->with('success', 'Votre experience a été soumise.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        $experience->published_at;
        return view('experiences.show', ['experience' => $experience ]);
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
        $experience = Experience::find($experience->id);
        $audits = $experience->audits;
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'site_name' => 'required',
            'title' => 'required',
            'place' => 'required',
            'date' => 'required',
            'distance' => 'required',
            'description' => 'required',
            'email' => 'required',
        ], [
            'first_name.required' => 'Le prénom est requis.',
            'last_name.required' => 'Le nom est requis.',
            'site_name.required' => 'Le nom du site est requis.',
            'title.required' => 'Le titre est requis.',
            'place.required' => 'Le lieu est requis.',
            'date.required' => 'La date est requise.',
            'distance.required' => 'La distance est requise.',
            'description.required' => 'La description est requise.',
            'email.required' => 'L\'email est requis.',
        ]);
        if ($experience->published_at === null){
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
                // $show = true;

            }
            $experience->save();
        } else{
            dd('You cannot edit this experience');
        }   
        // return redirect('/'); 
        if ($experience->published_at != null) {
            return redirect()->route('dashboard')->with('success', 'Ca été publié avec succès');
        }else{
            return redirect()->route('dashboard')->with('success', 'Ca été mis à jour avec succès');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->back()->with('success', 'Votre experience a été supprimée.');  
    }
}
