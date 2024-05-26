<head>
    <title>Modifier {{ $experience->title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Modifier ' . $experience->title) }}
        </h2>
    </x-slot>
    <form method="POST" action="{{route('experiences.update', $experience)}}" id="editexperience" class="space-y-4"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="container">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg input-group">
                <h2 class="mb-2">Coordonnées</h2>
                <div class="space-y-1">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">Prénom</label>
                    <input type="text" id="first_name" name="first_name" value="{{ $experience->first_name }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="space-y-1">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" id="last_name" name="last_name" value="{{ $experience->last_name }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="space-y-1">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ $experience->email }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg input-group">
                <h2 class="mb-2">Informations sur l'expérience</h2>

                <div class="space-y-1">
                    <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                    <input type="text" id="title" name="title" value="{{ $experience->title }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="space-y-1">
                    <label for="site_name" class="block text-sm font-medium text-gray-700">Nom du
                        site</label>
                    <input type="text" id="site_name" name="site_name" value="{{ $experience->site_name }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="space-y-1">
                    <label for="place" class="block text-sm font-medium text-gray-700">Lieu</label>
                    <input type="text" id="place" name="place" value="{{ $experience->place }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="space-y-1">
                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" id="date" name="date" value="{{ $experience->date->format('Y-m-d') }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="space-y-1">
                    <label for="distance" class="block text-sm font-medium text-gray-700">Altitude</label>
                    <input type="number" id="distance" name="distance" value="{{ $experience->distance }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg input-group">
                <h2 class="mb-2">Informations complémentaires</h2>
                <div class="space-y-1">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $experience->description }}</textarea>
                </div>
                <div class="space-y-1">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" id="image" name="image"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="space-y-1">
                    <label for="activity">Activité</label>
                    <select id="activity" name="activity">
                        <option value="speleologie" {{ old('activity') == 'speleologie' ? 'selected' : '' }} {{ $experience->activity == 'speleologie' ? 'selected' : ''}}>
                            Spéléologie</option>
                        <option value="canyoning" {{ old('activity') == 'canyoning' ? 'selected' : '' }} {{ $experience->activity == 'canyoning' ? 'selected' : ''}}>
                            Canyoning
                        </option>
                        <option value="exploration" {{ old('activity') == 'exploration' ? 'selected' : '' }} {{ $experience->activity == 'exploration' ? 'selected' : ''}}>
                            Exploration sous-marine</option>
                    </select>
                    <x-input-error :messages="$errors->get('activity')" class="mt-2" />
                </div>
            </div>

        </div>
        <div class="action-container">
            <a href="javascript:history.back()" class="button secondary-button">Retourner</a>
            <button type="submit" class="button">Mettre
                à jour</button>
            <button type="submit" name="published" value="published" class="button">Publier</button>
        </div>
    </form>
</x-app-layout>

<script>
    window.onload = function () {
        let today = new Date().toISOString().split('T')[0];
        document.getElementById('date').setAttribute('max', today);
    }
</script>