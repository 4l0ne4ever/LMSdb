
-- database/sql/add.sql

INSERT INTO books (title, author, category, quantity, rating, image_link,created_at, updated_at,status)
VALUES (:title, :author, :category, :quantity, 5,:image_link , NOW(), NOW(),'pending');