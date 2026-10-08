# Ligue e-sport

## 1. Auteure et thème
Carol-Ann Homan - Des ligues de e-sport et organisation de Tournois

## 2. Ce que fait l'application
Elle montre les différentes équipes et leur membres. Puis des tournois que l'on peut créer

## 3. Le modèle de données
-equipes : nom (unique), tag(unique), ville, description
-joueurs : appartient à une équipe (equipe_id)
-tournois : nom, jeu, dates, bourse, nombre d'équipes maximum
-equipe_tournois : table pivot, avec le classement de l'équipe

Relations :
Une équipe à plusieurs joueurs (un-à-plusieurs)
Une équipe participe à plusieurs tournois et un tournoi reçoit plusieurs équipes (plusieurs-à-plusieurs)

Propriétés calculées : l'âge du joueur et le statut du tournois (à venir, en cours, terminé)

## 4. Démarrer le projet
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm install
npm run build

## 5. La capacité trouvée dans la documentation
J'ai créé une règle de validation maison avec php artisan make:rule EquipeComplete
Je l'ai trouvée dans la documentation de Laravel, page Validation, section
« Custom Validation Rules »

Je l'ai choisie parce qu'aucune règle de Laravel ne vérifie qu'une équipe a au moins
5 joueurs avant de l'inscrire à un tournoi. J'ai dû comprendre que la règle reçoit
l'identifiant de chaque équipe cochée, et qu'on appelle $fail() pour afficher
une erreur

## 6. Une difficulté rencontrée
Dans mon seeder des joueurs, j'avais écrit count(3, 7) en pensant qur ça allait me donner 3 à 7 joueurs
par équipe. Malheureusment, j'ai fini avec 3 joueurs dans toutes mes équipes.  Donc, aucun ne pouvaient 
s'inscrire au tournoi. Ça prit un moment pour que je me souvienne que count() prenait qu'un nombre
et je l'ai corriger par count(rand(3,7))

## 7. Aide reçue
- Les notes de cours
- La documentation de Laravel
- Coolors, pour la palette de couleurs