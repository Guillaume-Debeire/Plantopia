# Team logbook

## Sprint 0

### 05/02/2021

Première réunion, lancement du projet : définiton des objectifs, du MVP, des fonctionnalités indispensables et bonus.

Définition des rôles au sein de l'équipe.

Création des documents suivants :

- Team logbook (journal d'équipe)
- Specifications (cahier des charges)
- Information watch (veille informationnelle)
- Data dictionnary (dictionnaire des données)
- MCD
- Team roles (liste des rôles au sein de l'équipe)
- Wireframe

### 08/02/2021

Validation de l'outil de gestion de projet.

Rédaction collective du cahier des charges.

Mélanie : reformulation présentation du projet, arborescence
Yanis : wireframes mobile et desktop
Guillaume & Christophe : routes, dictionnaire de données, user stories, MCD

Création de toute la documentation du Sprint 0.

Réunion de validation de la documentation avec les référents.

Axes d'amélioration/réflexion :

- affiner les wireframes, ajouter des légendes
- réflechir à l'intégration du back-office : URL séparée ou intégration côté front / React
- gestion du repo Github : 1 ou 2 ?
- traduire le MCD en anglais + ajouter createdAt et updatedAt pour 'plants' + ajouter une table 'categories' ou 'types' + table relationnelle à créer et y affecter les données à fournir au calendrier + roles des users + revoir les relations
- bonus : une maquette + charte graphique

### 09/02/2021

Seconde réunion de validation pour wireframes et MCD (matin) :

- Wireframes :
  - indiquer la nature de l'icone avatar/user
  - préciser l'emplacement éventuel du menu et son contenu
  - légender le contenu de tous les champs
  - rendre tous les textes génériques

- MCD :
  - date d'initialisation de l'arrosage (utiliser date_interval)
  - renommer description en spécificités
  - affiner les types des champs
  - pour Skill, possibilité d'utiliser une constante ENUM, en faire une valeur unique au sein de la table Plant

Mélanie : Mise à jour de wireframes mobile, création d'une maquette, début de la charte graphique, création des logos
Yanis : Mise à jour des wireframes desktop et mobile
Guillaume & Christophe : Modification du MCD, mise à jour du dictionnaire de données, mise à jour de wireframes mobile

Ebauche de l'organisation du Sprint 1.

### 10/02/2021

Lancement de la phase de dev

- Mélanie & Yanis : initialistaion du repo front, settings de React, intégration des components, wireframe de la homepage
- Guillaume & Christophe : création DB, controllers, entities, templates ; tests et débug

### 11/02/2021

- Mélanie : documentation, Sass, Components, multipage React
- Yanis : intégration header, Sass, responsive
- Guillaume : authentificateur
- Christophe : images
- Guillaume & Christophe : sécurité, rôles, accès, amélioration des forms, CSS backoffice

### 12/02/2021

- Mélanie : Pour le carnet d'équipe : j'ai continué à bosser sur l'intégration et la version desktop. Si j'ai un peu de temps ce week-end je vais faire une wireframe "high fidelity" et si j'ai beaucoup de temps je vais intégrer le code de Yanis dans le mien
- Yanis : intégration avec adaptation en version mobile , menu 'burger' en cours
- Guillaume : optimisation avec Twig et CSS de l'affichage des infos
- Guillaume & Christophe : débug entités, bdd et relation User-CalendarSchedule ; modif des controllers user et plant (méthodes new et add)
- Mélanie & Christophe : présentation de la rétrospective hebdomadaire

### 15/02/2021

- Mélanie : Merge des repos et premier passage de données (Props) sur la page d'accueil ; mise en place du routeur avec les 2 pages de l'application
- Yanis : bibliothèque d'icon pour le site (Feather https://feathericons.com/) et développement du menu burger de la version mobile
- Guillaume : optimisation interface des données en backoffice ; associations entre entités Plant et User
- Christophe : Plant et User ApiControllers, tests Insomnia, mise en place de Lexik_JWT et Cors ; remplacement de Monday par Trello

### 16/02/2021

- Mélanie : Mise en place de Store, State, Reducer, Containers, Slugify ; ensemble opérationnel
- Yanis : Résolution de problèmes VM et Library
- Guillaume : Tests de récupérations des données en API, préparations des endpoints et récupération du Token
- Christophe : Lexik_JWT, debug de "invalid credentials" et des accès "unauthorized"

### 17/02/2021

Première connexion en local entre le front et le back en API !

- Mélanie : création des selectors pour "plants", implémentation de withRouter et ses props, création et implémentation des actions dans App, création du Middleware ajax et implémentation dans le store
- Yanis : composants des pages login, à propos, création de compte ; CSS
- Guillaume : Slugger, voters User et Plant, optimisation templates
- Christophe : Endpoints API, voters User et Plant

### 18/02/2021

- Mélanie : merge des composants, connexion API (avec l'équipe back)
- Yanis : merge des composants, code review du projet
- Guillaume & Christophe : connexion API (avec l'équipe front), documentation et configuration pour Cors et lexik_jwt

### 19/02/2021

- Yanis & Guillaume : présentation de la rétrospective Sprint 1
- Mélanie : suite à l'issue, connexion API OK ; loading state
- Yanis : documentation et code review pour mise en place de la fonctionnalité calendrier
- Guillaume & Christophe : ApiPlantController et ApiUserController add et edit ; désactivation de lexik_jwt pour connexion avec le front ; fichier d'import SQL

Merge Sprint 1 côté front et côté back

### 22/02/2021

- Mélanie : Formulaire de login avec contrôle des champs en BDD, récupération du token
- Yanis : Composant fonctionnalité Calendrier
- Guillaume : ApiPlantController edit et delete, préparation au déploiement
- Christophe : Déploiement AWS code back

### 23/02/2021

Réunion de mi-sprint

- Mélanie : Affichage conditionnel du login form, Composant + passage de props barre de recherche
- Yanis : Code review Calendrier
- Guillaume : Requête custom, relations avec front
- Christophe : Déploiement code front, ajout des flash messages en backoffice

### 24/02/2021

- Mélanie : fonctionnalité Search, formulaire d'inscription
- Yanis : développement fonctionnalité Calendrier
- Guillaume : requêtes custom DQL, API endpoints et fonctions pour envoi des données au calendrier et tri des plantes par user
- Christophe : liip, tests et débug relation back-front

### 25/02/2021

- Mélanie : fin du formulaire d'inscription, page 404, affichage conditionnel du menu pour user connecté, récupération des plantes d'user connecté, page d'équipe
- Yanis : documentation et mise en place du calendrier avec FullCalendar
- Guillaume : amélioration ApiUserController, ajout et édition d'user en Api, dessin d'une mascotte
- Christophe : mise à jour documentation du projet, complétion de sql.db, gestion des images, relation back-front

### 26/02/2021

Rétrospéctive Sprint 2

- Mélanie :
- Yanis : Présentation cockpit, implémentation calendrier, travail sur récupération des données en Api
- Guillaume : CSS backoffice, affichage login, amélioration edit et add ApiPlantController
- Christophe : Présentation cockpit, modification des widget forms

### 01/03/2021

- Mélanie : page d'une plante, formulaire de création d'une plante par un user
- Yanis : fonctionnalité calendrier, résolution du blocage des props
- Guillaume : ajout d'une requête sur PlantRepository, modification sur les ApiControllers, documentation sur Swagger/OA et déploiement projet React
- Christophe : documentation et essais sur Swagger/OA ; essais sur projet front côté serveur AWS

### 02/03/2021

- Mélanie : formulaire d'ajout de plante, search form
- Yanis : mise en place requête axios du calendrier, documentation et code review
- Guillaume : création de service IntervalStringer
- Guillaume & Christophe : paramétrage Apache, déploiement front sur surge, ergonomie et design backoffice

### 03/03/2021

- Mélanie : 
- Yanis : affichage d'évènements dans le calendrier
- Guillaume : ApiControllers modifiés pour calendrier, travail sur l'ergonomie générale et le design du backoffice, amélioration des formulaires
- Christophe : Déploiement front et back, travail sur l'ergonomie générale et le design du backoffice, amélioration des formulaires

### 04/03/2021

- Mélanie :
- Yanis :
- Guillaume :
- Christophe :

### 05/03/2021

Apothéose !
