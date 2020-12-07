# api-rest-symfony

# étapes à suivre pour le cours API REST avec Symfony 5
<ol>
<li> Clonez le dépôt dans votre espace de travail</li>
<li> Installez les dépendances : composer install (Si problème: composer update)<br>
<li> Adapter le fichier .env avec votre base de données (username, password, dbname)</li>
<li> Créez la base de données : php bin/console doctrine:database:create</li>
<li> Appliquez les migrations : php bin/console doctrine:schema:update</li>
<li> Envoyez les fixtures à la base de données : php bin/console doctrine:fixture:load</li>
<li> Lancez le server : symfony server:start</li>
</ol>