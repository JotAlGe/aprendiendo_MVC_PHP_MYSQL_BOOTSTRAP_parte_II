<?php
require_once 'config/Connection.php';

class Post extends Connection
{
    ////////////// POSTING VALIDATION /////////////////////
    function validate_post($post, $photo_name, $photo_type)
    {
        $message = '';
        if (empty($post)) {
            $message = 'Escriba algo antes de postear...';
        }

        if (!empty($photo_name)) {
            if (!(strpos($photo_type, 'jpeg')  || strpos($photo_type, 'jpg') || strpos($photo_type, 'png'))) {
                $message = 'La imágen debe ser de tipo jpeg, jpg o png.';
            }
        }
        return $message;
    }

    ////////// CREATE POSTING /////////////////////
    function create_posting($id_user, $post, $photo = '')
    {
        $sql = "INSERT INTO `posts`(`id_user`, `desc_post`, `date_post`, `photo_post`) 
                VALUES (:id_user, :desc_post, NOW(), :photo_post)";
        $statement = $this->connect()->prepare($sql);
        $statement->bindParam(':id_user', $id_user);
        $statement->bindParam(':desc_post', $post);
        $statement->bindParam(':photo_post', $photo);

        return $statement->execute();
    }

    //////////  GET POST ///////////////////////////////
    function set_name_photo($photo)
    {
        $dateTime = new DateTime();
        // rename image
        if (!empty($photo)) {
            $name = $dateTime->getTimestamp() . '_' . basename($photo);
        } else {
            $name = NULL;
        }
        return $name;
    }
}
