
<form method="POST" action="{{ route('updateForm', $form->id) }}" id="editForm">
    @csrf
    @method('PUT')
    <h1>Modifier le form</h1>

    <label for="first_name">Prénom:</label>
    <input type="text" id="first_name" name="first_name" value="{{ $form->first_name }}">
    
    <label for="photo_url">Photo:</label>
    <input type="url" id="photo_url" name="photo_url">

    <label for="last_name">Nom:</label>
    <input type="text" id="last_name" name="last_name" value="{{ $form->last_name }}">

    <label for="phone">Téléphone:</label>
    <input type="text" id="phone" name="phone" value="{{ $form->phone_number }}">

    

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ $form->email }}">


    <button type="submit">Mettre à jour</button>
</form>

