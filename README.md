Fakebook
========

CIS217 forum group project

The goal of this project is to put together everything we learned, and make a fully functional forum with PHP and MySQL.

Installation
------------

#### Dependencies

* An http server (nginx, lighttpd, or apache)
* PHP installed and setup with your http server
* MySQL server

#### Setup

1. Add a new database in MySQL
2. Add the given tables to that database
3. Edit config.php to point to your database server and account information
4. Go to index.php on your web server and it should be working!

#### Tables

```
CREATE TABLE threads (
id int(4) NOT NULL AUTO_INCREMENT,
title varchar(65) NOT NULL DEFAULT '',
username varchar(65) NOT NULL DEFAULT '',
datetime varchar(25) NOT NULL DEFAULT '',
rank int(4) NOT NULL DEFAULT '0',
content longtext NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE posts (
thread_id int(4) NOT NULL DEFAULT '0',
post_id int(4) NOT NULL DEFAULT '0',
username varchar(65) NOT NULL DEFAULT '',
datetime varchar(25) NOT NULL DEFAULT '',
rank int(4) NOT NULL DEFAULT '0',
content longtext NOT NULL,
KEY post_id (post_id)
);
```