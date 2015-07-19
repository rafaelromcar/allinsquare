USE allinsquare;

/*
** DELETE RELATIONS
*/

DROP TABLE IF EXISTS user_contacts;
DROP TABLE IF EXISTS user_notifications;

DROP TABLE IF EXISTS group_members;

DROP TABLE IF EXISTS bet_participations;
DROP TABLE IF EXISTS bet_options;

DROP TABLE IF EXISTS bet_allowed_users;
DROP TABLE IF EXISTS bet_allowed_groups;

DROP TABLE IF EXISTS account_operations;

/*
** DELETE MAIN TABLES
*/

DROP TABLE IF EXISTS bets;
DROP TABLE IF EXISTS groups;
DROP TABLE IF EXISTS accounts;
DROP TABLE IF EXISTS users;