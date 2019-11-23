Apres avoir cloné le projet, il faut vous assurer que l'outil composer soit bien installé dans vorte PC.

#Configurations

Il faut configurer le fichier .env. S'il est inexistant, renommer le fichier .env.example en .env. Dans ce fichier, vous devrez surtout vous assurer que les identifiants de connexion à votre base de données soient les bons, ainsi que le nom de votre base de données (s'assurer qu'elle est existante). 

#Lancement

1. Entrez donc la commande
```sh
php artisan migrate
```
Elle permettra de créer toutes les tables nécessaires.

2. Ensuite, entrez la commande 
```sh
php artisan serve --port=8080
```
Votre application est lancée à l'adresse http://127.0.0.1:8080
