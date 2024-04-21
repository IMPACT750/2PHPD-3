# Projet 2PHPD

Lancer du projet
1. Clonez ce dépôt sur votre machine locale.
2. Assurez-vous d'avoir PHP et Composer installés.
3. Exécutez `composer install` pour installer les dépendances.
4. Configurez votre base de données dans le fichier `.env`.
5. Exécutez `php bin/console doctrine:migrations:migrate` pour exécuter les migrations.
6. load les fixture avec 'php bin/console doctrine:fixture:load'
6. php bin/console importmap:install
7. php bin/console tailwind:init
8. Compilez le CSS avec `php bin/console tailwind:build --watch`.
9. Lancez le serveur de développement avec `symfony server:start`.
