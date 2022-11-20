CREATE DATABASE test_db

CREATE TABLE test_tbl(
	id int,
	username varchar(255),
	country_code varchar(5),
	pnum varchar(10)
);

INSERT INTO test_tbl VALUES(1, 'Akash', '91', '9075897125');

ALTER TABLE test_tbl ALTER COLUMN id int NOT NULL;

ALTER TABLE test_tbl ADD PRIMARY KEY (id);

SELECT * FROM test_tbl