DELIMITER //

CREATE PROCEDURE GetUserByNameOrMail(IN p_NameOrMail VARCHAR(255))
BEGIN
    SELECT * FROM users
    WHERE name_user = p_NameOrMail OR mail_user = p_NameOrMail;
END //

DELIMITER ;




DELIMITER //

CREATE PROCEDURE GetRoleByID(IN p_role_id VARCHAR(4))
BEGIN
    SELECT role FROM roles
    WHERE rol_id = p_role_id;
END //

DELIMITER ;
