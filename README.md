## Guide pour lancer le projet sur votre machine
Ce guide vous aidera à configurer et à lancer le projet sur votre machine locale. Les instructions sont fournies pour les systèmes d'exploitation Windows et Mac.

## Prérequis
• PHP
• MySQL

## Étapes

### Installer MySQL
Pour Windows et Mac, vous pouvez télécharger MySQL à partir de [ici](https://dev.mysql.com/downloads/installer/).

### Configurer le fichier .env

Ouvrez le fichier '.env' dans l'éditeur de texte de votre choix. Trouvez et modifiez les lignes suivantes avec vos informations :

'DB_PORT' : Remplacez sa valeur par le port de votre serveur MySQL. Par défaut, il s'agit généralement du port 3306.

'DB_USERNAME' : Remplacez sa valeur par le nom d'utilisateur de votre base de données. Généralement, il s'agit de 'root'.

'DB_PASSWORD' : Remplacez sa valeur par le mot de passe de votre base de données.

### Créer une base de données

Ouvrez le terminal et connectez-vous à MySQL en utilisant la commande suivante :

mysql -u root -p

Ensuite, créez une nouvelle base de données appelée 'ffs' en utilisant la commande suivante :

CREATE DATABASE ffs;

### Lancer le projet

Ouvrez un terminal dans le répertoire du projet et exécutez la commande 'php artisan serve'.

### Problèmes courants
Si vous rencontrez des problèmes lors de l'exécution du projet, assurez-vous que :

Votre serveur MySQL est en cours d'exécution. Les informations de la base de données dans le fichier '.env' sont correctes. La base de données 'ffs' existe dans votre MySQL.

Installer les dépendances PHP
Avant de lancer le projet, assurez-vous d'avoir toutes les dépendances PHP installées. Vous pouvez utiliser Composer pour cela. Si vous n'avez pas Composer installé, vous pouvez le télécharger à partir de https://getcomposer.org/ et suivre les instructions d'installation pour votre système d'exploitation.

Une fois Composer installé, ouvrez un terminal dans le répertoire du projet et exécutez la commande suivante pour installer les dépendances :

Copy code
composer install
Exécuter les migrations
Les migrations sont des scripts PHP qui permettent de gérer la structure de la base de données. Assurez-vous que toutes les tables nécessaires sont créées en exécutant les migrations. Toujours dans le répertoire du projet, exécutez la commande suivante :

Copy code
php artisan migrate
Exécuter les seeders
Les seeders sont des scripts qui permettent de peupler la base de données avec des données initiales. Si vous utilisez des seeders fournis par les packages Breeze et Audits, exécutez-les après les migrations. Utilisez la commande suivante pour exécuter les seeders :

Copy code
php artisan db:seed
Lancer le serveur
Maintenant que toutes les dépendances sont installées, la base de données est configurée et peuplée, vous pouvez lancer le serveur. Exécutez la commande suivante :

Copy code
php artisan serve
Assurez-vous de visiter l'URL indiquée dans la sortie du terminal pour accéder à votre projet dans le navigateur.

Vérification
Pour vérifier que votre projet fonctionne correctement, ouvrez votre navigateur web et accédez à l'URL fournie par la commande php artisan serve. Vous devriez voir votre application fonctionner correctement. Si vous rencontrez des problèmes, consultez les journaux d'erreurs et assurez-vous que toutes les étapes précédentes ont été suivies correctement.

En suivant ces étapes supplémentaires, vous devriez être en mesure de lancer votre projet de bout en bout, en utilisant les seeders fournis par les packages Breeze et Audits pour peupler votre base de données avec des données initiales.

## Étapes

### Installer les dépendances PHP

Avant de lancer le projet, assurez-vous d'avoir toutes les dépendances PHP installées. Vous pouvez utiliser Composer pour cela. Si vous n'avez pas Composer installé, vous pouvez le télécharger à partir de [https://getcomposer.org/](https://getcomposer.org/) et suivre les instructions d'installation pour votre système d'exploitation.

Une fois Composer installé, ouvrez un terminal dans le répertoire du projet et exécutez la commande suivante pour installer les dépendances :

\```
composer install
\```

### Exécuter les migrations

Les migrations sont des scripts PHP qui permettent de gérer la structure de la base de données. Assurez-vous que toutes les tables nécessaires sont créées en exécutant les migrations. Toujours dans le répertoire du projet, exécutez la commande suivante :

\```php
php artisan migrate
\```


### Exécuter les seeders

Les seeders sont des scripts qui permettent de peupler la base de données avec des données initiales. Si vous utilisez des seeders fournis par les packages Breeze et Audits, exécutez-les après les migrations. Utilisez la commande suivante pour exécuter les seeders :

\```php
php artisan db:seed
\```

### Lancer le serveur

Maintenant que toutes les dépendances sont installées, la base de données est configurée et peuplée, vous pouvez lancer le serveur. Exécutez la commande suivante :

\```php
php artisan serve
\```
