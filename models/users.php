<?php
require_once 'config/Connection.php';
class User extends Connection
{
    /////////////// user register //////////////////////////////////// 
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

    /////////////////// validate ////////////////////////////////
    function validate_fields($name, $lastname, $nick, $email, $pass, $birthday)
    {
        $message = '';
        if (empty($name)) $message = 'Debe ingresar un nombre. <br>';
        if (empty($lastname)) $message .= 'Debe ingresar un apellido. <br>';
        if (empty($nick)) $message .= 'Debe ingresar un nombre de usuario. <br>';
        if (empty($email)) $message .= 'Debe ingresar una dirección de email. <br>';
        if (empty($pass)) $message .= 'Debe ingresar una contraseña. <br>';
        if (empty($birthday)) $message .= 'Debe ingresar su fecha de nacimiento. <br>';

        return $message;
    }

    /// //////////////// get data login /////////////////////////////////////////
    function get_data_login($email, $pass)
    {
        $data = [];
        $encript = md5($pass);
        $sql = "SELECT `id_user`, `cod_level`, `name_user`, `lastname_user`, `nick_user`, `email_user`, `pass_user`, `photo_user`, `date_register`, `birthday` 
                 FROM `users` 
                WHERE `email_user`= :email_user 
                  AND `pass_user`= :pass_user";

        $statement = $this->connect()->prepare($sql);
        $statement->bindParam('email_user', $email);
        $statement->bindParam('pass_user', $encript);

        $statement->execute();
        $resul = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resul as $row) {
            $data['ID'] = $row['id_user'];
            $data['LEV'] = $row['cod_level'];
            $data['NAME'] = $row['name_user'];
            $data['LAST'] = $row['lastname_user'];
            $data['NICK'] = $row['nick_user'];
            $data['EMAIL'] = $row['email_user'];
            $data['PASS'] = $row['pass_user'];

            $data['PHOTO'] = $row['photo_user'];

            $data['DATREG'] = $row['date_register'];
            $data['BIRTHDAY'] = $row['birthday'];
        }

        return $data;
    }

    /////// get data user ///////////////////
    function get_data_user($id)
    {
        $sql = "SELECT `id_user`, `cod_level`, `name_user`, `lastname_user`, `nick_user`, `email_user`, `pass_user`, `photo_user`, `date_register`, `birthday` 
                  FROM`users` 
                 WHERE id_user = :id_user";
        $statement = $this->connect()->prepare($sql);
        $statement->bindParam(':id_user', $id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
