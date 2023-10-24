<?php

class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserByNameOrMail($username_mail) {
        $query = 'CALL GetUserByNameOrMail(:username-mail)';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username-mail', $username_mail);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getRoleByID($rol_id) {
        $query = 'CALL GetRoleByID(:role-id)';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':role-id', $rol_id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


?>
