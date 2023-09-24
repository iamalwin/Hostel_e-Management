ALTER TABLE stud
ADD COLUMN ap_id VARCHAR(255) AFTER id,
ADD COLUMN stud_id VARCHAR(255) AFTER ap_id;


UPDATE stud
SET ap_id = CONCAT('AP', LPAD(id, 4, '0')),
    stud_id = CONCAT('STUD', LPAD(id, 4, '0'));


CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ap_id VARCHAR(255),
    stud_id VARCHAR(255),
    name VARCHAR(255),
    reg VARCHAR(255),
    dept VARCHAR(255),
    year INT,
    fathname VARCHAR(255),
    fathphone VARCHAR(20),
    age INT,
    dob DATE,
    bldgrp VARCHAR(10),
    email VARCHAR(255),
    phone VARCHAR(20),
    address VARCHAR(255),
    image VARCHAR(255),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
