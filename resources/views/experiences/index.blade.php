
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1> Les retours d'expériences</h1>

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
            <div class= "button-container">
                <a href="/experiences" class="button">Réinitialiser</a>
            </div>
           
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
                @auth
                    <th>Supprimer</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($experiences as $experience)
                <tr class="clickable-row" data-href="{{ route('experiences.show', $experience->id) }}">
                    <td style="max-width:150px">{{ $experience->title }}</td>
                    <td style="max-width:150px">{{ $experience->site_name }}</td>
                    <td>{{ $experience->activity}}</td>
                    <td>{{ $experience->date->format('d/m/Y') }}</td>
                    <td>{{ $experience->created_at->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($experience->published_at)->diffForHumans() }}</td>
                    @auth
                        @if($experience->published_at == null)
                            <td><a href="{{route('experiences.edit', $experience->id)}}">Modifier</a></td>
                        @endif
                    <td>
                        <form method="POST" action="{{ route('experiences.destroy', ['experience' => $experience->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
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

        document.addEventListener('DOMContentLoaded', function() {
            var rows = document.querySelectorAll('.clickable-row');

            rows.forEach(function(row) {
                row.addEventListener('click', function() {
                    window.location = row.getAttribute('data-href');
                    console.log('clicked');
                });
            });
        });
</script>

