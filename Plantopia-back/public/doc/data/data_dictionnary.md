# Data dictionnary

## Plante (`plant`)

| Champ               | Type         | Spécificités                                    | Description                                         |
| ------------------- | ------------ | ----------------------------------------------- | --------------------------------------------------- |
| id                  | INT          | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | plant's ID                                          |
| name                | VARCHAR(128) | NOT NULL                                        | plant's name                                        |
| specification       | LONGTEXT     | NULL                                            | additional informations : wintering, specs...       |
| age                 | DATE         | NULL                                            | plant's age                                         |
| initialization_date | DATE         | NULL                                            | calendar starting point                             |
| watering            | TINYINT      | NULL                                            | date interval of watering                           |
| light               | TEXT         | NULL                                            | plant's light exposure method                       |
| cut                 | ENUM         | NULL                                            | cut's month                                         |
| fertilization       | TINYINT      | NULL                                            | plant's fertilization interval                      |
| repotting           | TEXT         | NULL                                            | plant's repotting method                            |
| picture             | TEXT         | NULL                                            | plant's picture                                     |
| type_id             | INT          | FOREIGN KEY, NULL, UNSIGNED                     | plant's type : inside or outside                    |
| skill_id            | INT          | FOREIGN KEY, NULL, UNSIGNED                     | users required skills : beginner, average or expert |
| created_at          | DATETIME     | NOT NULL, DEFAULT CURRENT_TIMESTAMP             | plant's creation date                               |
| updated_at          | DATETIME     | NULL                                            | plant's update date                                 |

## Utilisateur (`user`)

| Champ      | Type        | Spécificités                                    | Description          |
| ---------- | ----------- | ----------------------------------------------- | -------------------- |
| id         | INT         | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | user's ID            |
| pseudo     | VARCHAR(64) | NOT NULL                                        | user's pseudo        |
| password   | VARCHAR(64) | NOT NULL                                        | user's password      |
| email      | VARCHAR(64) | NOT NULL                                        | user's email         |
| avatar     | VARCHAR(64) | NULL                                            | user's avatar        |
| created_at | DATETIME    | NOT NULL, DEFAULT CURRENT_TIMESTAMP             | user's creation date |
| updated_at | DATETIME    | NULL                                            | user's update date   |

## Type (`type`)

| Champ | Type        | Spécificités                                    | Description                       |
| ----- | ----------- | ----------------------------------------------- | --------------------------------- |
| id    | INT         | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | type's ID                         |
| name  | VARCHAR(64) | NOT NULL                                        | type's name (0=inside, 1=outside) |

## Skill (`skill`)

| Champ | Type        | Spécificités                                    | Description                                    |
| ----- | ----------- | ----------------------------------------------- | ---------------------------------------------- |
| id    | INT         | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | user's ID                                      |
| name  | VARCHAR(64) | NOT NULL                                        | user's skill (0=beginner, 1=average, 2=expert) |

## CalendarSchedule (`calendar_schedule`)

| Champ    | Type | Spécificités                    | Description |
| -------- | ---- | ------------------------------- | ----------- |
| user_id  | INT  | FOREIGN KEY, NOT NULL, UNSIGNED | user's ID   |
| plant_id | INT  | FOREIGN KEY, NOT NULL, UNSIGNED | plant's ID  |

## Role (`role`)

| Champ       | Type        | Spécificités                                    | Description                               |
| ----------- | ----------- | ----------------------------------------------- | ----------------------------------------- |
| id          | INT         | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | role ID                                   |
| name        | VARCHAR(64) | NOT NULL                                        | role name (Utilisateur or Administrateur) |
| role_string | VARCHAR(64) | NOT NULL                                        | role string (ROLE_USER and ROLE_ADMIN)    |
