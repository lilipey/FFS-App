
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <table>
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Date de l'evenements</th>
                <th>Numéro de téléphone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($experiences as $experience)
                <tr>
                    <td><a href="{{ route('experiences.show', $experience) }}">{{$experience->first_name }}</a></td>
                        <td>{{ $experience->last_name }}</td>
                        <td>{{ $experience->date_of_the_event->format('d/m/Y') }}</td>
                        <td>{{ $experience->phone_number }}</td>
                        <td>{{ $experience->email }}</td> 
                        
                        <td>
                        <form method="POST" action="{{ route('experiences.destroy', $experience->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer le contact</button>
                        </form>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
</x-app-layout>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }  
    th, td {
        padding: 15px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:nth-child(odd) {
        background-color: #ffffff;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
    th, td {
        border: 1px solid black;
    }
    th, td {
        padding: 15px;
        text-align: left;
    }

</style>