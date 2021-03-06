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
        $photos = $post_by_id->get_photos_by_id($_GET['id']);

        include_once 'views/users/index.php';
    }
    function create()
    {
        $message = '';
        if (isset($_POST['btn-create'])) {
            $dateTime = new DateTime();
            // rename image
            if (!empty($_FILES['photo']['name'])) {
                // photo name no spaces
                $no_space = str_replace(' ', '', $_FILES['photo']['name']);
                $photo_user = $dateTime->getTimestamp() . '_' . basename($no_space);
            } else {
                $photo_user = NULL;
            }

            $conn = new User;
            $message = $conn->validate_fields($_POST['username'], $_POST['lastname'], $_POST['nickname'], $_POST['email'], md5($_POST['pass']), $_POST['birthday'], $photo_user, $_FILES['photo']['type'], $_FILES['photo']['error']);

            if (empty($message)) {
                // move to directory
                move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/imgs/users/' . $photo_user);

                $registered = $conn->createUser(2, $_POST['username'], $_POST['lastname'], $_POST['nickname'], $_POST['email'], $_POST['pass'], $photo_user, $_POST['birthday']);
                $messageOk = '';
                if ($registered == true) $messageOk = 'Se ha registrado al usuario ' . $_POST['nickname'];
                else $messageOk = 'No se ha podido registrar a ' . $_POST['nickname'];
            }
        }
        include_once 'views/users/create.php';
    }



    //////////////////////GET POST BY ID ///////////////////////
    function photos()
    {
        $post = new Post;
        $galery = $post->get_photos_by_id($_GET['id']);
        include_once 'views/users/photos.php';
    }

    ///////////////     ONE PHOTO   ///////////
    function photo()
    {
        $post = new Post;
        $_SESSION['one_post'] = $post->get_one_photo($_GET['id_post']);

        include_once 'views/users/photo.php';
    }

    ////////// list users ///////////////////
    function users()
    {
        $users = new User;
        $_SESSION['users_list'] = $users->get_all_users();
        include_once 'views/users/users.php';
    }

    /////// delete user 
    function delete()
    {
        $user = new User;
        $user_photo = $user->get_data_user($_GET['id']);
        $user_deleted = $user->delete_users($_GET['id']);

        if ($user_deleted) {
            if (file_exists('assets/imgs/users/' . $user_photo[0]['photo_user'])) {
                unlink('assets/imgs/users/' . $user_photo[0]['photo_user']);
            }

            header('Location: ?controller=users&action=users');
            exit;
        }
    }

    ///// update user ///////////////
    function edit()
    {
        $user = new User;
        $_SESSION['user_edit'] = $user->get_data_user($_GET['id']);
        $_SESSION['message_user'] = '';
        if (isset($_POST['update_user'])) {
            if (empty($_POST['name']) || empty($_POST['lastname']) || empty($_POST['nick']) || empty($_POST['email'])) {
                $_SESSION['message_user'] = 'No debe dejar campos vac??os!';
            } else {
                $user->update_user($_GET['id'], $_POST['name'], $_POST['lastname'], $_POST['nick'], $_POST['email']);
                header('Location: ?controller=users&action=index&id=' . $_GET['id']);
                exit;
            }
        }
        include_once 'views/users/edit.php';
    }
}
