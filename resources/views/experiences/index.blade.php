
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Les retours d\'expériences') }}
        </h2>
    </x-slot>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

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
                    <option value="{{ $activity }}" <?php if ($activity_select && $activity_select == $activity) {echo 'selected';} ?>>{{ $activity }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="date">Par date</label>
            <div>
                <select name="date-period" id="date-period">
                    <option value="before" <?php if ($date_period && $date_period == 'before') {echo 'selected';} ?>>Avant</option>
                    <option value="after" <?php if ($date_period && $date_period == 'after') {echo 'selected';} ?>>Après</option>
                    <option value="between" <?php if ($date_period && $date_period == 'between') {echo 'selected';} ?>>Entre</option>
                </select>
                <input type="date" name="date" value="{{ $date }}" id="date">
                <input type="date" name="date2" value="{{ $date2 }}" style="<?php if ($date_period != 'between') {echo 'display: none;';} ?>" id="date2">
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
                <th>Créé le : </th>
                <th>Publié</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($experiences as $experience)
                <tr class="clickable-row">
                    <td style="max-width:150px">{{ $experience->title }}</td>
                    <td style="max-width:150px">{{ $experience->site_name }}</td>
                    <td>{{ $experience->activity == "speleologie" ? "Spéléologie" : ($experience->activity == "canyoning" ? "Canyoning" : ($experience->activity == "exploration" ? "Exploration sous-marine" : "Non défini")) }}</td>
                    <td>{{ $experience->date->format('d/m/Y') }}</td>
                    <td>{{ $experience->created_at->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($experience->published_at)->diffForHumans() }}</td>
                    <td>
                    <a href="{{ route('experiences.show', $experience->id) }}" class="button">Voir</a>
                    @auth

                        <form method="POST" action="{{ route('experiences.destroy', ['experience' => $experience->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="secondary-button">Supprimer</button>
                        </form>
                        @endauth
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
#search-form > div {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

@auth
tr td:last-child {
    display: flex;
}
@endauth


a[href="/experiences"] {
    margin-bottom: 5px;
}

</style>
<script>
        var searchField = document.getElementById('search-field');

        searchField.addEventListener('focus', function() {
            document.cookie = "searchFieldFocused=true; path=/";
        });

        searchField.addEventListener('blur', function() {
            document.cookie = "searchFieldFocused=false; path=/";
        });

        if (document.cookie.includes('searchFieldFocused=true')) {
            document.getElementById('search-field').focus(); 
            document.getElementById('search-field').selectionStart = document.getElementById('search-field').value.length;
        }

        document.getElementById('search-field').addEventListener('input', function() {
            document.getElementById('search-form').submit();
        });

        document.getElementById('activity-select').addEventListener('input', function() {
            document.getElementById('search-form').submit();
        });

        document.getElementById('date-period').addEventListener('input', function() {
            document.getElementById('search-form').submit();
        });
        
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () { 
        console.log('ready');
        $('#search').on('keyup', function() {
            var query = $(this).val();
            console.log(query);
            $.ajax({
                url: "{{ route('experiences.search') }}",
                type: "GET",
                data: {'search': query},
                success: function(data) {
                    $('tbody').html(data);
                }
            });
        });
    });
</script>