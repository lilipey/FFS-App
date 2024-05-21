<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Mon experience') }}
        </h2>
    </x-slot>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{route('experiences.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div class="container ">
            <div class="py-12">
                <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h2 class="mb-2">Vos coordonnées</h2>
                            <div class="space-y-2">
                                <label for="first_name">Prénom</label>
                                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="Entrez votre prénom">
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                            </div>
                            <div class="space-y-2">
                                <label for="last_name">Nom</label>
                                <input type="text" id="last_name" name="last_name" placeholder="Entrez votre nom" value="{{ old('last_name') }}>
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                            </div>
                            <div class="space-y-2">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Entrez votre email">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                    </div>
                </div>
            </div>
            <div class="py-12">
                <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                            <h2 class="mb-2">Informations sur l'expérience</h2>

                                <div class="space-y-2">
                                    <label for="title">Titre</label>
                                    <input type="text" id="title" name="title" placeholder="Entrez le titre de votre expérience">
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                                <div class="space-y-2">
                                    <label for="site_name">Nom du site</label>
                                    <input type="text" id="site_name" name="site_name" placeholder="Entrez le nom du site">
                                    <x-input-error :messages="$errors->get('site_name')" class="mt-2" />
                                </div>
                                <div class="space-y-2">
                                    <label for="place">Lieu</label>
                                    <input type="text" id="place" name="place" placeholder="Entrez le lieu de l'expérience">
                                    <x-input-error :messages="$errors->get('place')" class="mt-2" />
                                </div>
                                <div class="space-y-2">
                                    <label for="date">Date</label>
                                    <input type="date" id="date" name="date">
                                    <x-input-error :messages="$errors->get('date')" class="mt-2" />

                                </div>
                                <div class="space-y-2">
                                <label for="distance">Altitude</label>
                                <input type="number" id="distance" name="distance" placeholder="Entrez l'altitude">
                                <x-input-error :messages="$errors->get('distance')" class="mt-2" />
                                </div>
                    </div>
                </div>
            </div>
            <div class="py-12">
                <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                            <h2 class="mb-2">Informations complémentaires</h2>
                            <div class="space-y-2">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" placeholder="Décrivez votre expérience"></textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                <div>
                                    <label for="image">Image</label>
                                    <input type="file" id="image" name="image">
                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                </div>
                                

                                <label for="activity">Activité</label>
                                <select id="activity" name="activity">
                                    <option value="speleologie">Spéléologie</option>
                                    <option value="escalade">Canyoning</option>
                                    <option value="randonnee">Exploration sous-marine</option>
                                </select>
                                <x-input-error :messages="$errors->get('activity')" class="mt-2" />
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded button-nav">Soumettre</button>
    </form>
    <div class= "button-container">
        @auth
        <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3 button-nav">Dashboard</a>
        @endauth
        <a href="{{ route('experiences.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3 button-nav">Toutes les expériences</a>
    </div>

</x-app-layout>

<style>
    .container{
        margin: 0 auto;
    }
    .max-w-2xl{
        /* height: 350px; */
    }
    .bg-white{
        padding: 1rem;
        max-height: 100%;
        width: fit-content;
    }
    .space-y-4 > :not([hidden]) ~ :not([hidden]){
        display: flex;
        
    }
    button{
        margin: 0 auto;
    }
    h2{

        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }
</style>