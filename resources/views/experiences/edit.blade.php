<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('experience') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route('experiences.update',  $experience)}}" id="editexperience" class="space-y-4">
                        @method('PUT')
                        @csrf
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Prénom</label>
                            <input type="text" id="first_name" name="first_name" value="{{ $experience->first_name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" id="last_name" name="last_name" value="{{ $experience->last_name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="site_name" class="block text-sm font-medium text-gray-700">Nom du site</label>
                            <input type="text" id="site_name" name="site_name" value="{{ $experience->site_name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                            <input type="text" id="title" name="title" value="{{ $experience->title }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="place" class="block text-sm font-medium text-gray-700">Lieu</label>
                            <input type="text" id="place" name="place" value="{{ $experience->place }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                            <input type="date" id="date" name="date" value="{{ $experience->date->format('Y-m-d') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="distance" class="block text-sm font-medium text-gray-700">Altitude</label>
                            <input type="number" id="distance" name="distance" value="{{ $experience->distance }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $experience->description }}</textarea>
                        </div>
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" id="image" name="image" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" value="{{ $experience->email }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">Mettre à jour</button>
                            <button type="submit" name="published" value="published" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">published</button>
                        <!-- <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button> -->
                            <!-- <input type="submit" name="update" value="Publier">  -->
                            <!-- <a href="{{ url('experienceInfo/' . $experience->id) }}">Annuler</a>  -->
                        <!-- <input type="submit" name="publier" value="publier"> -->
                        <!-- <button type="submit" name="published" value="published" class="btn btn-primary mt-3">published</button> -->
                        </div>
                        <!-- <a href="javascript:history.back()" class="btn btn-primary mt-3">Retourner</a> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="javascript:history.back()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">Retourner</a>
    <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3">Dashboard</a>
</x-app-layout>
