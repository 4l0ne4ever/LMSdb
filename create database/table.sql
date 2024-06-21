CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    usertype VARCHAR(50),
    phone VARCHAR(12),
    address VARCHAR(255)
);

CREATE TABLE readers (
    user_id INT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    phone VARCHAR(12),
    address VARCHAR(255),
    usertype VARCHAR(50),
    contributed_quantity int default 0,
    borrowed_quantity int default 0,
    lost_book int default 0,
    status VARCHAR(10),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE managers(
    manager_id int PRIMARY KEY,
    name varchar(255),
    email varchar(255),
    password varchar(255),
    usertype varchar(50),
    phone VARCHAR(12),
    address VARCHAR(255),
    FOREIGN KEY (manager_id) REFERENCES users(id)
);

CREATE TABLE books (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255),
    author VARCHAR(255),
    category VARCHAR(255),
    quantity INT,
    image_link varchar(255),
    rating DECIMAL(3, 2),
    status VARCHAR(20),
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

CREATE TABLE borrow (
    id SERIAL PRIMARY KEY,
    reader_id INT,
    book_id INT,
    borrowed_at TIMESTAMP,
    returned_at TIMESTAMP,
    FOREIGN KEY (reader_id) REFERENCES readers(user_id),
    FOREIGN KEY (book_id) REFERENCES books(id)
);

CREATE TABLE contribution (
    id SERIAL PRIMARY KEY,
    reader_id INT,
    book_id INT,
    contributed_at TIMESTAMP,
    quantity int,
    FOREIGN KEY (reader_id) REFERENCES readers(user_id),
    FOREIGN KEY (book_id) REFERENCES books(id)
);

CREATE TABLE rating (
    id SERIAL PRIMARY KEY,
    book_id INT,
    reader_id INT,
    rating DECIMAL(3, 2) default 5,
    FOREIGN KEY (book_id) REFERENCES books(id),
    FOREIGN KEY (reader_id) REFERENCES readers(user_id)
);

ALTER TABLE books
ADD COLUMN managed_by INT;

ALTER TABLE books
ADD CONSTRAINT fk_managed_by
FOREIGN KEY (managed_by) REFERENCES managers(manager_id);