<h1>Mon répertoire</h1>
<form method="POST" action="/form" enctype="multipart/form-data">
    @csrf
    <input type="text" name="first_name" placeholder="Prénom">
    <input type="text" name="last_name" placeholder="Nom">
    <input type="text" name="phone" placeholder="Numéro de téléphone">
    <input type="email" name="email" placeholder="Email">
    <button type="submit">Ajouter le form</button>
</form>