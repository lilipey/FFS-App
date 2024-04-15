
<form method="POST" action="{{ route('updateExperience', $experience->id) }}" id="editexperience">
    @csrf
    @method('PUT')
    <h1>Modifier le experience</h1>

    <label for="first_name">Prénom:</label>
    <input type="text" id="first_name" name="first_name" value="{{ $experience->first_name }}">
    
    <label for="photo_url">Photo:</label>
    <input type="url" id="photo_url" name="photo_url">

    <label for="last_name">Nom:</label>
    <input type="text" id="last_name" name="last_name" value="{{ $experience->last_name }}">

    <label for="phone">Téléphone:</label>
    <input type="text" id="phone" name="phone" value="{{ $experience->phone_number }}">

    

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ $experience->email }}">


    <button type="submit">Mettre à jour</button>
</form>

