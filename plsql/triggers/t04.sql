CREATE OR REPLACE TRIGGER update_stock_quantity
BEFORE INSERT ON commande
FOR EACH ROW
DECLARE
    available_stock NUMBER;
BEGIN
    -- Check if there is sufficient stock for the order
    SELECT stock INTO available_stock
    FROM produit
    WHERE no_prod = :NEW.no_prod;

    IF available_stock < :NEW.quantite THEN
        -- Raise an error if there is insufficient stock
        RAISE_APPLICATION_ERROR(-20001, 'Insufficient stock for the order.');
    ELSE
        -- Update the stock quantity after the order is placed
        UPDATE produit
        SET stock = stock - :NEW.quantite
        WHERE no_prod = :NEW.no_prod;
    END IF;
END;
/
