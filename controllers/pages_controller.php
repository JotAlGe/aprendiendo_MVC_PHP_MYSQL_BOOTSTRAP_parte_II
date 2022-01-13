<?php

require_once 'models/users.php';
require_once 'models/posts.php';

class PagesController extends User
{
    /////////// index //////////////////////
    function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $message = '';
        $errorPost = '';

        // new instance
        $post = new Post;
        $post_result = $post->get_posts();

        // enviado por post
        if (isset($_POST['btn-post'])) {
            $dateTime = new DateTime();
            // rename image
            if (!empty($_FILES['img-post']['name'])) {
                $no_space = str_replace(' ', '', $_FILES['img-post']['name']);
                $name_photo = $dateTime->getTimestamp() . '_' . basename($no_space);
            } else {
                $name_photo = NULL;
            }



            // validation
            $message = $post->validate_post($_POST['post'], $_FILES["img-post"]["name"], $_FILES["img-post"]["type"], $_FILES['img-post']['error']);
            /*  print_r($message); */

            // insert a post
            if (empty($message)) {
                // move uploaded file to server
                move_uploaded_file($_FILES['img-post']['tmp_name'], 'assets/imgs/posts/' . $name_photo);

                $post->create_posting($_SESSION['id'], $_POST['post'], $name_photo);

                header('Location: ?controller=pages&action=index');
            }
        }

        include_once 'views/pages/index.php';
    }

    /////////// ERROR //////////////////////
    function error()
    {
        include_once 'views/pages/error.php';
    }

    /////////// login //////////////////////
    function login()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $message = '';
        if (!empty($_POST['btn-login'])) {

            $logged = new User;
            $data = $logged->get_data_login($_POST['email'], $_POST['pass']);

            if (!empty($data)) {
                $_SESSION['id'] = $data['ID'];
                $_SESSION['lev'] = $data['LEV'];
                $_SESSION['name'] = $data['NAME'];
                $_SESSION['lastname'] = $data['LAST'];
                $_SESSION['nickname'] = $data['NICK'];
                $_SESSION['email'] = $data['EMAIL'];

                $_SESSION['photo'] = $data['PHOTO'];
                $_SESSION['data_register'] = $data['DATREG'];
                $_SESSION['birthday'] = $data['BIRTHDAY'];

                header('Location:?controller=pages&action=index');
                exit;
            } else {
                $message = '¡Datos incorrectos!';
            }
        }
        include_once 'views/pages/login.php';
    }

    /////////// logout //////////////////////
    function logout()
    {
        include_once 'views/pages/logout.php';
    }

    //////////////// edit post
    function edit()
    {
        $post = new Post;
        $_SESSION['post'] = $post->get_one_post($_GET['id_post']);

        $_SESSION['message'] = '';
        if (isset($_POST['update'])) {
            if (!empty($_POST['description'])) {
                $post->update_post($_POST['id'], $_POST['description']);
                header('Location: ?controller=pages&action=index');
                exit;
            } else {
                $_SESSION['message'] = 'No deje el campo vacío!';
            }
        }
        include_once 'views/pages/edit.php';
    }

    ///////////////////// LIKES ///////////////////
    function likes()
    {
        session_start();
        $pos = new Post;
        #$_SESSION['likes'] = $pos->get_like_by_post($_GET['id_post']);
        $like_inserted = $pos->insert_like($_SESSION['id'], $_GET['id_post']);
        if ($like_inserted === true) {
            header('Location:?controller=pages&action=index');
            exit;
        }
    }
}
