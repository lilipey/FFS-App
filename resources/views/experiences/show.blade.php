<!DOCTYPE html>
<html>
<head>
    <title>Experience Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Détails') }}
        </h2>
    </x-slot>
    <body>
    @if ($experience->published_at || Auth::user()) {
        <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Experience Details</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title text-primary">{{ $experience->title }}</h5>
                <p class="card-text"><strong>Nom du site:</strong> <span class="text-muted">{{ $experience->site_name }}</span></p>
                <p class="card-text"><strong>Place:</strong> <span class="text-muted">{{ $experience->place }}</span></p>
                <p class="card-text"><strong>Date:</strong> <span class="text-muted">{{ $experience->date }}</span></p>
                <p class="card-text"><strong>Altitude:</strong> <span class="text-muted">{{ $experience->distance }}</span></p>
                <p class="card-text"><strong>Activity:</strong> <span class="text-muted">{{ $experience->activity }}</span></p>
                <p class="card-text"><strong>Description:</strong> <span class="text-muted">{{ $experience->description }}</span></p>
                <p class="card-text"><strong>Email:</strong> <span class="text-muted">{{ $experience->email }}</span></p>
                @if($experience->image!=null)
                    <img src="{{ asset('storage/' . $experience->image) }}" alt="" style="width:200px; margin: 20px;">
                @endif
                
                @auth
                    @php
                        $updatedAudits = $experience->audits->where('event', 'updated')->sortByDesc('created_at');
                        $groupedAudits = $updatedAudits->groupBy('user_id');
                        $lastAudit = $updatedAudits->first();
                    @endphp

                    @if ($groupedAudits->count() > 0)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h2 class="mb-0">Modifications</h2>
                            </div>
                            <div class="card-body">
                                @foreach ($groupedAudits as $userId => $userAudits)
                                    @php
                                        $userLastAudit = $userAudits->first();
                                    @endphp
                                    @if ($userLastAudit->user !== null)
                                        <div class="mb-2">
                                            @if ($userLastAudit->id === $lastAudit->id)
                                                <strong>Dernière modification par :</strong> 
                                                <span class="text-primary">{{ $userLastAudit->user->name }}</span>
                                                <span class="text-muted">le {{ $userLastAudit->created_at }}</span>
                                            @else
                                                <strong>Modification par :</strong> 
                                                <span class="text-primary">{{ $userLastAudit->user->name }}</span>
                                                <span class="text-muted">le {{ $userLastAudit->created_at }}</span>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endauth
                <!-- @if($experience->image!=null)
                    <img class="img-fluid" src="{{ asset('images/' . $experience->image) }}" alt="Image">
                @endif -->
            </div>
                @if (!$experience->published_at && Auth::user())
                    <a href="{{ route('experiences.edit', $experience->id) }}" class="button">Modifier l'expérience</a>
                    <form method="POST" action="{{ route('experiences.publish', $experience->id) }}">
                        @csrf
                        <button type="submit" class="button" value="published">Publier</button>
                    </form>
                @endif
                <form method="POST" action="{{ route('experiences.destroy', ['experience' => $experience->id]) }}"
                    style="margin:0;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer </button>
                </form>

    </div>
    }
    @else
        <script type="text/javascript">
            window.location.href = "/login";
        </script>
    @endif
</body>
</html>
    
       
    

<!-- <script>
    document.getElementById('editButton').addEventListener('click', function() {
        var experience = document.getElementById('editexperience');
        var info = document.getElementById('info');
        if (experience.style.display === 'none') {
            experience.style.display = 'block';
            info.style.display = 'none';
        } else {
            experience.style.display = 'none';
            info.style.display = 'block';
        }
    });
</script> -->
</x-app-layout>