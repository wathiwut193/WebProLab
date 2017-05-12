CREATE TABLE todo(
    id int(11) NOT NULL,
    start date NOT NULL COMMENT 'todo' ,
    topic varchar(255) NOT NULL COMMENT 'finish date',
    status int(1) NOT NULL COMMENT '0=undone 1=done'
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;
ALTER TABLE todo ADD PRIMARY KEY (id);

ALTER TABLE todo MODIFY id int(11) NOT NULL AUTO_INCREMENT;