# MCD v3

TYPE: name
BELONGS TO, 11 PLANT, 0N TYPE

SKILL: name
REQUIRES, 0N SKILL, 11 PLANT
PLANT: name, specification, age, watering, light, cut, fertilization, repotting, picture, initialization_date, created_at, updated_at
CALENDAR_SCHEDULE, 11 PLANT, 0N USER
USER: pseudo, email, avatar, password, created_at, updated_at

ROLE: name, role_string
HAS, 0N ROLE, 11 USER
