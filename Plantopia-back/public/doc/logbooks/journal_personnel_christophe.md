# Journal personnel

## Vendredi 5 février

Réunion de lancement :

- Echange libre autour du projet, des fonctionnalités et du MVP
- Définition des rôles : je suis nommé Scrum Master
- Mise en place des dossiers et fichiers pour toute la documentation du Sprint 0

Test de Github Projects, choix de Monday.com comme outil de gestion de projet

## Lundi 8 février

- Validation de l'outil de gestion de projet, intégration des membres du projet et mise à jour des données
- Création du dictionnaire de données et du MCD
- Revue collective de la liste des routes, de l'arborescence et des wireframes
- Rédaction coopérative du cahier des charges
- Réunion de validation de l'ensemble des documents du Sprint 0 avec les référents

## Mardi 9 février

- Correction du MCD
- Mise à jour du dictionnaire de données
- Création des wireframes version mobile des pages login et signin
- Amélioration des wireframes version mobile des pages Historique et Bibliothèque
- Ebauche collective de la planification du Sprint 1
- Premières recherches sur la manière de lier React et Symfony (API Platform interdit)

## Mercredi 10 février

- Lancement de la phase de développement (Sprint 1)
- Séparation des repos Github back et front
- Création de la base de données
- Développement du backoffice :
  - Création des controllers en CRUD
  - Création des entities
  - Création des forms
  - Test et débug des formulaires

## Jeudi 11 février

- Correction de bugs de formulaires
- Ajout personnalisé de CSS basique
- Ajout de service de gestion des images pour les plantes et les utilisateurs
- Gestion des rôles, des accès, des utilisateurs (droits, navigation et affichage, redirections)

## Vendredi 12 février

- Présentation de la 2e partie de la rétrospective hebdomadaire
- Débug entités et base de données
- Changement de la relation User-CalendarSchedule (de OneToOne à OneToMany)
- Modification des controllers user et plant (méthodes new et add)

## Lundi 15 février

- Création des controllers ApiPlantController et ApiUserController
- Fonctions browse, read et add pour chacun (Ignore dans les entités, Serializer...)
- Validation avec Insomnia
- Modification de security.yaml
- Installation de CORS et Lexik_JWT
- Mise en place des tokens, bloquage sur la récupération du jeton et l'authentification
- Problème avec Monday, création d'un Trello pour remplacement

## Mardi 16 février

- Journée consacrée à Lexik_JWT : debug de "invalid credentials" et des accès "unauthorized"

## Mercredi 17 février

- Liste des endpoints API
- Création des voters User et Plant
- Première connexion API avec le front
- Tests avec fixtures NelmioAlice

## Jeudi 18 février

- Travail sur la connexion API (avec le front)
- Configuration de Cors et lexik_jwt
- Documentation sur les problématiques API et JWT, et l'authentification côté front

## Vendredi 19 février

- Fichier SQL pour import d'un jeu de données
- ApiPlantController et ApiUserController : add et edit
- Désactivation de lexik_jwt pour connexion avec le front
- Préparation du déploiement

## Lundi 22 février

- Réunion de lancement Sprint 2, discussion sur les objectifs et sur l'organisation de l'équipe
- ApiUserController : edit et delete
- Réactivation de lexik_jwt
- Test de tous les endpoints API sur Insomnia
- Connexion sécurisée avec le front en API
- Déploiement du backoffice sur serveur AWS

## Mardi 23 février

- Déploiement partiel projet front
- Ajout des flash messages en backoffice

## Mercredi 24 février

- Bundle liip
- Tests et débug relation back-front

## Jeudi 25 février

- Mise à jour documentation du projet
- Complétion de sql.db
- Gestion des images backoffice
- Relation back-front

## Vendredi 26 février

- Présentation cockpit
- Première trame pour présentation de l'apothéose
- Modification des widget forms
- Mise à jour et déploiement AWS

## Lundi 1er mars

## Mardi 2 mars

## Mercredi 3 mars

## Jeudi 4 mars

## Vendredi 5 mars

Apothéose !
