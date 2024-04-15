
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
                <td><a href="{{ url('experienceInfo/' . $experience->id) }}">{{$experience->first_name }}</a></td>
                    <td>{{ $experience->last_name }}</td>
                    <td>{{ $experience->date_of_the_event->format('d/m/Y') }}</td>
                    <td>{{ $experience->phone_number }}</td>
                    <td>{{ $experience->email }}</td> 
            </tr>
        @endforeach
    </tbody>
</table>
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