# CREATE DATABASE allinsquare;
#
# CREATE USER 'allinsquare'@'localhost' IDENTIFIED BY '4ll1nSQu4r3!';
# GRANT ALL PRIVILEGES ON allinsquare. * TO 'allinsquare'@'localhost';

USE allinsquare;

/*
** USER MODULE
*/

CREATE TABLE IF NOT EXISTS users (
  id_user INT(6) UNSIGNED AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL,
  surname VARCHAR(30) NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  username VARCHAR(30) NOT NULL UNIQUE,
  password VARCHAR(40) NOT NULL,
  photo VARCHAR(40),
  PRIMARY KEY (id_user)
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS user_notifications (
  id_notification INT(6) UNSIGNED AUTO_INCREMENT,
  title VARCHAR(150) NOT NULL,
  description VARCHAR(500) NOT NULL,
  state ENUM('pending', 'answered') NOT NULL,
  notif_date DATETIME NOT NULL,
  user_id INT(6) UNSIGNED NOT NULL,
  PRIMARY KEY (id_notification),
  FOREIGN KEY (user_id) REFERENCES users (id_user) on delete cascade
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS user_contacts (
  user1_id INT(6) UNSIGNED NOT NULL,
  user2_id INT(6) UNSIGNED NOT NULL,
  state ENUM('pending', 'denied', 'blocked', 'contact') NOT NULL,
  PRIMARY KEY (user1_id, user2_id),
  FOREIGN KEY (user1_id) REFERENCES users (id_user) on delete cascade,
  FOREIGN KEY (user2_id) REFERENCES users (id_user) on delete cascade,
  CONSTRAINT UNIQUE (user1_id, user2_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS groups (
  id_group INT(6) UNSIGNED AUTO_INCREMENT,
  title VARCHAR(150) NOT NULL UNIQUE,
  description VARCHAR(500) NOT NULL,
  photo VARCHAR(40),
  PRIMARY KEY (id_group)
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS group_members (
  group_id INT(6) UNSIGNED NOT NULL,
  user_id INT(6) UNSIGNED NOT NULL,
  state ENUM('pending', 'denied', 'blocked', 'member', 'admin') NOT NULL,
  PRIMARY KEY (group_id, user_id),
  FOREIGN KEY (group_id) REFERENCES groups (id_group) on delete cascade,
  FOREIGN KEY (user_id) REFERENCES users (id_user) on delete cascade,
  CONSTRAINT UNIQUE (group_id, user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
** BET MODULE
*/

CREATE TABLE IF NOT EXISTS bets (
  id_bet INT(6) UNSIGNED AUTO_INCREMENT,
  title VARCHAR(150) NOT NULL,
  description VARCHAR(500) NOT NULL,
  photo VARCHAR(40),
  min_bet VARCHAR(10),
  bet_deadline DATETIME NOT NULL,
  bet_answered_date DATETIME NOT NULL,
  share_policy ENUM('public', 'invitation') NOT NULL,
  bet_type ENUM('sports', 'political', 'economical', 'others') NOT NULL,
  owner INT(6) UNSIGNED,
  PRIMARY KEY (id_bet),
  FOREIGN KEY (owner) REFERENCES users (id_user) on delete cascade
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS bet_options (
  id_option INT(6) UNSIGNED AUTO_INCREMENT,
  title VARCHAR(150) NOT NULL,
  description VARCHAR(250) NOT NULL,
  photo VARCHAR(40),
  state ENUM('pending', 'winner', 'loser') NOT NULL,
  bet_id INT(6) UNSIGNED,
  PRIMARY KEY (id_option),
  FOREIGN KEY (bet_id) REFERENCES bets (id_bet) on delete cascade,
  CONSTRAINT UNIQUE (bet_id, title)
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS bet_allowed_users (
  bet_id INT(6) UNSIGNED,
  user_id INT(6) UNSIGNED,
  PRIMARY KEY (bet_id, user_id),
  FOREIGN KEY (bet_id) REFERENCES bets (id_bet) on delete cascade,
  FOREIGN KEY (user_id) REFERENCES users (id_user) on delete cascade,
  CONSTRAINT UNIQUE (bet_id, user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS bet_allowed_groups (
  bet_id INT(6) UNSIGNED,
  group_id INT(6) UNSIGNED,
  PRIMARY KEY (bet_id, group_id),
  FOREIGN KEY (bet_id) REFERENCES bets (id_bet) on delete cascade,
  FOREIGN KEY (group_id) REFERENCES groups (id_group) on delete cascade,
  CONSTRAINT UNIQUE (bet_id, group_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS bet_participations (
  user_id INT(6) UNSIGNED,
  option_id INT(6) UNSIGNED,
  cantity FLOAT NOT NULL,
  PRIMARY KEY (user_id, option_id),
  FOREIGN KEY (option_id) REFERENCES bet_options (id_option) on delete cascade,
  FOREIGN KEY (user_id) REFERENCES users (id_user) on delete cascade,
  CONSTRAINT UNIQUE (user_id, option_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
** Account module
*/

CREATE TABLE IF NOT EXISTS accounts (
  id_account INT(6) UNSIGNED AUTO_INCREMENT,
  owner INT(6) UNSIGNED UNIQUE,
  cantity FLOAT NOT NULL,
  PRIMARY KEY (id_account),
  FOREIGN KEY (owner) REFERENCES users (id_user) on delete cascade
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS account_operations (
  id_operation INT(6) UNSIGNED AUTO_INCREMENT,
  account_id INT(6) UNSIGNED NOT NULL,
  type ENUM('add', 'remove') NOT NULL,
  additional_information VARCHAR(300),
  PRIMARY KEY (id_operation),
  FOREIGN KEY (account_id) REFERENCES accounts (id_account) on delete cascade
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

