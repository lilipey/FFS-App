<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
<div id="info"  style="display: block;">
    <h1>Détails du experience</h1>
    <p>Nom : {{ $experience->first_name }} {{ $experience->last_name }}</p>
    <p>Téléphone : {{ $experience->phone_number }}</p>
    <p>Email : {{ $experience->email }}</p>
    <img src=" {{ $experience->photo_url }}"/>
</div>
<a href="{{ url('experienceEdit/' . $experience->id) }}">{{ $experience->first_name }}</a>



<!-- <script>
    document.getElementById('editButton').addEventListener('click', function() {
        var experience = document.getElementById('editexperience');
        var info = document.getElementById('info');
        if (experience.style.display === 'none') {
            experience.style.display = 'block';
            info.style.display = 'none';
        } else {
            experience.style.display = 'none';
            info.style.display = 'block';
        }
    });
</script> -->
</x-app-layout>