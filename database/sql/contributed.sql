-- contributed.sql

INSERT INTO contribution (user_id, book_id, contributed_at, quantity)
VALUES (:user_id, :book_id, ':contributed_at', :quantity);