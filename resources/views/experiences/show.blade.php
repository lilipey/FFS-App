<!DOCTYPE html>
<html>
<head>
    <title>Experience Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Détails') }}
        </h2>
    </x-slot>
    <body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Experience Details</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $experience->title }}</h5>
                <p class="card-text">Site Name: {{ $experience->site_name }}</p>
                <p class="card-text">Place: {{ $experience->place }}</p>
                <p class="card-text">Date: {{ $experience->date }}</p>
                <p class="card-text">Altitude: {{ $experience->distance }}</p>
                <p class="card-text">Description: {{ $experience->description }}</p>
                <p class="card-text">Activity: {{ $experience->activity }}</p>
                <p class="card-text">Email: {{ $experience->email }}</p>
                @if($experience->image!=null)
                    <img class="img-fluid" src="{{ asset('images/' . $experience->image) }}" alt="Image">
                @endif
            </div>
        </div>
    </div>
    <a href="{{ route('experiences.edit', $experience->id) }}" class="btn btn-primary mt-3">modifier</a>
    <a href="javascript:history.back()" class="btn btn-primary mt-3">Retourner</a>

</body>
</html>

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