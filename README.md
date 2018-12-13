Anaxago symfony-starter-kit
===================

# Description

Les données préchargés sont
- pour les users 

| email     | password    | Role |
| ----------|-------------|--------|
| john@local.com  | john   | ROLE_USER    |
| admin@local.com | admin | ROLE_ADMIN   | 

 - une liste de 3 projets
 
La connexion et l'enregistrement des utilisateurs sont déjà configurés et opérationnels


# Installation
- ```composer install```
- ```composer init-db ```


    - Script personnalisé permet de créer la base de données, de lancer la création du schéma et de précharger les données
    - Ce script peut être réutilisé pour ré-initialiser la base de données à son état initial à tout moment
    
    - @get: /projects : retourne une liste des projets
    - @get: /interestByUser : permet un utilisateur inscrit de lister les projets sur lesquels il a marqué un intérêt
    - @post : /interest/{project_id} : permet un utilisateur inscrit d’enregistrer une marque d'intérêt en précisant le montant qu’il souhaite investir
