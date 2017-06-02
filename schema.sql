CREATE TABLE client (
  id INT PRIMARY KEY NOT NULL,
  name VARCHAR(60) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  address VARCHAR(120),
  email VARCHAR(80),
  date_created TIMESTAMP);
  
  CREATE TABLE order (
  id INT PRIMARY KEY NOT NULL,
  client_id INT REFERENCES client(id) NOT NULL,
  date_created TIMESTAMP DEFAULT NOW(),
  status VARCHAR(10) NOT NULL,
  delivery_date TIMESTAMP 
  -- We will omit quoted_price field for now
  );
  
  CREATE TABLE orderitem (
  id INT PRIMARY KEY NOT NULL,
  order_id INT REFERENCES order(id) NOT NULL,
  date_created TIMESTAMP DEFAULT NOW(),
  status VARCHAR(10) NOT NULL
  );
  
  CREATE TABLE job (
  id INT PRIMARY KEY NOT NULL,
  orderitem_id INT REFERENCES orderitem(id) NOT NULL,
  date_created TIMESTAMP DEFAULT NOW(),
  status VARCHAR(10) NOT NULL,
  machine_id INT REFERENCES machine(id) NOT NULL,
  start_time TIMESTAMP,
  end_time TIMESTAMP,
  machine_start_time TIMESTAMP,
  machine_end_time TIMESTAMP,
  drawing_file VARCHAR(255),
  machine_program_number INT -- this is number on the chmer machine when the program runs I think
  -- more columns after consultation with Sid, seems like most entries in Jobcard are not filled.
  );
  
  CREATE TABLE machine (
  id INT PRIMARY KEY NOT NULL,
  owner_id INT REFERENCES owner(id) NOT NULL,
  manufacturer VARCHAR(50) NOT NULL,
  model VARCHAR(50) NOT NULL,
  details VARCHAR(255) NOT NULL,
  type VARCHAR(50) NOT NULL, -- EDM, Lathe, Wire cut etc.
  manufacture_date DATE -- how old is the machine
  );
  
  CREATE TABLE owner ( -- this is table for the machine owner
  id INT PRIMARY KEY NOT NULL,
  name VARCHAR(60) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  address VARCHAR(120),
  email VARCHAR(80),
  date_created TIMESTAMP);
  
  
  
