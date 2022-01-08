<?php
require_once 'models/users.php';
require_once 'models/posts.php';

class UsersController
{
    function index()
    {
        if (!empty($_SESSION)) {
            session_start();
        }

        $user = new User;
        $post_by_id = new Post;
        $data_user = $user->get_data_user($_GET['id']);
        $post_id = $post_by_id->get_posts_by_user($_GET['id']);
        $all_users = $user->get_all_users();

        include_once 'views/users/index.php';
    }
    function create()
    {
        $message = '';
        if (isset($_POST['btn-create'])) {
            $dateTime = new DateTime();
            // rename image
            if (!empty($_FILES['photo']['name'])) {
                $photo_user = $dateTime->getTimestamp() . '_' . basename($_FILES['photo']['name']);
            } else {
                $photo_user = NULL;
            }

            $conn = new User;
            $message = $conn->validate_fields($_POST['username'], $_POST['lastname'], $_POST['nickname'], $_POST['email'], md5($_POST['pass']), $_POST['birthday']);

            // move to directory
            move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/imgs/users/' . $photo_user);
            if (empty($message)) {
                $registered = $conn->createUser(2, $_POST['username'], $_POST['lastname'], $_POST['nickname'], $_POST['email'], $_POST['pass'], $photo_user, $_POST['birthday']);
                $messageOk = '';
                if ($registered == true) $messageOk = 'Se ha registrado al usuario ' . $_POST['nickname'];
                else $messageOk = 'No se ha podido registrar a ' . $_POST['nickname'];
            }
        }
        include_once 'views/users/create.php';
    }

    function edit()
    {
        include_once 'views/users/edit.php';
    }
    function delete()
    {
    }
}
