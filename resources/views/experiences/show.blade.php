<head>
    <title>{{ $experience->title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __($experience->title) }}
        </h2>
    </x-slot>

    <body>
        @if ($experience->published_at || Auth::user())
            <div class="container">
                @auth
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg input-group">
                            <h2 class="mb-2">Coordonnées et Modifications</h2>

                            <p class="card-text"><strong>Nom:</strong> <span class="text-muted">{{ $experience->first_name }}</span>
                            </p>
                            <p class="card-text"><strong>Prénom:</strong> <span
                                    class="text-muted">{{ $experience->last_name }}</span></p>
                            <p class="card-text"><strong>Email:</strong> <span class="text-muted">{{ $experience->email }}</span>
                            </p>


                            @php
                                $updatedAudits = $experience->audits->where('event', 'updated')->sortByDesc('created_at');
                                $groupedAudits = $updatedAudits->groupBy('user_id');
                                $lastAudit = $updatedAudits->first();
                            @endphp
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3 class="mb-0">Modifications</h3>
                                </div>
                                <div class="card-body">
                                    @if ($groupedAudits->count() > 0)
                                                @foreach ($groupedAudits as $userId => $userAudits)
                                                            @php
                                                                $userLastAudit = $userAudits->first();
                                                            @endphp
                                                            @if ($userLastAudit->user !== null)
                                                                <div class="mb-2">
                                                                    @if ($userLastAudit->id === $lastAudit->id)
                                                                        <strong>Dernière modification par :</strong>
                                                                        <span class="text-primary">{{ $userLastAudit->user->name }}</span>
                                                                        <span class="text-muted">le {{ $userLastAudit->created_at->format('d/m/Y') }} à
                                                                            {{ $userLastAudit->created_at->format('h:m:s') }}</span>
                                                                    @else
                                                                        <strong>Modification par :</strong>
                                                                        <span class="text-primary">{{ $userLastAudit->user->name }}</span>
                                                                        <span class="text-muted">le {{ $userLastAudit->created_at }}</span>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                @endforeach
                                    @else
                                        <p>Pas de modifications</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                @endauth
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg input-group">

                    <h2 class="mb-2">Informations sur l'expérience</h2>

                    <p class="card-text"><strong>Titre de l'experience:</strong> <span
                            class="text-muted">{{ $experience->title }}</span></p>
                    <p class="card-text"><strong>Nom du site:</strong> <span
                            class="text-muted">{{ $experience->site_name }}</span></p>
                    <p class="card-text"><strong>Lieu:</strong> <span class="text-muted">{{ $experience->place }}</span></p>
                    <p class="card-text"><strong>Date:</strong> <span
                            class="text-muted">{{ $experience->date->format('d/m/Y') }}</span></p>
                    <p class="card-text"><strong>Altitude:</strong> <span
                            class="text-muted">{{ $experience->distance }}</span></p>
                    <p class="card-text"><strong>Activité:</strong> <span
                            class="text-muted">{{ 
                            $experience->activity == "speleologie" ? "Spéléologie" : ($experience->activity == "canyoning" ? "Canyoning" : ($experience->activity == "exploration" ? "Exploration sous-marine" : "Non défini"))
                             }}</span></p>


                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg input-group">

                    <h2 class="mb-2">Informations complémentaires</h2>
                    <p class="card-text"><strong>Description:</strong> <span
                            class="text-muted">{{ $experience->description }}</span></p>

                    @if($experience->image != null)
                        <img src="{{ asset('storage/' . $experience->image) }}" alt="" style="width:200px; margin: 20px;">
                    @endif
                    @if ($experience->published_at) 
                                <p class="card-text"><strong>Publié le:</strong> <span
                                        class="text-muted">{{ \Carbon\Carbon::parse($experience->published_at)->format('d/m/Y') }}</span></p>
                            @else
                            <p class="card-text"><strong>Pas encore publié</strong> </p>
                            @endif
                </div>
            </div>
            <div class="action-container">
                <a href="javascript:history.back()" class=" button secondary-button">Retourner sur la page précédente</a>
                @auth

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
                
                @endauth

            </div>
        @endif
    </body>
</x-app-layout>
