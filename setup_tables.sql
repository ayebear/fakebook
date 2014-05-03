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
