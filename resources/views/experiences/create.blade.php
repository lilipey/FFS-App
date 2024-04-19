<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('experience') }}
        </h2>
    </x-slot>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Mon expérience</h1>
    <form method="POST" action="{{route('experiences.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="first_name">Prénom</label>
        <input type="text" id="first_name" name="first_name" value="John">
        
        <label for="last_name">Nom</label>
        <input type="text" id="last_name" name="last_name" value="Doe">
        
        <label for="site_name">Nom du site</label>
        <input type="text" id="site_name" name="site_name" value="Mon site">
        
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" value="Mon titre">
        
        <label for="place">Lieu</label>
        <input type="text" id="place" name="place" value="Paris">
        
        <label for="date">Date</label>
        <input type="date" id="date" name="date" value="2022-01-01">
        
        <label for="distance">Distance</label>
        <input type="number" id="distance" name="distance" value="100">
        
        <label for="description">Description</label>
        <textarea id="description" name="description">Ma description</textarea>
        
        <label for="image">Image</label>
        <input type="file" id="image" name="image">
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="john.doe@example.com">

        <label for="activity">Activité</label>
        <select id="activity" name="activity">
            <option value="speleologie">Spéléologie</option>
            <option value="escalade">Escalade</option>
            <option value="randonnee">Randonnée</option>
        </select>
    
        <button type="submit">Soumettre</button>
    </form>
</x-app-layout>