<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Bienvenue ' . Auth::user()->name) . ' sur votre Dashboard' }}
        </h2>
    </x-slot>
    <div id="success-container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <h2>Filtrer :</h2>
    <form action="/experiences" method="GET" id="search-form">
        <div>
            <label for="search">Par recherche</label>
            <input type="text" name="search" placeholder="Titre..." id="search-field" value="{{ $search }}">
            <!-- <input type="text" name="search" id="search" class="form-control" placeholder="Titre..." /> -->
        </div>
        <div>
            <label for="activity-select">Par activité</label>
            <select name="activity" id="activity-select">
                <option value="">Toutes les activités</option>
                @foreach ($activities as $activity)
                                <option value="{{ $activity }}" <?php    if ($activity_select && $activity_select == $activity) {
                        echo 'selected';
                    } ?>>{{ $activity }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="date">Par date</label>
            <div>
                <select name="date-period" id="date-period">
                    <option value="before" <?php if ($date_period && $date_period == 'before') {
    echo 'selected';
} ?>>
                        Avant
                    </option>
                    <option value="after" <?php if ($date_period && $date_period == 'after') {
    echo 'selected';
} ?>>Après
                    </option>
                    <option value="between" <?php if ($date_period && $date_period == 'between') {
    echo 'selected';
} ?>>
                        Entre</option>
                </select>
                <input type="date" name="date" value="{{ $date }}" id="date">
                <input type="date" name="date2" value="{{ $date2 }}" style="<?php if ($date_period != 'between') {
    echo 'display: none;';
} ?>" id="date2">
                <input type="submit" value="Filtrer">
            </div>
        </div>
        <a href="/experiences" class="button">Réinitialiser</a>

    </form>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Site</th>
                <th>Activité</th>
                <th>Date de l'expédition</th>
                <th>Créé le</th>
                <th></th>
                <!-- <th>Dernière modification</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach ($experiences as $experience)
                <tr class="clickable-row" data-href="{{ route('experiences.show', $experience->id) }}">
                    <td>{{ $experience->title }}</td>
                    <td>{{ $experience->site_name }}</td>
                    <td>{{ $experience->activity == "speleologie" ? "Spéléologie" : ($experience->activity == "canyoning" ? "Canyoning" : ($experience->activity == "exploration" ? "Exploration sous-marine" : "Non défini")) }}</td>
                    <td>{{ \Carbon\Carbon::parse($experience->date)->format('d/m/Y') }}</td>
                    <td>{{ $experience->created_at->format('d/m/Y') }}</td>
                    <td>
                    <a href="{{ route('experiences.show', $experience->id) }}" class="button">Voir</a>
                        <a href="{{route('experiences.edit', $experience->id)}}" class="button">Modifier</a>
                        <form method="POST" action="{{ route('experiences.destroy', ['experience' => $experience->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="secondary-button">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-app-layout>

<style>
    #search-form {
        display: flex;
        gap: 100px;
        margin-bottom: 20px;
        align-items: end;
    }

    #search-form>div {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    tr td:last-child {
        display: flex;
    }
</style>
<script>
    var searchField = document.getElementById('search-field');

    searchField.addEventListener('focus', function () {
        document.cookie = "searchFieldFocused=true; path=/";
    });

    searchField.addEventListener('blur', function () {
        document.cookie = "searchFieldFocused=false; path=/";
    });

    if (document.cookie.includes('searchFieldFocused=true')) {
        document.getElementById('search-field').focus();
        document.getElementById('search-field').selectionStart = document.getElementById('search-field').value.length;
    }

    document.getElementById('search-field').addEventListener('input', function () {
        document.getElementById('search-form').submit();
    });

    document.getElementById('activity-select').addEventListener('input', function () {
        document.getElementById('search-form').submit();
    });

    document.getElementById('date-period').addEventListener('input', function () {
        document.getElementById('search-form').submit();
    });

    if (document.querySelector("#success-container .alert") != null) {
        setTimeout(function () {
            document.querySelector("#success-container").innerHTML = '';
        }, 2000);
    }
</script>