## Guide d'installation du projet
Ce guide vous aidera à installer et à exécuter le projet sur votre machine locale. Les instructions sont valables pour Windows et Mac.

## Prérequis
- PHP
- MySQL

## Instructions d'installation

### 1. Installation de MySQL
Téléchargez et installez MySQL pour Windows et Mac à partir de ce [lien](https://dev.mysql.com/downloads/installer/).

### 2. Configuration du fichier .env
Ouvrez le fichier '.env' et modifiez les paramètres suivants avec vos informations :
- 'DB_PORT' : Indiquez le port de votre serveur MySQL (généralement 3306).
- 'DB_USERNAME' : Indiquez le nom d'utilisateur de votre base de données (généralement 'root').
- 'DB_PASSWORD' : Indiquez le mot de passe de votre base de données.

### 3. Création de la base de données
Ouvrez le terminal et connectez-vous à MySQL avec la commande `mysql -u root -p`. Créez ensuite une nouvelle base de données nommée 'ffs_app' avec la commande `CREATE DATABASE ffs_app;`.

### 4. Installation des dépendances PHP
Assurez-vous d'avoir toutes les dépendances PHP nécessaires. Si vous n'avez pas Composer, téléchargez-le à partir de [https://getcomposer.org/](https://getcomposer.org/). Une fois installé, ouvrez un terminal dans le répertoire du projet et exécutez `composer install`.

### 5. Exécution des migrations
Les migrations sont des scripts PHP qui gèrent la structure de la base de données. Exécutez les migrations avec la commande `php artisan migrate`.


### 6. Exécution des seeders
Les seeders sont des scripts qui peuplent la base de données avec des données initiales. Si vous utilisez des seeders fournis par les packages Breeze et Audits, exécutez-les après les migrations avec la commande `php artisan db:seed`.

### 7. Création d'un lien symbolique pour le stockage
Laravel utilise le répertoire `storage` pour stocker divers fichiers, comme les images téléchargées. Pour rendre ces fichiers accessibles à partir du web, vous devez créer un lien symbolique entre le répertoire `public` et `storage` avec la commande `php artisan storage:link`.

### 8. Installation des dépendances JavaScript
Si vous n'avez pas npm, vous pouvez le télécharger à partir de [https://nodejs.org/](https://nodejs.org/). Une fois installé, ouvrez un terminal dans le répertoire du projet et exécutez `npm install`.

### 9. Compilation des assets
Dans le même terminal, exécutez la commande `npm run dev` pour compiler vos assets.

### 10. Lancement du serveur
Une fois que toutes les dépendances sont installées et que la base de données est configurée et peuplée, lancez le serveur avec la commande `php artisan serve`.

## Vérification
Pour vérifier que votre projet fonctionne correctement, ouvrez votre navigateur web et accédez à l'URL fournie par la commande `php artisan serve`. Si vous rencontrez des problèmes, consultez les journaux d'erreurs et assurez-vous que toutes les étapes d'installation ont été correctement suivies.