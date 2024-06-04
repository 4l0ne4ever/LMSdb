-- database/sql/add.sql

INSERT INTO books (title, author, status, created_at, updated_at)
VALUES (:title, :author, 'pending', NOW(), NOW());