<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('experience') }}
        </h2>
    </x-slot>

    <h1>Mon répertoire</h1>
    <form method="POST" action="/experience" enctype="multipart/form-data">
        @csrf
        <input type="text" name="first_name" placeholder="Prénom">
        <input type="text" name="last_name" placeholder="Nom">
        <input type="date" name="date_of_the_event" placeholder="Date de naissance">
        <input type="text" name="phone" placeholder="Numéro de téléphone">
        <input type="email" name="email" placeholder="Email">
        <select name="activity_id">
            @foreach($activities as $activity)
                <option value="{{ $activity->id }}">{{ $activity->name }}</option>
            @endforeach
        </select>
        <button type="submit">Ajouter le form</button>
    </form>
</x-app-layout>