# Routes

| route                   | method | description                                      | controlleur | nom                       |
| ----------------------- | ------ | ------------------------------------------------ | ----------- | ------------------------- |
| plants                  | GET    | liste les plantes                                | Plant       | plant_browse              |
| plants/{id}             | GET    | détail de la plante                              | Plant       | plant_read                |
| plants/calendar/{id}    | POST   | ajouter la plante au calendrier                  | Plant       | plant_calendar            |
| plants/edit/{id}        | PUT    | modifier une plante                              | Plant       | plant_edit                |
| plants/add              | POST   | ajouter une plante                               | Plant       | plant_add                 |
| plants/delete/{id}      | DELETE | supprimer une plante                             | Plant       | plant_delete              |
| ----------------------- | ------ | ------------------------------------------------ | ----------- | ------------              |
| accounts/{id}           | GET    | détail d'un utilisateur                          | User        | account_read              |
| accounts/edit/{id}      | PUT    | modifier son compte                              | User        | account_edit              |
| accounts/delete/{id}    | DELETE | supprimer son compte                             | User        | account_delete            |
| calendar/{id}           | GET    | visualiser son calendrier                        | User        | account_calendar          |
| ----------------------- | ------ | ------------------------------------------------ | ----------- | ------------              |
| 404                     | GET    | page non trouvée                                 | Main        | 404                       |
| password                | GET    | modifier un mot de passe oublié                  | Main        | forgotten_password        |
| password                | POST   | modifier un mot de passe oublié                  | Main        | forgotten_password_submit |
| contact                 | GET    | formulaire de contact                            | Main        | contact                   |
| contact                 | POST   | soumettre le formulaire de contact               | Main        | contact_submit            |
| legalmentions           | GET    | affiche les mentions légales                     | Main        | legal_mentions            |
| about                   | GET    | affiche les informations sur l'équipe et le site | Main        | about                     |
| ----------------------- | ------ | ------------------------------------------------ | ----------- | ------------------        |
| signin                  | GET    | formulaire de création d'un compte utilisateur   | User        | user_signin               |
| signin                  | POST   | soumettre le formulaire de création              | User        | user_signin_submit        |
| /                       | GET    | formulaire de connexion d'un utilisateur         | User        | user_login                |
| login                   | POST   | soumettre le formulaire de connexion             | User        | user_login_submit         |
| logout                  | POST   | déconnexion de l'utilisateur                     | User        | user_logout               |
| ----------------------- | ------ | ------------------------------------------------ | ----------- | ------------              |
| back/login              | GET    | formulaire de connexion d'un administrateur      | Admin       | admin_login               |
| back/login              | POST   | soumettre le formulaire de connexion admin       | Admin       | admin_login_submit        |
| back/logout             | POST   | déconnexion de l'administrateur                  | Admin       | admin_logout              |
| ----------------------- | ------ | ------------------------------------------------ | ----------- | ------------------        |
| back/plants             | GET    | liste les plantes                                | Plant       | plant_browse              |
| back/plants/{id}        | GET    | détail de la plante                              | Plant       | plant_read                |
| back/plants/edit/{id}   | PUT    | modifier une plante                              | Plant       | plant_edit                |
| back/plants/add         | POST   | ajouter une plante                               | Plant       | plant_add                 |
| back/plants/delete/{id} | DELETE | supprimer une plante                             | Plant       | plant_delete              |
| ----------------------- | ------ | ------------------------------------------------ | ----------- | ------------              |
| back/users              | GET    | liste les utilisateurs                           | User        | user_browse               |
| back/users/{id}         | GET    | détail d'un utilisateur                          | User        | user_read                 |
| back/users/edit/{id}    | PUT    | modifier un utilisateur                          | User        | user_edit                 |
| back/users/add          | POST   | ajouter un utilisateur                           | User        | user_add                  |
| back/users/delete/{id}  | DELETE | supprimer un utilisateur                         | User        | user_delete               |
| ----------------------- | ------ | ------------------------------------------------ | ----------- | ------------              |

## Bonus Plateforme d'échanges

| route                 | method | description          | controlleur | nom             |
| --------------------- | ------ | -------------------- | ----------- | --------------- |
| exchanges             | GET    | liste les échanges   | Exchange    | exchange_browse |
| exchanges/{id}        | GET    | détail d'un échange  | Exchange    | exchange_read   |
| exchanges/edit/{id}   | PUT    | modifier un échange  | Exchange    | exchange_edit   |
| exchanges/add         | POST   | ajouter un échange   | Exchange    | exchange_add    |
| exchanges/delete/{id} | DELETE | supprimer un échange | Exchange    | exchange_delete |
| --------------------- | ------ | -------------------- | --------    | --------------- |
