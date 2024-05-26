<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight" id="exp-title">
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
        <div class="container">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg input-group">
                        <h2 class="mb-2">Vos coordonnées</h2>
                        <div class="space-y-1">
                            <label for="first_name">Prénom</label>
                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                placeholder="Entrez votre prénom">
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>
                        <div class="space-y-1">
                            <label for="last_name">Nom</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Entrez votre nom"
                                value="{{ old('last_name') }}">
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>
                        <div class="space-y-1">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                placeholder="Entrez votre email">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg input-group">

                    <h2 class="mb-2">Informations sur l'expérience</h2>

                    <div class="space-y-1">
                        <label for="title">Titre</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}"
                            placeholder="Entrez le titre de votre expérience">
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div class="space-y-1">
                        <label for="site_name">Nom du site</label>
                        <input type="text" id="site_name" name="site_name" value="{{ old('site_name') }}"
                            placeholder="Entrez le nom du site">
                        <x-input-error :messages="$errors->get('site_name')" class="mt-2" />
                    </div>
                    <div class="space-y-1">
                        <label for="place">Lieu</label>
                        <input type="text" id="place" name="place" value="{{ old('place') }}"
                            placeholder="Entrez le lieu de l'expérience">
                        <x-input-error :messages="$errors->get('place')" class="mt-2" />
                    </div>
                    <div class="space-y-1">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" value="{{ old('date') }}">
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />

                    </div>
                    <div class="space-y-1">
                        <label for="distance">Altitude</label>
                        <input type="number" id="distance" name="distance" placeholder="Entrez l'altitude"
                            value="{{ old('distance') }}">
                        <x-input-error :messages="$errors->get('distance')" class="mt-2" />
                    </div>
                </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg input-group">

                <h2 class="mb-2">Informations complémentaires</h2>
                <div class="space-y-1">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Décrivez votre expérience"></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="space-y-1">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" value="{{ old('image') }}">
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="space-y-1">
                    <label for="activity">Activité</label>
                    <select id="activity" name="activity">
                        <option value="speleologie" {{ old('activity') == 'speleologie' ? 'selected' : '' }}>
                            Spéléologie</option>
                        <option value="canyoning" {{ old('activity') == 'canyoning' ? 'selected' : '' }}>Canyoning
                        </option>
                        <option value="exploration" {{ old('activity') == 'exploration' ? 'selected' : '' }}>
                            Exploration sous-marine</option>
                    </select>
                    <x-input-error :messages="$errors->get('activity')" class="mt-2" />
                </div>

            </div>
        </div>
        <div class="action-container">

            <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded button-nav">Soumettre</button>
        </div>
    </form>

</x-app-layout>


<script>
    document.querySelector("#title").addEventListener("input", () => {
        document.querySelector("#exp-title").textContent = document.querySelector("#title").value;
        if (document.querySelector("#exp-title").textContent.trim(" ") == "") {
            document.querySelector("#exp-title").textContent = "{{ __('Mon experience') }}";
        }
    })


    window.onload = function() {
    let today = new Date().toISOString().split('T')[0];
    document.getElementById('date').setAttribute('max', today);
}
</script>