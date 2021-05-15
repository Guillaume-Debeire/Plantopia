# Api Plantopia

## Endpoints

| Routes                       | Nom de la route      | Méthodes (HTTP) | Commentaires                           |
| ---------------------------- | -------------------- | --------------- | -------------------------------------- |
| /api/plants                  | api_plants_browse    | GET             |                                        |
| /api/plants/{id}             | api_plants_read      | GET             |                                        |
| /api/plants/edit/{id}        | api_plants_edit      | PUT             |                                        |
| /api/plants                  | api_plants_add       | POST            |                                        |
| /api/plants/delete/{id}      | api_plants_delete    | DELETE          |                                        |
| /api/myaccount/browse        | api_myaccount_browse | GET             |                                        |
| /api/myaccount               | api_myaccount_read   | GET             |                                        |
| /api/myaccount/edit/{id}     | api_myaccount_edit   | PUT             |                                        |
| /api/myaccount               | api_myaccount_add    | POST            |                                        |
| /api/myaccount/watering      | api_myaccount_add    | POST            |                                        |
| /api/myaccount/fertilization | api_myaccount_add    | POST            |                                        |
| /api/myaccount/repotting     | api_myaccount_add    | POST            |                                        |
| /api/myaccount/cut           | api_myaccount_add    | POST            |                                        |
| /api/myaccount/delete/{id}   | api_myaccount_delete | DELETE          |                                        |
| /api/login_check             | -                    | POST            | Credentials check and token generation |

## Controllers

| Routes                      | Controller         | ->méthode()       | Commentaires |
| --------------------------- | ------------------ | ----------------- | ------------ |
| api_plants_browse           | ApiPlantController | ->browse()        |              |
| api_plants_read             | ApiPlantController | ->read()          |              |
| api_plants_edit             | ApiPlantController | ->edit()          |              |
| api_plants_add              | ApiPlantController | ->add()           |              |
| api_plants_delete           | ApiPlantController | ->delete()        |              |
| api_myaccount_browse        | ApiUserController  | ->browse()        |              |
| api_myaccount_read          | ApiUserController  | ->read()          |              |
| api_myaccount_edit          | ApiUserController  | ->edit()          |              |
| api_myaccount_add           | ApiUserController  | ->add()           |              |
| api_myaccount_watering      | ApiUserController  | ->watering()      |              |
| api_myaccount_fertilization | ApiUserController  | ->fertilization() |              |
| api_myaccount_repotting     | ApiUserController  | ->repotting()     |              |
| api_myaccount_cut           | ApiUserController  | ->cut()           |              |
| api_myaccount_delete        | ApiUserController  | ->delete()        |              |
