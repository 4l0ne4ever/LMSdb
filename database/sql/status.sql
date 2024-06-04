UPDATE accountstatus
SET quantity = quantity + :quantity,
    status = CASE WHEN quantity + :quantity > 3 THEN 'platinum' ELSE status END
WHERE user_id = :user_id;