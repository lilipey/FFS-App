<?php
namespace App\Traits;

use App\Models\Experience;
use Illuminate\Http\Request;
use DateTime;

trait ExperiencesTrait{
    private function getData(Request $request)
    {
        $search = $request->get('search');
        $activity_select = $request->get('activity');
        $date = $request->get('date');
        $date2 = $request->get('date2');
        
        $formatted_date = new DateTime($date);
        $formatted_date2 = new DateTime($date2);
        $date_period = $request->get('date-period');
        $published = Experience::whereNotNull('published_at')->get();

        $query = Experience::query();
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
        if ($published) {
            $experiences = $query->whereNotNull('published_at')->orderBy('published_at', 'desc')->get();
        } else {
            $experiences = $query->whereNull('published_at')->orderBy('created_at', 'desc')->get();
        }


        return compact('experiences', 'activities', 'search', 'activity_select', 'date_period', 'date', 'date2');
    }
}
?>