<div id="info">
    <h1>Détails du form</h1>

    <p>Nom : {{ $form->first_name }} {{ $form->last_name }}</p>
    <p>Téléphone : {{ $form->phone_number }}</p>
    <p>Email : {{ $form->email }}</p>
    <img src=" {{ $form->photo_url }}"/>
    <p>lala<p>
</div>
<button id="editButton">Modifier</button>

<h1>Modifier le form</h1>

<form method="POST" action="{{ route('updateForm', $form->id) }}" id="editForm">
    @csrf
    @method('PUT')

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
<style>
    .info {
        display: block;
    }
    form {
        display: none;
    }
</style>
<script>
    document.getElementById('editButton').addEventListener('click', function() {
        var form = document.getElementById('editForm');
        var info = document.getElementById('info');
        if (form.style.display === 'none') {
            form.style.display = 'block';
            info.style.display = 'none';
        } else {
            form.style.display = 'none';
            info.style.display = 'block';
        }
    });
</script>
