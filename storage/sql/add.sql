-- add.sql

INSERT INTO books (title, author, category, quantity, rating, image_link, created_at, updated_at) 
VALUES (?, ?, ?, ?, 5, ?, ?, ?);
-- add_contributions.sql

INSERT INTO contributions (book_id, quantity, contributed_at)
SELECT book_id, quantity, created_at FROM books;
