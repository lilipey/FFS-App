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
        @foreach ($forms as $form)
            <tr>
            <td><a href="{{ url('formInfo/' . $form->id) }}">{{ $form->first_name }}</a></td>
                <td>{{ $form->last_name }}</td>
                <td>{{ $form->date_of_the_event->format('d/m/Y') }}</td>
                <td>{{ $form->phone_number }}</td>
                <td>{{ $form->email }}     
            </td>
            </tr>
        @endforeach
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