
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('experience') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{route('experiences.update',  $experience)}}" id="editexperience">
        @method('PUT')
        @csrf
       <label for="first_name">Prénom</label>
        <input type="text" id="first_name" name="first_name" value="{{ $experience->first_name }}">
        
        <label for="last_name">Nom</label>
        <input type="text" id="last_name" name="last_name" value="{{ $experience->last_name }}">
        
        <label for="site_name">Nom du site</label>
        <input type="text" id="site_name" name="site_name" value="{{ $experience->site_name }}">
        
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" value="{{ $experience->title }}">
        
        <label for="place">Lieu</label>
        <input type="text" id="place" name="place" value="{{ $experience->place }}">
        
        <label for="date">Date</label>
        <input type="date" id="date" name="date" value="{{ $experience->date->format('Y-m-d') }}">
        
        <label for="distance">Distance</label>
        <input type="number" id="distance" name="distance" value="{{ $experience->distance }}">
        
        <label for="description">Description</label>
        <textarea id="description" name="description">{{ $experience->description }}</textarea>
        
        <label for="image">Image</label>
        <input type="file" id="image" name="image">
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ $experience->email }}">

        <button type="submit">Mettre à jour</button>
        <!-- <input type="submit" name="update" value="Publier">  -->
         <!-- <a href="{{ url('experienceInfo/' . $experience->id) }}">Annuler</a>  -->
       <!-- <input type="submit" name="publier" value="publier"> -->
       <button type="submit" name="published" value="published">published</button>

    </form>
</x-app-layout>