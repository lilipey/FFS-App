<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'date' => 'required|date|before:now',
            'distance' => 'required',
            'description' => 'required',
            'activity' => 'required',
            'email' => 'required|email',
            'image' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'first_name.required' => 'Le prénom est requis.',
            'last_name.required' => 'Le nom est requis.',
            'site_name.required' => 'Le nom du site est requis.',
            'title.required' => 'Le titre est requis.',
            'place.required' => 'Le lieu est requis.',
            'date.required' => 'La date est requise.',
            'date.before' => 'La date doit être antérieure à la date actuelle.',
            'distance.required' => 'La distance est requise.',
            'description.required' => 'La description est requise.',
            'activity.required' => 'L\'activité est requise.',
            'email.required' => 'L\'email est requis.',
            'email.email' => 'L\'email doit être une adresse email valide.',
        
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

        if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $experience->image = $imagePath;
        }

        $experience->save();
        if (Auth::check()) {
            if (!request()->is('dashboard')) {
                return redirect()->route('dashboard')->with('success', 'Votre experience a été soumise.Elle sera publiée après validation.');
            }
            return redirect()->route('dashboard');
        } else {
            if (!request()->is('experiences.index')) {
                return redirect()->route('experiences.index')->with('success', 'Votre experience a été soumise.Elle sera publiée après validation.');
            }
            return redirect()->route('experiences.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        if (!$experience->published_at && auth()->guest()) {
            return redirect(route('experiences.index'));
        }
        $audits = $experience->audits;
        $experience->published_at;
        
        return view('experiences.show', ['experience' => $experience ] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        if ($experience->published_at != null) {
            return redirect(route('experiences.index'));
        }
        return view('experiences.edit', ['experience' => $experience]);
    }
    /**
     * publish the specified resource in storage.
     */
     public function publish(Request $request, Experience $experience)
    {
        if ( $experience->published_at === null) {
            $experience->published_at = now();
            $experience->save();
            return redirect()->route('dashboard')->with('success',  "L'expérience été publiés avec succès");
        }
        return redirect()->route('dashboard');
    }
     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        if ($request->has('published') &&  $request->is("dashboard/experiences/{$experience->id}") && $experience->published_at === null) {
            $experience->published_at = now();

            $experience->save();
            return redirect()->route('dashboard')->with('success',  "L'expérience été publiée avec succès");
        }
        // $experience = Experience::find($experience->id);
        $audits = $experience->audits;
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'site_name' => 'required',
            'title' => 'required',
            'place' => 'required',
            'date' => 'required|date|before:now',
            'distance' => 'required',
            'description' => 'required',
            'activity' => 'required',
            'email' => 'required|email',
            'image' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'first_name.required' => 'Le prénom est requis.',
            'last_name.required' => 'Le nom est requis.',
            'site_name.required' => 'Le nom du site est requis.',
            'title.required' => 'Le titre est requis.',
            'place.required' => 'Le lieu est requis.',
            'date.required' => 'La date est requise.',
            'date.before' => 'La date doit être antérieure à la date actuelle.',
            'distance.required' => 'La distance est requise.',
            'description.required' => 'La description est requise.',
            'activity.required' => 'L\'activité est requise.',
            'email.required' => 'L\'email est requis.',
            'email.email' => 'L\'email doit être une adresse email valide.',
        
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
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $experience->image = $imagePath;
            }
            if ($request->input('published') == 'published') {
                $experience->published_at = now();
            }
            $experience->save();
        } else{
            dd('You cannot edit this experience');
        }   
        // return redirect('/'); 

        if ($experience->wasChanged()) {
            if ($experience->published_at != null) {
                return redirect()->route('dashboard')->with('success',  "L'expérience été publiés avec succès");
            } else {
                return redirect()->route('dashboard')->with('success', "L'expérience été mis à jour avec succès");
            }
        } else {
            return redirect()->route('dashboard');
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

