@if($results->count())
<table>
        <tbody>
            @foreach ($results as $experience)
                <tr class="clickable-row" data-href="{{ route('experiences.show', $experience->id) }}">
                    <td style="max-width:150px">{{ $experience->title }}</td>
                    <td style="max-width:150px">{{ $experience->site_name }}</td>
                    <td>{{ $experience->activity}}</td>
                    <td>{{ $experience->date->format('d/m/Y') }}</td>
                    <td>{{ $experience->created_at->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($experience->published_at)->diffForHumans() }}</td>
                    @auth
                        @if($experience->published_at == null)
                            <td><a href="{{route('experiences.edit', $experience->id)}}">Modifier</a></td>
                        @endif
                    <td>
                        <form method="POST" action="{{ route('experiences.destroy', ['experience' => $experience->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                    @endauth
                </tr>
            @endforeach
        </tbody>
@else
    <p>Aucun résultat trouvé</p>
@endif