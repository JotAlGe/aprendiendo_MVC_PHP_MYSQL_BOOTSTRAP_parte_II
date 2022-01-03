<?php
require_once 'config/Connection.php';
class User extends Connection
{
    function createUser($lev, $name, $lastname, $nick, $email, $pass, $photo = '', $birthday)
    {
        $sql = "INSERT INTO `users` (`id_user`, `cod_level`, `name_user`, `lastname_user`, `nick_user`, `email_user`, `pass_user`, `photo_user`, `date_register`, `birthday`)
                VALUES (NULL,:cod_level, :name_user, :lastname_user, :nick_user, :email_user, :pass_user, :photo_user, NOW(), :birthday)";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(':cod_level', $lev);
        $statement->bindValue(':name_user', $name);
        $statement->bindValue(':lastname_user', $lastname);
        $statement->bindValue(':nick_user', $nick);
        $statement->bindValue(':email_user', $email);
        $statement->bindValue(':pass_user', md5($pass));
        $statement->bindValue(':photo_user', $photo);
        /* $statement->bindValue(':date_register', 'NOW()'); */
        $statement->bindValue(':birthday', $birthday);
        return $statement->execute();
    }
}
