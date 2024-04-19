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

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
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
                                <input type="text" id="first_name" name="first_name" placeholder="Entrez votre prénom">
                            </div>
                            <div class="space-y-2">

                                <label for="last_name">Nom</label>
                                <input type="text" id="last_name" name="last_name" placeholder="Entrez votre nom">
                            </div>
                            <div class="space-y-2">

                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Entrez votre email">
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
                                </div>
                                <div class="space-y-2">
                                    <label for="site_name">Nom du site</label>
                                    <input type="text" id="site_name" name="site_name" placeholder="Entrez le nom du site">
                                </div>
                                <div class="space-y-2">
                                    <label for="place">Lieu</label>
                                    <input type="text" id="place" name="place" placeholder="Entrez le lieu de l'expérience">
                                </div>
                                <div class="space-y-2">
                                    <label for="date">Date</label>
                                    <input type="date" id="date" name="date">
                                </div>

                                <div class="space-y-2">
                                <label for="distance">Altitude</label>
                                <input type="number" id="distance" name="distance" placeholder="Entrez l'altitude">
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

                                <div>
                                    <label for="image">Image</label>
                                    <input type="file" id="image" name="image">
                                </div>
                                

                                <label for="activity">Activité</label>
                                <select id="activity" name="activity">
                                    <option value="speleologie">Spéléologie</option>
                                    <option value="escalade">Canyoning</option>
                                    <option value="randonnee">Exploration sous-marine</option>
                                </select>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded button-nav">Soumettre</button>
    </form>

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