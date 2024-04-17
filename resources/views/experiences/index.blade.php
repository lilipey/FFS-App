
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <form action="/experiences" method="GET" id="search-form">
            <input type="text" name="search" placeholder="Rechercher..." id="search-field" value="{{ $search }}">
            <select name="activity" id="activity-select">
                <option value="">Toutes les activités</option>
                @foreach ($activities as $activity)
                    <option value="{{ $activity }}" <?php if ($activity_select && $activity_select == $activity) {echo 'selected';} ?>>{{ $activity }}</option>
                @endforeach
            </select>
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
            <a href="/experiences" class="button">Réinitialiser</a>
    </form>
    <table>
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Date de l'evenements</th>
                <th>Numéro de téléphone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($experiences as $experience)
                <tr>
                    <td><a href="{{ route('experiences.show', $experience) }}">{{$experience->first_name }}</a></td>
                        <td>{{ $experience->last_name }}</td>
                        <td>{{ $experience->date->format('d/m/Y') }}</td>
                        <td>{{ $experience->email }}</td> 
                        <td>
                        @auth
                        <form method="POST" action="{{ route('experiences.destroy', $experience->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer le contact</button>
                        </form>
                        @endauth
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
</x-app-layout>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }  
    th, td {
        padding: 15px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:nth-child(odd) {
        background-color: #ffffff;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
    th, td {
        border: 1px solid black;
    }
    th, td {
        padding: 15px;
        text-align: left;
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