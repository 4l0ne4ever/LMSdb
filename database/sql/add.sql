
-- database/sql/add.sql

INSERT INTO books (title, author, category, quantity, rating, image_link,created_at, updated_at,status,managed_by)
VALUES (:title, :author, :category, :quantity, 0,:image_link , NOW(), NOW(),'pending',3);