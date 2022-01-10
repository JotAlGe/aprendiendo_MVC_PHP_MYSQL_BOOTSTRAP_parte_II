<?php
require_once 'config/Connection.php';

class Post extends Connection
{
    ////////////// POSTING VALIDATION /////////////////////
    function validate_post($post, $photo_name, $photo_type, $error)
    {
        $message = '';
        if (empty($post)) {
            $message = 'Escriba algo antes de postear...';
        } else {
            if (!empty($photo_name)) {
                if ($photo_type == "image/jpeg" || $photo_type == "image/jpg" || $photo_type == "image/png") {
                    $message = '';
                } else {
                    $message = 'La imágen debe ser de tipo jpeg, jpg o png.';
                }
            }
        }


        if ($error != 0) $message = 'Error en la imágen. Intente con otra...';
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

    //////////// GET POSTS //////////////////////
    function get_posts()
    {
        $sql = "SELECT p.id_post, p.id_user, p.desc_post, p.date_post, p.photo_post,
                       u.name_user, u.lastname_user, u.nick_user, u.photo_user
                  FROM posts as p, users as u 
                 WHERE p.id_user = u.id_user
                 ORDER BY p.date_post DESC";

        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }

    ////////////// GET POST BY USER /////////////////////
    function get_posts_by_user($id)
    {
        $sql = "SELECT p.id_post, p.id_user, p.desc_post, p.date_post, p.photo_post,
                       u.name_user, u.lastname_user, u.nick_user, u.photo_user
                  FROM posts as p, users as u 
                  WHERE p.id_user = u.id_user
                    AND p.id_user = :id_user
                    ORDER BY p.date_post DESC";
        $statement = $this->connect()->prepare($sql);
        $statement->bindParam(':id_user', $id, PDO::PARAM_INT);
        $statement->execute();
        $post = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $post;
    }

    /// ///////// GET PHOTOS BY ID //////////////////
    function get_photos_by_id($id)
    {
        $sql = "SELECT p.id_post, p.id_user, p.desc_post, p.date_post, p.photo_post,
                       u.name_user, u.lastname_user, u.nick_user, u.photo_user
                  FROM posts as p, users as u 
                  WHERE p.id_user = u.id_user
                    AND p.id_user = :id_user
                    AND p.photo_post != ''
                ORDER BY p.date_post DESC";

        $statement = $this->connect()->prepare($sql);
        $statement->bindParam(':id_user', $id, PDO::PARAM_INT);
        $statement->execute();
        $post = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $post;
    }
}
